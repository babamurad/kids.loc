@section('title', 'Admin Article Create')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Article Create</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.teachers') }}">Articles</a> </li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter First Name" wire:model="title">
                                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div wire:ignore class="form-group">
                                <textarea id="summernote" wire:model="content"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" id="lastname" class="form-control @error('lastname') is-invalid @enderror" placeholder="Enter Last Name" wire:model="lastname">
                                @error('lastname')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label for="position">Position</label>
                                <input type="text" id="position" class="form-control @error('position') is-invalid @enderror" placeholder="Enter Position" wire:model="position">
                                @error('position')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row mb-3">
                                        <label for="order" class="col-3 col-form-label">Order</label>
                                        <div class="col-9">
                                            <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" placeholder="Order" value="0" wire:model="order">
                                            @error('order')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="custom-control custom-checkbox mt-2">
                                        <input type="checkbox" class="custom-control-input" id="published" wire:model="published">
                                        <label class="custom-control-label" for="published">Published</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-1">
                                <label>File Browser</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input  @error('image') is-invalid @enderror" id="image" wire:model="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                    @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desc">Description</label>
                                <textarea class="form-control" id="desc" rows="10" wire:model="desc"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            @if($image)
                                <img class="img-fluid" src="{{ $image->temporaryUrl() }}" alt="Teachers Foto">
                            @else
                                <img class="img-fluid" src="{{ asset('images/default-avatar.jpg') }}" alt="Teachers Foto"
                                     @error('image')style="border: solid 1px red;" @enderror>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.teachers') }}" class="btn btn-secondary waves-effect waves-light">Close</a>
                    <button type="button" class="btn btn-primary waves-effect waves-light" wire:click="create">Save changes</button>
                </div>
            </div>
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
