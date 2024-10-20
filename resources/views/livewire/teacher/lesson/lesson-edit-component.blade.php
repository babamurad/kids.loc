@section('title', 'Teacher Lesson Edit')
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
                <h4 class="mb-0 font-size-18">Sapaga Düzediş girizmek</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('teacher.dashboard') }}">Dolandryryş</a></li>
                        <li class="breadcrumb-item active"><a
                                    href="{{ route('teacher.teacher-lessons', ['teacherId' => auth()->user()->teacher->id]) }}">Sapaklar</a>
                        </li>
                        <li class="breadcrumb-item active">Düzediş girizmek</li>
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
                        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror"
                               placeholder="Sözbaşy" wire:model="title">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="border-danger"
                         @error('content') style="border: 1px solid #ee5455; display:block;" @enderror>
                        <div wire:ignore class="form-group">
                            <textarea class="@error('content') is-invalid @enderror" id="summernote"
                                      wire:model.live="content"></textarea>
                        </div>
                    </div>
                    @error('content')
                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>@enderror

                </div>
                <div class="card-footer">
                    <a href="{{ route('teacher.teacher-lessons', ['teacherId' => auth()->user()->id]) }}"
                       class="btn btn-secondary waves-effect waves-light">Close</a>
                    <button type="button" class="btn btn-primary waves-effect waves-light" wire:click="update">Save
                        changes
                    </button>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body text-center">

                    <div style="position: relative; display: inline-block;">
                        <div class="text-danger delete-button"
                             wire:click="delItem('img')"
                             style="cursor: pointer; position: absolute; top: 5px; right: 5px; z-index: 10;">
                            <i class="fas fa-times"></i>
                        </div>

                        @if($newImage)
                            <img wire:model="newImage" class="img-fluid rounded" src="{{ $newImage->temporaryUrl() }}"
                                 alt="Lessons Foto"
                                 @error('newImage') style="border: solid 1px red;" @enderror>
                        @elseif($image)
                            <img wire:model.live="image" class="img-fluid rounded"
                                 src="{{ asset('images/lesson/images/') . '/' . $image }}"
                                 alt="Lessons Foto"
                                 @error('image') style="border: solid 1px red;" @enderror>
                        @else
                            <img class="w-50" src="{{ asset('images/placeholder.jpg') }}" alt="">
                        @endif

                        <div class="form-group mt-1">
                            <label>Esasy surat</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('newImage') is-invalid @enderror"
                                       id="newImage" wire:model="newImage">
                                <label class="custom-file-label" for="newImage">Surat saýlamak</label>
                                @error('newImage')
                                <div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>

                    <div style="position: relative; display: inline-block;">
                        @if ($newVideo)
                            <div class="text-danger delete-button"
                                 wire:click="delItem('video')"
                                 style="cursor: pointer; position: absolute; top: 20px; right: 5px; z-index: 10;">
                                <i class="fas fa-times"></i>
                            </div>
                            <div class="mt-3">
                                <video id="video-preview" width="320" height="240" controls
                                       wire:key="{{ $newVideo->hashName() }}">
                                    <source src="{{ $newVideo->temporaryUrl() }}" type="video/mp4">
                                    Ваш браузер не поддерживает элемент видео.
                                </video>
                            </div>
                        @else
                            <div class="text-danger delete-button"
                                 wire:click="delItem('video')"
                                 style="cursor: pointer; position: absolute; top: 20px; right: 5px; z-index: 10;">
                                <i class="fas fa-times"></i>
                            </div>
                            <div class="mt-3">
                                <video width="320" height="240" controls>
                                    <source src="{{ asset('images/lesson/video/') . '/' . $video }}" type="video/mp4">
                                    Ваш браузер не поддерживает элемент видео.
                                </video>
                            </div>
                        @endif
                    </div>


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
                            <input type="file" class="custom-file-input @error('newVideo') is-invalid @enderror"
                                   id="newVideo" wire:model="newVideo" accept="video/*">
                            <label class="custom-file-label" for="newVideo">@if ($newVideo)
                                    {{ $newVideo->getClientOriginalName() }}
                                @else
                                    Wideo saýlamak
                                @endif</label>
                            @error('newVideo')
                            <div class="invalid-feedback">{{ $message }}</div>@enderror

                            <!-- Progress Bar -->
                            <div class="progress w-100 mt-1" x-show="uploading">
                                <progress class="progress-bar w-100" role="progressbar" style="width: 25%;"
                                          aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" max="100"
                                          x-bind:value="progress">

                                </progress>
                            </div>
                            <div x-show="uploading" class="mt-2">
                                <button class="btn btn-sm btn-outline-danger mt-3" type="button"
                                        wire:click="$cancelUpload('newVideo')">Cancel
                                </button>
                            </div>

                        </div>
                    </div>

                    <div style="position: relative; display: inline-block;">
                    @if ($newAudio)
                            <div class="text-danger delete-button"
                                 wire:click="delItem('audio')"
                                 style="cursor: pointer; position: absolute; top: 5px; right: 5px; z-index: 10;">
                                <i class="fas fa-times"></i>
                            </div>
                        <div class="mt-3">
                            {{--                                <h5>Audio:</h5>--}}
                            <audio id="audio-preview" width="320" height="240" controls
                                   wire:key="{{ $newAudio->hashName() }}">
                                <source src="{{ $newAudio->temporaryUrl() }}" type="audio/mp3">
                                Brauzeriňiz ses elementini goldamaýar.
                            </audio>
                        </div>
                    @else
                            <div class="text-danger delete-button"
                                 wire:click="delItem('audio')"
                                 style="cursor: pointer; position: absolute; top: 5px; right: 5px; z-index: 10;">
                                <i class="fas fa-times"></i>
                            </div>
                        <div class="mt-3">
                            {{--                                <h5>Audio:</h5>--}}
                            <audio width="320" height="240" controls>
                                <source src="{{ asset('images/lesson/audio/') . 'lesson-edit-component.blade.php/' . $audio }}"
                                        type="audio/mp3">
                                Brauzeriňiz ses elementini goldamaýar.
                            </audio>
                        </div>
                    @endif
                    </div>

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
                            <input type="file" class="custom-file-input @error('newAudio') is-invalid @enderror"
                                   id="newAudio" wire:model="newAudio" accept="audio/*">
                            <label class="custom-file-label" for="newAudio">@if ($newAudio)
                                    {{ $newAudio->getClientOriginalName() }}
                                @else
                                    Audio saýlamak
                                @endif</label>
                            @error('newAudio')
                            <div class="invalid-feedback">{{ $message }}</div>@enderror

                            <!-- Progress Bar -->
                            <div class="progress w-100 mt-1" x-show="uploading">
                                <progress class="progress-bar w-100" role="progressbar" style="width: 25%;"
                                          aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" max="100"
                                          x-bind:value="progress">

                                </progress>
                            </div>
                            <div x-show="uploading" class="mt-2">
                                <button class="btn btn-sm btn-outline-danger mt-3" type="button"
                                        wire:click="$cancelUpload('newVideo')">Cancel
                                </button>
                            </div>

                        </div>
                    </div>

                    <div style="position: relative; display: inline-block;">
                    @if ($file)
                            <div class="text-danger delete-button"
                                 wire:click="delItem('file')"
                                 style="cursor: pointer; position: absolute; top: 5px; right: 5px; z-index: 10;">
                                <i class="fas fa-times"></i>
                            </div>
                        <div class="mt-3">
                            <label>Faýla deslapky syn:</label>
                            <a href="{{ $file }}">@if($file)
                                    {{ asset('/images/lesson/files'). 'lesson-edit-component.blade.php/' . $file }}
                                @else
                                    Faýl saýla
                                @endif</a>
                        </div>
                    @endif
                    </div>

                    <div class="form-group mt-1">
                        <label>File</label>
                        <div class="custom-file"
                             x-data="{ uploading: false, progress: 0 }"
                             x-on:livewire-upload-start="uploading = true"
                             x-on:livewire-upload-finish="uploading = false"
                             x-on:livewire-upload-cancel="uploading = false"
                             x-on:livewire-upload-error="uploading = false"
                             x-on:livewire-upload-progress="progress = $event.detail.progress"
                        >
                            <input type="file" class="custom-file-input @error('newFile') is-invalid @enderror"
                                   id="newFile" wire:model="newFile" accept="file/*">
                            <label class="custom-file-label" for="newFile">@if ($newFile)
                                    {{ $newFile->getClientOriginalName() }}
                                @else
                                    File saýlamak
                                @endif</label>
                            @error('newFile')
                            <div class="invalid-feedback">{{ $message }}</div>@enderror

                            <!-- Progress Bar -->
                            <div class="progress w-100 mt-1" x-show="uploading">
                                <progress class="progress-bar w-100" role="progressbar" style="width: 25%;"
                                          aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" max="100"
                                          x-bind:value="progress">

                                </progress>
                            </div>
                            <div x-show="uploading" class="mt-2">
                                <button class="btn btn-sm btn-outline-danger mt-3" type="button">Cancel</button>
                            </div>

                        </div>
                    </div>

                        <div class="row">
                            @if ($file)
                                <div class="mt-3">
                                    <h5>Document Preview:</h5>
                                    @if (in_array(pathinfo($file, PATHINFO_EXTENSION), ['pdf']))
                                        <iframe src="{{ asset('images/lesson/files'). '/' . $file }}" style="width:100%; height:500px;"></iframe>
                                    @elseif (in_array(pathinfo($file, PATHINFO_EXTENSION), ['doc', 'docx']))
                                        <!-- DOCX Preview -->
                                        <div id="docx-preview" style="width: 100%; height: 500px; overflow: auto;"></div>
                                        <script>
                                            var input = '{{ asset($file) }}';
                                            fetch(input)
                                                .then(response => response.arrayBuffer())
                                                .then(arrayBuffer => mammoth.convertToHtml({arrayBuffer: arrayBuffer}))
                                                .then(result => {
                                                    document.getElementById('docx-preview').innerHTML = result.value;
                                                })
                                                .catch(err => console.log(err));
                                        </script>
                                    @elseif (in_array(pathinfo($file, PATHINFO_EXTENSION), ['pptx']))
                                        <!-- PPTX Preview -->
                                        <iframe src="https://view.officeapps.live.com/op/embed.aspx?src={{ urlencode(asset($file)) }}" style="width:100%; height:500px;" frameborder="0"></iframe>
                                    @endif
                                    <button wire:click="removeDocFile" class="btn btn-danger mt-2">Remove Document</button>
                                </div>
                            @endif
                            <div class="col-sm-6">
                                <div class="row mt-4">
                                    <div class="form-group pl-5">
                                        <div class="custom-control custom-checkbox mt-2 pl-2">
                                            <input type="checkbox" class="custom-control-input" id="status" wire:model="status" @if($status) checked @endif>
                                            <label class="custom-control-label" for="status">Published</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="row mt-4">
                                    <div class="form-group row mb-3">
                                        <label for="order" class="col-4 col-form-label pl-3">Order</label>
                                        <div class="col-8">
                                            <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" placeholder="Order" value="0" wire:model="order">
                                            @error('order')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-sm-6">
                                <div class="row form-group pl-5">
                                    <div class="custom-control custom-checkbox mt-2 pl-2">
                                        <input type="checkbox" class="custom-control-input" id="available" wire:model="available" @if($available) checked @endif>
                                        <label class="custom-control-label" for="available">Available</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="mr-2" for="until_date">Gutarýan wagty</label>
                                <input class="form-control" type="date" name="until_date" wire:model="until_date">
                            </div>
                        </div>


                    <div class="form-group">
                        <label>Kategoriýa</label>
                        <select class="form-control mb-3" wire:model="category_id">
                            <option value="">Kategoriýany saýlamak</option>
                            @foreach ($categories as $category)
                                <option wire:key="{{ $category->id }}"
                                        value="{{ $category->id }}">{{ $category->name }}</option>
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
    {{--    <script>--}}
    {{--        Livewire.on('videoUploaded', (url) => {--}}
    {{--            alert('videoUploaded');--}}
    {{--            document.getElementById('video-preview').src = url;--}}
    {{--        });--}}

    {{--        window.addEventListener('videoUploaded', (url) => {--}}
    {{--            alert('videoUploaded');--}}
    {{--            document.getElementById('video-preview').src = url;--}}
    {{--        })--}}
    {{--    </script>--}}

@endpush
