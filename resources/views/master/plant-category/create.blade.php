<x-app-layout>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
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
                    <h1 class="app-page-title mb-0">Tambah Tanaman</h1>
                </div>
            </div>
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-body">
                        <form method="POST" action="{{ route('category.store') }}" class="settings-form">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label required">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="common_examples" class="form-label">Contoh Tanaman</label>
                                <input type="text" class="form-control" id="common_examples" name="common_examples">
                            </div>
                            <button type="submit" class="btn app-btn-primary">Simpan</button>
                        </form>
                    </div><!--//app-card-body-->

                </div><!--//app-card-->
            </div>
        </div>
    </div>
</x-app-layout>
