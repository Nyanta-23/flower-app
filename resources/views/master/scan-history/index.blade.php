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
                    <h1 class="app-page-title mb-0">Riwayat Scan</h1>
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
                                    <th class="cell">Timestamp</th>
                                    <th class="cell">Device ID</th>
                                    <th class="cell">Device Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $item)
                                    <tr>
                                        <td class="cell">{{ $loop->iteration + $datas->firstItem() - 1 }}</td>
                                        <td class="cell">{{ $item->plant->name }}</td>
                                        <td class="cell">{{ $item->plant->category->name }}</td>
                                        <td class="cell">{{ $item->created_at }}</td>
                                        <td class="cell">{{ $item->device_id }}</td>
                                        <td class="cell">{{ $item->device_name }}</td>
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
