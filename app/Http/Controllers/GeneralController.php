<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function getFlowers(Request $request)
    {
        $data = Plant::with('images', 'category')
            ->orderBy('created_at', 'desc');

        if ($request->has('search')) {
            $keyword = $request->get('search');
            $data->where(function ($query) use ($keyword) {
                $query->whereLike('name', "%$keyword%")
                    ->orWhereLike('scientific_name', "%$keyword%")
                    ->orWhereLike('description', "%$keyword%")
                    ->orWhereLike('habitat', "%$keyword%")
                    ->orWhereLike('growth_rate', "%$keyword%")
                    ->orWhereLike('watering_needs', "%$keyword%")
                    ->orWhereLike('sunlight_needs', "%$keyword%")
                    ->orWhereLike('soil_level', "%$keyword%")
                    ->orWhereLike('temprature_range', "%$keyword%")
                    ->orWhereLike('use_cases', "%$keyword%");
            });
        }

        return view('flower', [
            'datas' => $data->paginate(10)
        ]);
    }

    public function getFlowerDetail(Request $request, $slug)
    {
        $data = Plant::with('images', 'category')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('detail', [
            'data' => $data
        ]);
    }
}
