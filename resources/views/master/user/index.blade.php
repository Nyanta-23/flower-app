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
                    <h1 class="app-page-title mb-0">Daftar Admin</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <form class="table-search-form row gx-1 align-items-center">
                                    <div class="col-auto">
                                        <input type="text" id="search-orders" name="searchorders"
                                            class="form-control search-orders" placeholder="Search">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn app-btn-secondary">Search</button>
                                    </div>
                                </form>

                            </div>
                            <div class="col-auto">
                                <a class="btn app-btn-primary" href="{{ route('user.create') }}">
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
                                    <th class="cell">Email</th>
                                    <th class="cell">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <td class="cell">{{ $loop->iteration + $datas->firstItem() - 1 }}</td>
                                        <td class="cell">{{ $data->name }}</td>
                                        <td class="cell">{{ $data->email }}</td>
                                        <td class="cell">
                                            <a href="{{ route('user.edit', $data->id) }}"
                                                class="btn btn-sm btn-primary text-white">
                                                <i class="fa fa-pencil-alt"></i> Edit
                                            </a>
                                            <form action="{{ route('user.destroy', $data->id) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger text-white"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                    <i class="fa fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            {{ $datas->links() }}
        </div>
    </div>
</x-app-layout>
