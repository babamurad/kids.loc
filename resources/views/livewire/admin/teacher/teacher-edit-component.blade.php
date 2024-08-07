@section('title', 'Admin Teachers Edit')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Mugallymyň maglumatlaryna düzediş girizmek</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dolandyryş</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.teachers') }}">Mugallymlar</a> </li>
                        <li class="breadcrumb-item active">Düzediş</li>
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
                                <label for="firstname">Ady</label>
                                <input type="text" id="firstname" class="form-control @error('firstname') is-invalid @enderror" placeholder="Enter First Name" wire:model="firstname">
                                @error('firstname')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label for="lastname">Familiýasy</label>
                                <input type="text" id="lastname" class="form-control @error('lastname') is-invalid @enderror" placeholder="Enter Last Name" wire:model="lastname">
                                @error('lastname')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label for="position">Wezipesi</label>
                                <input type="text" id="position" class="form-control @error('position') is-invalid @enderror" placeholder="Enter Position" wire:model="position">
                                @error('position')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row mb-3">
                                        <label for="order" class="col-3 col-form-label">Tertip</label>
                                        <div class="col-9">
                                            <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" placeholder="Order" value="0" wire:model="order">
                                            @error('order')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="custom-control custom-checkbox mt-2">
                                        <input type="checkbox" class="custom-control-input" id="published" wire:model="published">
                                        <label class="custom-control-label" for="published">Ýagdaýy</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-1">
                                <label>Esasy surat</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input  @error('newImage') is-invalid @enderror" id="newImage" wire:model="newImage">
                                    <label class="custom-file-label" for="newImage">Surat saýlamak</label>
                                    @error('newImage')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desc">Bellik</label>
                                <textarea class="form-control" id="desc" rows="10" wire:model="desc"></textarea>
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
                    <a href="{{ route('admin.teachers') }}" class="btn btn-secondary waves-effect waves-light">Ýapmak</a>
                    <button type="button" class="btn btn-primary waves-effect waves-light" wire:click="update">Ýatda sakla</button>
                </div>
            </div>
        </div>
    </div>
</div>
