<x-app-layout>
    @push('styles')
        <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
            rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
    @endpush
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
                    <h1 class="app-page-title mb-0">Edit Tanaman</h1>
                </div>
            </div>
            <div class="row g-3 mb-4 bg-none shadow-none">
                <div class="col-12 col-md-12">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                <form method="POST" action="{{ route('plant.update', $data->id) }}"
                                    class="settings-form" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="category_id" class="form-label">Kategori</label>
                                        <select class="form-control" id="category_id" name="category_id" required>
                                            <option value="">Pilih Kategori</option>
                                            <!-- Add options here -->
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $data->category_id ? 'selected' : false }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label required">Nama</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $data->name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="scientific_name" class="form-label">Nama Ilmiah</label>
                                        <input type="text" class="form-control" id="scientific_name"
                                            name="scientific_name" value="{{ $data->scientific_name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="habitat" class="form-label">Habitat</label>
                                        <input type="text" class="form-control" id="habitat" name="habitat"
                                            value="{{ $data->habitat }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="growth_rate" class="form-label">Laju Pertumbuhan</label>
                                        <input type="text" class="form-control" id="growth_rate" name="growth_rate"
                                            value="{{ $data->growth_rate }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="watering_needs" class="form-label">Kebutuhan Air</label>
                                        <input type="text" class="form-control" id="watering_needs"
                                            name="watering_needs" value="{{ $data->watering_needs }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sunlight_needs" class="form-label">Kebutuhan Sinar Matahari</label>
                                        <input type="text" class="form-control" id="sunlight_needs"
                                            name="sunlight_needs" value="{{ $data->sunlight_needs }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="soil_level" class="form-label">Tingkat Kelembapan Tanah</label>
                                        <input type="text" class="form-control" id="soil_level" name="soil_level"
                                            value="{{ $data->soil_level }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="temprature_range" class="form-label">Rasio Suhu</label>
                                        <input type="text" class="form-control" id="temprature_range"
                                            name="temprature_range" value="{{ $data->temprature_range }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="use_cases" class="form-label">Fungsi</label>
                                        <input type="text" class="form-control" id="use_cases" name="use_cases"
                                            value="{{ $data->use_cases }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Deskripsi</label>
                                        <div id="description-editor" class="form-control" style="height: 150px;">
                                            {!! $data->description !!}
                                        </div>
                                        <input type="hidden" id="description" name="description" value="{{$data->description}}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="images" class="form-label">Images</label>
                                        <input type="file" class="my-pond" name="images[]" multiple
                                            data-allow-reorder="true" data-max-file-size="10MB" data-max-files="3">
                                    </div>
                                    <button type="submit" class="btn app-btn-primary">Simpan</button>
                                </form>
                            </div><!--//app-card-body-->

                        </div><!--//app-card-->
                    </div>
                </div>
                {{-- <div class="col-12 col-md-4">
                    <div class="app-card app-card-orders-table shadow-sm mb-5 p-3">
                        Content Preview
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

        <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js">
        </script>
        <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>


        <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/dompurify@3.0.5/dist/purify.min.js"></script>
        <script>
            const images = {!! $data->images !!}
            console.log(images)
            const quill = new Quill('#description-editor', {
                theme: 'snow'
            });

            quill.on('text-change', function() {
                const sanitized = DOMPurify.sanitize(quill.root.innerHTML)
                console.log(sanitized);
                document.querySelector('#description').value = sanitized;
            });

            $(function() {

                // First register any plugins
                $.fn.filepond.registerPlugin(
                    FilePondPluginImagePreview,
                    FilePondPluginImageExifOrientation,
                    FilePondPluginFileValidateSize,
                    FilePondPluginImageEdit
                );

                // Turn input element into a pond
                $('.my-pond').filepond({
                    allowMultiple: true,
                    storeAsFile: true
                });

                // // Set allowMultiple property to true
                // $('.my-pond').filepond('allowMultiple', true);

                // Listen for addfile event
                $('.my-pond').on('FilePond:addfile', function(e) {
                    console.log('File added', e.detail.file);
                });

                images.forEach(element => {
                    const url = `{{ asset('images/') }}/${element.image}`;
                    const file = new File([url], element.image, {
                        type: 'image/jpeg',
                        lastModified: new Date()
                    });

                    $('.my-pond')
                        .filepond('addFile', url)
                        .then(function(file) {
                            console.log('file added', file);
                        });
                });
            });
        </script>
    @endpush

</x-app-layout>
