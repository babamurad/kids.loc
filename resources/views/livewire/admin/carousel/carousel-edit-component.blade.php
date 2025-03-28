@section('title', 'Admin Carousel Item Edit')
<div class="container-fluid">
    @include('components.alerts')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Karusel düzediş</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dolandyryş</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.teachers') }}">Karusel</a> </li>
                        <li class="breadcrumb-item active">Düzet</li>
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
                        <label for="title">Sözbaşy</label>
                        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Sözbaşy" wire:model="title">
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                </div>
                <div class="card-footer">
                    <a wire:navigate href="{{ route('admin.carousel') }}" class="btn btn-secondary waves-effect waves-light">Ýapmak</a>
                    <button type="button" class="btn btn-primary waves-effect waves-light" wire:click="update">Ýatda sakla</button>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    @if($newImage)
                    <img wire:model="newImage" class="img-fluid rounded" src="{{ $newImage->temporaryUrl() }}" alt="Carousel Item Foto"
                    @error('newImage') style="border: solid 1px red;" @enderror>
                @else
                    <img wire:model="image" class="img-fluid rounded" src="{{ asset('images/carousel') . '/' . $image }}" alt="Carousel Item Foto"
                     @error('image') style="border: solid 1px red;" @enderror>
                @endif
                <div class="form-group mt-1">
                    <label>Esasy surat</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input  @error('newImage') is-invalid @enderror"
                            id="newImage" wire:model="newImage">
                        <label class="custom-file-label" for="newImage">Surat saýlamak</label>
                        @error('newImage')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                    <div class="row mt-4">
                        <div class="form-group row mb-3">
                            <label for="order" class="col-4 col-form-label pl-3">Tertip</label>
                            <div class="col-8">
                                <input type="number" class="form-control @error('order') is-invalid @enderror"
                                    id="order" placeholder="Order" value="0" wire:model="order">
                                @error('order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group pl-2">
                        <div class="custom-control custom-checkbox mt-2 pl-2">
                            <input type="checkbox" class="custom-control-input" id="status" wire:model.live="status"
                            @if ($status) checked @endif>
                            <label class="custom-control-label" for="status">Ýagdaýy</label>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
