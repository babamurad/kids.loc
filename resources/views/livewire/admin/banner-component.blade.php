@section('title', 'Admin Company Info')
<section class="contact-us">
    <div class="mb-4">
        <div class="row">
            <div class="col-sm-4 pb-3">@include('components.alerts')</div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row card-title">
                            <h5>Bannerler</h5>
                        </div>

                        <div class="table-responsive"  x-data="{ open: false }">
                            <table class="table mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $key => $banner)
                                    <tr wire:key="{{ $banner->id }}">
                                        <th scope="row">{{ $banner->id }}</th>
                                        <td class="pr-0 mr-0">
                                            <a href=""  wire:click.prevent="isEdit({{ $banner->id }})">
                                                <img class="w-50 mr-3" src="{{ asset('images/banners') . '/' . $banner->image }}" alt="Banner suraty">
                                            </a>
                                        </td>
                                        <td>
                                            <div class="mt-2">{{ $banner->title }}</div>
                                        </td>
                                        <td>
                                            <button wire:click.prevent="isEdit({{ $banner->id }})"
                                                    class="btn btn-sm btn-warning mr-2">
                                                    <i class="fas fa-edit mr-1"></i>
                                                    Üýtgetmek
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div>
                        </div>

                    </div>
                    <!-- end card-body-->
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <h5 class="card-header">Banneriň suraty</h5>
                    <div class="card-body">
                        @if($bannerEdit)
                        <div class="row">
                            @if($newImage)
                                <img wire:model="newImage" class="img-fluid rounded ml-3"
                                     src="{{ $newImage->temporaryUrl() }}" alt="Banner Surat"
                                     @error('newImage') style="border: solid 1px red;" @enderror>
                            @else
                                <img wire:model="image" class="w-50 rounded ml-3" src="{{ asset('images/banners') . '/' . $image }}" alt="Banner Surat">
                            @endif
                        </div>
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <div class="ml-2">
                                        <label for="banner">{{ $title }}</label>
                                        <div class="custom-file">
                                            <input wire:model="newImage" type="file" class="custom-file-input" id="banner" name="banner">
                                            <label class="custom-file-label" for="banner">{{ $image }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mt-4 pt-1">
                                        <a href="#" class="btn btn-primary waves-effect waves-light" wire:click.prevent="update">Save</a>
                                    </div>

                                </div>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>
