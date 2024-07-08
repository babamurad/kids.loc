@section('title', 'Admin About')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">About</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">About</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row card-title">
                        <div class="col-sm-2">
                            <h4 class="">About</h4>
                        </div>
                        <div class="col-sm-2 mb-2">
                            <a href="#" class="btn btn-primary waves-effect waves-light" wire:click="update">
                                Save
                            </a>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-sm-6">
                            <div class="form-group text-left">
                                <label>File Browser</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" wire:model="newImage">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>

                            <div class="form-group text-left">
                                <label for="title">Title</label>
                                <input type="text" id="title" class="form-control" placeholder="Enter title" wire:model="title">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            @if ($newImage)
                            <img class="rounded mb-2 w-25" src="{{ $newImage->temporaryUrl() }}" alt="News Image" >
                            @else
                            <img class="rounded mb-2 w-25" src="{{ asset('images/about') . '/' . $image }}" alt="Image" >
                            @endif
                        </div>

                    </div>
                    <div wire:ignore>
                        <textarea id="summernote" wire:model="content"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('editor-css')
    <link href="{{ asset('admin/assets/plugins/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/plugins/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/plugins/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    @endpush

    @push('editor-js')
 <script>
    $(document).ready(function() {
  $('#summernote').summernote({
    height: 200,
  });
});

$('#summernote').on('summernote.change', function(we, contents, $editable){
    @this.set('text', contents)
});
 </script>
    @endpush
