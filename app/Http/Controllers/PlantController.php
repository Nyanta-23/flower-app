<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Plant;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Str;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $plants = Plant::query()
                ->where('name', 'like', '%' . $search . '%')
                ->orWhere('scientific_name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhere('habitat', 'like', '%' . $search . '%')
                ->orWhere('growth_rate', 'like', '%' . $search . '%')
                ->orWhere('watering_needs', 'like', '%' . $search . '%')
                ->orWhere('sunlight_needs', 'like', '%' . $search . '%')
                ->orWhere('soil_level', 'like', '%' . $search . '%')
                ->orWhere('temprature_range', 'like', '%' . $search . '%')
                ->orWhere('use_cases', 'like', '%' . $search . '%')

                ->with('category')
                ->paginate(10);
        } else {
            $plants = Plant::with('category')->paginate(10);
        }

        return view('master.plant.index', [
            'plants' => $plants,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('master.plant.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'category_id' => 'required|exists:categories,id',
                'scientific_name' => 'nullable|string|max:255',
                'habitat' => 'nullable|string|max:255',
                'growth_rate' => 'nullable|string|max:255',
                'watering_needs' => 'nullable|string|max:255',
                'sunlight_needs' => 'nullable|string|max:255',
                'soil_level' => 'nullable|string|max:255',
                'temprature_range' => 'nullable|string|max:255',
                'use_cases' => 'nullable|string|max:255',
                'images.*' => 'file|max:10024|mimes:jpeg,png,jpg,gif,svg'
            ]);

            // Handle image upload if needed
            if ($files = $request->file('images')) {
                $images = [];
                foreach ($files as $key => $file) {
                    $filename = $request->name . '_' . $key . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('images'), $filename);
                    $images[] = $filename;
                }
            }

            $stored = Plant::create(array_merge(
                $request->only('name', 'category_id', 'scientific_name', 'habitat', 'growth_rate', 'watering_needs', 'sunlight_needs', 'soil_level', 'temprature_range', 'use_cases'),
                [
                    'slug' => Str::slug($request->name, '-') . '-' . time(),
                    'description' => Purifier::clean($request->description),
                ]
            ));

            if ($stored) {
                if (isset($images)) {
                    foreach ($images as $image) {
                        $stored->images()->create([
                            'image' => $image,
                            'caption' => $request->scientific_name
                        ]);
                    }
                }
            } else {
                return redirect()->back()->with('error', 'Failed to create plant.');
            }

            return redirect()->route('plant')->with('success', 'Plant created successfully.');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Failed to create plant: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $data = Plant::with('category')->findOrFail($id);
        $images = $data->images()->get();

        return view('show-plant', [
            'data' => $data,
            'images' => $images,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Plant::with('category')->findOrFail($id);
        $categories = Category::all();

        return view('master.plant.edit', [
            'data' => $data,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'scientific_name' => 'nullable|string|max:255',
            'habitat' => 'nullable|string|max:255',
            'growth_rate' => 'nullable|string|max:255',
            'watering_needs' => 'nullable|string|max:255',
            'sunlight_needs' => 'nullable|string|max:255',
            'soil_level' => 'nullable|string|max:255',
            'temprature_range' => 'nullable|string|max:255',
            'use_cases' => 'nullable|string|max:255',
            'images.*' => 'file|max:10024|mimes:jpeg,png,jpg,gif,svg'
        ]);

        try {

            // Handle image upload if needed
            if ($files = $request->file('images')) {
                $images = [];
                foreach ($files as $key => $file) {
                    $filename = $request->name . '_' . $key . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('images'), $filename);
                    $images[] = $filename;
                }
            }

            $plant = Plant::findOrFail($id);
            
            $plant->update(array_merge(
                $request->only('name', 'category_id', 'scientific_name', 'habitat', 'growth_rate', 'watering_needs', 'sunlight_needs', 'soil_level', 'temprature_range', 'use_cases'),
                [
                    'description' => Purifier::clean($request->description),
                ]
            ));

            if (isset($images)) {
                $delete_old_images = $plant->images()->delete();
                foreach ($images as $image) {
                    $plant->images()->create([
                        'image' => $image,
                        // Assuming you want to use scientific_name as caption
                        'caption' => $request->scientific_name
                    ]);
                }
            }

            return redirect()->route('plant')->with('success', 'Plant updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update plant: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plant = Plant::findOrFail($id);
        $plant->delete();

        return redirect()->route('plant')->with('success', 'Plant deleted successfully.');
    }

    public function download(Request $request)
    {
        $search = $request->input('search');

        $data = Plant::query()
            ->where('name', 'like', '%' . $search . '%')
            ->orWhere('scientific_name', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->orWhere('habitat', 'like', '%' . $search . '%')
            ->orWhere('growth_rate', 'like', '%' . $search . '%')
            ->orWhere('watering_needs', 'like', '%' . $search . '%')
            ->orWhere('sunlight_needs', 'like', '%' . $search . '%')
            ->orWhere('soil_level', 'like', '%' . $search . '%')
            ->orWhere('temprature_range', 'like', '%' . $search . '%')
            ->orWhere('use_cases', 'like', '%' . $search . '%')
            ->with('category')
            ->get();

        // generate QR code for every plant
        $data->map(function ($item) {
            $item->qr_code = base64_encode(QrCode::format('png')->size(200)->generate($item->slug));
            return $item;
        });

        if ($data->isNotEmpty()) {
            $pdf = Pdf::loadView('pdf.qr', [
                "data" => $data,
            ]);
            return $pdf->stream('plants.pdf');
        } else {
            return redirect()->back()->with('error', 'Plant not found.');
        }
    }

    public function downloadSingle($id)
    {
        $data = Plant::with('category')->findOrFail($id);
        $qr_code = QrCode::format('png')
            ->size(1000)
            ->margin(2)
            ->generate($data->slug);

        return response($qr_code)->header('Content-Type', 'image/png');
    }
}
