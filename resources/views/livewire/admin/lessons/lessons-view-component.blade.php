@section('title', 'Admin Lesson View')
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
                <h4 class="mb-0 font-size-18">Lesson View</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.admin-lessons') }}">Lessons</a> </li>
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
                        <input disabled type="text" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter First Name" wire:model="title">
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" wire:model="content" disabled></textarea>
                    </div>


                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.admin-lessons') }}" class="btn btn-secondary waves-effect waves-light">Close</a>
                    <button type="button" class="btn btn-primary waves-effect waves-light" wire:click="update">Save changes</button>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body text-center">
                    @if ($image)
                    <h5>Image:</h5>
                    <img wire:model="image" class="img-fluid rounded mb-4" src="{{ asset('images/lesson/images/') . '/' . $image }}" alt="Lessons Foto">
                    @else
                    <h5>No  Image</h5>
                    @endif


                    @if ($video)
                    <div class="mt-3">
                        <h5>Video Preview:</h5>
                        <video width="320" height="240" controls>
                            <source src="{{ asset('images/lesson/video/') . '/' . $video }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    @else
                    <h5>No Video</h5>
                    @endif
@assets
<script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.4.2/mammoth.browser.min.js"></script>
@endassets

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
