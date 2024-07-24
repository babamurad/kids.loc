@section('title', 'Admin Lesson Edit')
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
                <h4 class="mb-0 font-size-18">Lesson Edit</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.teacher-lessons', ['teacherId' => auth()->user()->teacher->id]) }}">Lessons</a> </li>
                        <li class="breadcrumb-item active">Edit</li>
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
                        <label for="title">Title</label>
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
                    <a href="{{ route('admin.teacher-lessons', ['teacherId' => auth()->user()->id]) }}" class="btn btn-secondary waves-effect waves-light">Close</a>
                    <button type="button" class="btn btn-primary waves-effect waves-light" wire:click="update">Save changes</button>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body text-center">
                    @if($newImage)
                        <img wire:model="newImage" class="img-fluid rounded" src="{{ $newImage->temporaryUrl() }}" alt="Lessons Foto"
                             @error('newImage') style="border: solid 1px red;" @enderror>
                    @else
                        <img wire:model="image" class="img-fluid rounded" src="{{ asset('images/lesson/images/') . '/' . $image }}" alt="Lessons Foto"
                             @error('image') style="border: solid 1px red;" @enderror>
                    @endif
                    <div class="form-group mt-1">
                        <label>Main picture</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input  @error('newImage') is-invalid @enderror" id="newImage" wire:model="newImage">
                            <label class="custom-file-label" for="newImage">Choose file</label>
                            @error('newImage')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    @if ($newVideo)
                        <div class="mt-3">
                            <h5>Video Preview:</h5>
                            <video id="video-preview" width="320" height="240" controls wire:key="{{ $newVideo->hashName() }}">
                                <source src="{{ $newVideo->temporaryUrl() }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    @else
                        <div class="mt-3">
                            <h5>Video Preview:</h5>
                            <video width="320" height="240" controls>
                                <source src="{{ asset('images/lesson/video/') . '/' . $video }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    @endif

                    <div class="form-group mt-1">
                        <label>Video</label>
                        <div class="custom-file"
                             x-data="{ uploading: false, progress: 0 }"
                             x-on:livewire-upload-start="uploading = true"
                             x-on:livewire-upload-finish="uploading = false"
                             x-on:livewire-upload-cancel="uploading = false"
                             x-on:livewire-upload-error="uploading = false"
                             x-on:livewire-upload-progress="progress = $event.detail.progress"
                        >
                            <input type="file" class="custom-file-input @error('newVideo') is-invalid @enderror" id="newVideo" wire:model="newVideo" accept="video/*">
                            <label class="custom-file-label" for="newVideo">@if ($newVideo) {{ $newVideo->getClientOriginalName() }} @else Choose video @endif</label>
                            @error('newVideo')<div class="invalid-feedback">{{ $message }}</div>@enderror

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

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row mt-4">
                                <div class="form-group pl-5">
                                    <div class="custom-control custom-checkbox mt-2 pl-2">
                                        <input type="checkbox" class="custom-control-input" id="status" wire:model="status">
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
                                    <input type="checkbox" class="custom-control-input" id="available" wire:model="available">
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
                        <label>Category</label>
                        <select class="form-control mb-3" wire:model="category_id">
                            <option value="">Select Category</option>
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
    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                height: 400,
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
