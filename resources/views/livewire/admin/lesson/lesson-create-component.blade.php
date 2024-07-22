@section('title', 'Admin Lesson Create')
<div class="container-fluid">
    @include('components.alerts')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Lesson Create</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.teacher-lessons', ['teacherId' => auth()->user()->id]) }}">Lessons</a> </li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-9">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter First Name" wire:model="title">
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="border-danger" @error('content') style="border: 1px solid #ee5455; display:block;" @enderror>
                        <div wire:ignore class="form-group">
                            <textarea class="@error('content') is-invalid @enderror" id="summernote" wire:model="content"></textarea>
                        </div>
                    </div>
                    @error('content')<div class="invalid-feedback" style="display: block;">{{ $message }}</div>@enderror

                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.teacher-lessons', ['teacherId' => auth()->user()->id]) }}" class="btn btn-secondary waves-effect waves-light">Close</a>
                    <button type="button" class="btn btn-primary waves-effect waves-light" wire:click="create">Save changes</button>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
{{--                    @if($image)--}}
{{--                        <img wire:model="newImage" class="img-fluid rounded" src="{{ $image->temporaryUrl() }}" alt="Articles Foto">--}}
{{--                    @else--}}
{{--                        <img wire:model="image" class="img-fluid rounded" src="{{ asset('images/placeholder.jpg') }}" alt="Articles Foto"--}}
{{--                             @error('image')style="border: solid 1px red;" @enderror>--}}
{{--                    @endif--}}
                    <div class="form-group mt-1">
                        <label>Main picture</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input  @error('image') is-invalid @enderror" id="image" wire:model="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                            @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="form-group mt-1">
                        <label for="video">Upload Video</label>
                        <input type="file" class="custom-file-input @error('video') is-invalid @enderror" id="video" wire:model="video" accept="video/*">

                        @error('video')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror

                        <div class="custom-file">
                            <input type="file" class="custom-file-input  @error('image') is-invalid @enderror" id="image" wire:model="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                            @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                    </div>

                    @if ($video)
                        <div class="mt-3">
                            <h5>Video Preview:</h5>
                            <video width="320" height="240" controls>
                                <source src="{{ $video->temporaryUrl() }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    @endif

                    <div class="row mt-4">
                        <div class="form-group row mb-3">
                            <label for="order" class="col-4 col-form-label pl-3">Order</label>
                            <div class="col-8">
                                <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" placeholder="Order" value="0" wire:model="order">
                                @error('order')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group pl-2">
                        <div class="custom-control custom-checkbox mt-2 pl-2">
                            <input type="checkbox" class="custom-control-input" id="published" wire:model="published">
                            <label class="custom-control-label" for="published">Published</label>
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
@endpush
