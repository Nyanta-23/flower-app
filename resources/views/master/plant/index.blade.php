<x-app-layout>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Daftar Tanaman</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <form class="table-search-form row gx-1 align-items-center"
                                    action="{{ route('plant') }}" method="GET">
                                    <div class="col-auto">
                                        <input type="text" id="search" name="search" class="form-control search"
                                            placeholder="Search">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn app-btn-secondary">Search</button>
                                    </div>
                                </form>

                            </div>
                            <div class="col-auto">
                                <a class="btn app-btn-secondary"
                                    href="{{ route('plant.download', ['search' => $search ?? '']) }}" target="__blank">
                                    <i class="fa fa-download me-1"></i>
                                    Export
                                </a>
                            </div>
                            <div class="col-auto">
                                <a class="btn app-btn-primary" href="{{ route('plant.create') }}">
                                    <i class="fa fa-plus me-1"></i>
                                    Tambah Data
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">No</th>
                                    <th class="cell">Nama</th>
                                    <th class="cell">Kategori</th>
                                    <th class="cell">Deskripsi</th>
                                    <th class="cell">Gambar</th>
                                    <th class="cell">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($plants as $plant)
                                    <tr>
                                        <td class="cell">{{ $loop->iteration + $plants->firstItem() - 1 }}</td>
                                        <td class="cell">{{ $plant->name }}</td>
                                        <td class="cell">{{ $plant->category->name }}</td>
                                        <td class="cell">{!! Str::limit($plant->description, 50) !!}</td>
                                        <td class="cell">
                                            <div class="d-flex flex-wrap gap-2" style="max-width: 300px;">
                                                @foreach ($plant->images as $pi)
                                                    <img src="{{ asset('images/' . $pi->image) }}"
                                                        alt="{{ $pi->caption }}" class="img-thumbnail"
                                                        style="width: 80px; height: 80px; object-fit: cover;" />
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="cell">
                                            <a href="{{ route('plant.download-single', $plant) }}" target="__blank"
                                                class="btn btn-sm btn-primary text-white"
                                                download="QR-{{ $plant->slug }}.png"
                                                >
                                                <i class="fa fa-download"></i> QR
                                            </a>
                                            <a href="{{ route('show-plant', $plant->slug) }}"
                                                class="btn btn-sm btn-info text-white" target="__blank">Preview</a>
                                            <a href="{{ route('plant.edit', $plant) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('plant.destroy', $plant) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{ $plants->links() }}
        </div>
    </div>
</x-app-layout>
