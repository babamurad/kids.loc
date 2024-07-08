@section('title', 'Admin Teachers View')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Teachers Edit</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.teachers') }}">Teachers</a> </li>
                        <li class="breadcrumb-item active">Edit</li>
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
                                <label for="firstname">First Name</label>
                                <input disabled type="text" id="firstname" class="form-control @error('firstname') is-invalid @enderror" placeholder="Enter First Name" wire:model="firstname">
                                @error('firstname')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input disabled type="text" id="lastname" class="form-control @error('lastname') is-invalid @enderror" placeholder="Enter Last Name" wire:model="lastname">
                                @error('lastname')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label for="position">Position</label>
                                <input disabled type="text" id="position" class="form-control @error('position') is-invalid @enderror" placeholder="Enter Position" wire:model="position">
                                @error('position')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row mb-3">
                                        <label for="order" class="col-3 col-form-label">Order</label>
                                        <div class="col-9">
                                            <input disabled type="number" class="form-control @error('order') is-invalid @enderror" id="order" placeholder="Order" value="0" wire:model="order">
                                            @error('order')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="custom-control custom-checkbox mt-2">
                                        <input disabled type="checkbox" class="custom-control-input" id="published" wire:model="published">
                                        <label class="custom-control-label" for="published">Published</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-1">
                                <label>File Browser</label>
                                <div class="custom-file">
                                    <input disabled type="file" class="custom-file-input  @error('newImage') is-invalid @enderror" id="newImage" wire:model="newImage">
                                    <label class="custom-file-label" for="newImage">Choose file</label>
                                    @error('newImage')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desc">Description</label>
                                <textarea disabled class="form-control" id="desc" rows="10" wire:model="desc"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            @if($newImage)
                                <img class="rounded" src="{{ $newImage->temporaryUrl() }}" alt="News Image" >
                            @else
                                <img class="rounded" src="{{ asset('images/teachers') . '/' . $image }}" alt="Partners Logo Image" >
                            @endif

                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.teachers') }}" class="btn btn-secondary waves-effect waves-light">Close</a>
                    <a href="{{ route('admin.teachers.edit', ['id' => $editId]) }}" type="button" class="btn btn-info waves-effect waves-light">Edit</a>
                    <button type="button" class="btn btn-primary waves-effect waves-light" wire:click="update">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
