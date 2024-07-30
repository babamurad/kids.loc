@section('title', 'Teacher Lesson Create')
<div class="container-fluid">
    <style>
        progress {
            width: 100%;
            height: 15px;
            appearance: none;
        }

        progress::-webkit-progress-bar {
            background-color: #e9edf3;
            border-radius: 5px;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);
        }

        progress::-webkit-progress-value {
            background-color: #6d61ea;
            border-radius: 5px;
        }

        progress::-moz-progress-bar {
            background-color: #6d61ea;
            border-radius: 5px;
        }
    </style>
    @include('components.alerts')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Sapak döretmek</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('teacher.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('teacher.teacher-lessons', ['teacherId' => auth()->user()->id]) }}">Lessons</a> </li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Sözbaşy</label>
                        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter First Name" wire:model="title">
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="border-danger" @error('content') style="border: 1px solid #ee5455; display:block;" @enderror>
                        <div wire:ignore class="form-group">
                            <textarea class="@error('content') is-invalid @enderror" id="summernote" wire:model.live="content"></textarea>
                        </div>
                    </div>
                    @error('content')<div class="invalid-feedback" style="display: block;">{{ $message }}</div>@enderror

                </div>
                <div class="card-footer">
                    <a href="{{ route('teacher.teacher-lessons', ['teacherId' => auth()->user()->id]) }}" class="btn btn-secondary waves-effect waves-light">Ýapmak</a>
                    <button type="button" class="btn btn-primary waves-effect waves-light" wire:click="create">Ýatda sakla</button>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body text-center">
                    @if($image)
                        <img wire:model="image" class="img-fluid rounded" src="{{ $image->temporaryUrl() }}" alt="Lessons Foto">
                    @endif
                    <div class="form-group mt-1">
                        <label>Esasy surat</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input  @error('image') is-invalid @enderror" id="image" wire:model="image">
                            <label class="custom-file-label" for="image">@if($image){{ $image->getClientOriginalName() }}@else Surat saýla @endif</label>
                            @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                        @if ($video)
                            <div class="mt-3">
                                <h5>Wideo deslapky syn:</h5>
                                <video width="320" height="240" controls>
                                    <source src="{{ $video->temporaryUrl() }}?id={{ $videoPreviewId }}" type="video/mp4">
                                    Brauzeriňiz ses elementini goldamaýar.
                                </video>
                            </div>
                        @endif

                    <div class="form-group mt-1">
                        <label>Wideo</label>
                        <div class="custom-file"
                             x-data="{ uploading: false, progress: 0 }"
                             x-on:livewire-upload-start="uploading = true"
                             x-on:livewire-upload-finish="uploading = false"
                             x-on:livewire-upload-cancel="uploading = false"
                             x-on:livewire-upload-error="uploading = false"
                             x-on:livewire-upload-progress="progress = $event.detail.progress"
                        >
                            <input type="file" class="custom-file-input @error('video') is-invalid @enderror" id="video" wire:model="video" accept="video/*">
                            <label class="custom-file-label" for="video">@if($video){{ $video->getClientOriginalName() }}@else Wideo saýla @endif</label>
                            @error('video')<div class="invalid-feedback">{{ $message }}</div>@enderror

                            <!-- Progress Bar -->
                            <div class="progress w-100 mt-1" x-show="uploading">
                                <progress class="progress-bar w-100" role="progressbar" style="width: 25%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" max="100" x-bind:value="progress">

                                </progress>
                            </div>
                            <div x-show="uploading" class="mt-2">
                                <button class="btn btn-sm btn-outline-danger mt-3" type="button" wire:click="$cancelUpload('newVideo')">Ýatyrmak</button>
                            </div>
                        </div>
                    </div>

                        @if ($audio)
                            <div class="mt-3">
                                <h5>Audio görnüşi:</h5>
                                <audio controls>
                                    <source src="{{ $audio->temporaryUrl() }}">
                                    Brauzeriňiz ses elementini goldamaýar.
                                </audio>
                            </div>
                        @endif

                        <div class="form-group mt-1">
                            <label>Audio</label>
                            <div class="custom-file"
                                 x-data="{ uploading: false, progress: 0 }"
                                 x-on:livewire-upload-start="uploading = true"
                                 x-on:livewire-upload-finish="uploading = false"
                                 x-on:livewire-upload-cancel="uploading = false"
                                 x-on:livewire-upload-error="uploading = false"
                                 x-on:livewire-upload-progress="progress = $event.detail.progress"
                            >
                                <input type="file" id="audio" wire:model="audio" class="custom-file-input @error('audio') is-invalid @enderror" accept="audio/*">
                                <label class="custom-file-label" for="audio">@if($audio){{ $audio->getClientOriginalName() }}@else Audio ýüklemek @endif</label>
                                @error('audio') <span class="invalid-feedback">{{ $message }}</span> @enderror

                                <!-- Progress Bar -->
                                <div class="progress w-100 mt-1" x-show="uploading">
                                    <progress class="progress-bar w-100" role="progressbar" style="width: 25%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" max="100" x-bind:value="progress">

                                    </progress>
                                </div>
                                <div x-show="uploading" class="mt-2">
                                    <button class="btn btn-sm btn-outline-danger mt-3" type="button" wire:click="$cancelUpload('newVideo')">Cancel</button>
                                </div>
                            </div>
                        </div>

                        @if ($file)
                            <div class="mt-3">
                                <label>Faýla deslapky syn:</label>
                                <a href="{{ $file->temporaryUrl() }}">@if($file){{ $file->getClientOriginalName() }}@else Faýl saýla @endif</a>
                            </div>
                        @endif

                        <div class="form-group mt-1">
                            <label>Faýl</label>
                            <div class="custom-file"
                                 x-data="{ uploading: false, progress: 0 }"
                                 x-on:livewire-upload-start="uploading = true"
                                 x-on:livewire-upload-finish="uploading = false"
                                 x-on:livewire-upload-cancel="uploading = false"
                                 x-on:livewire-upload-error="uploading = false"
                                 x-on:livewire-upload-progress="progress = $event.detail.progress"
                            >
                                <input type="file" class="custom-file-input @error('file') is-invalid @enderror" id="file" wire:model="file" accept="file/*">
                                <label class="custom-file-label" for="file">@if($file){{ $file->getClientOriginalName() }}@else Faýl saýla @endif</label>
                                @error('file')<div class="invalid-feedback">{{ $message }}</div>@enderror

                                <!-- Progress Bar -->
                                <div class="progress w-100 mt-1" x-show="uploading">
                                    <progress class="progress-bar w-100" role="progressbar" style="width: 25%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" max="100" x-bind:value="progress">

                                    </progress>
                                </div>
                                <div x-show="uploading" class="mt-2">
                                    <button class="btn btn-sm btn-outline-danger mt-3" type="button">Ýatyrmak</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row mt-4">
                                    <div class="form-group pl-5">
                                        <div class="custom-control custom-checkbox mt-2 pl-2">
                                            <input type="checkbox" class="custom-control-input" id="status" wire:model="status">
                                            <label class="custom-control-label" for="status">Neşir et</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    <div class="form-group">
                        <label>Kategoriýa</label>
                        <select class="form-control mb-3" wire:model="category_id">
                            <option value="">Kategoriýany saýlamak</option>
                            @foreach ($categories as $category)
                                <option wire:key="{{ $category->id }}" value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>

            {{-- <p>{{ $published_date }}</p>
            <label>Published date</label>
            <input type="date" wire:model.live="published_date"> --}}
        </div>
    </div>
</div>
@push('editor-css')
    <link href="{{ asset('admin/assets/plugins/quill/quill.core.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/assets/plugins/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/assets/plugins/quill/quill.snow.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@push('editor-js')
{{--    <script src="{{ asset('/admin/assets/pages/quilljs-demo.js') }}"></script>--}}
    <script>

        $(document).ready(function () {
            $('#summernote').summernote({
                height: 400,
                toolbar: [
                    // Добавьте другие группы кнопок здесь
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']], // Добавляем опцию размера шрифта
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                fontsize: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '22', '24', '28', '32', '36', '48', '64', '82', '100'] // Опционально: задаем список размеров шрифтов

            });
        });

        $('#summernote').on('summernote.change', function (we, contents, $editable) {
        @this.set('content', contents)
        });
    </script>
@endpush
