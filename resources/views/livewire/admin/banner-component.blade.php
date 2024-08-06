@section('title', 'Admin Company Info')
<section class="contact-us">
    <div class="mb-4">
        <div class="row">
            <div class="col-sm-4 pb-3">
                <div class="card">
                    <div class="card-title">

                    </div>
                </div>
            </div>
            <div class="col-sm-4 pb-3">@include('components.alerts')</div>

        </div>
        <div class="row">
            @foreach($items as $key => $banner)
            <div class="col-sm-6">
                <div class="card">
                    @if($loop->index == 0)
                        <div class="row">
                            <div class="col-sm-6"><h5 class="card-header">Bannerler</h5></div>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <label for="ofname{{$key}}">{{ $banner->title }}</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="ofname{{$key}}" name="ofname{{$key}}" @if(!$EditId == $banner->id) disabled @endif>
                                        <label class="custom-file-label" for="ofname{{$key}}">{{ $banner->image }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label for="">Hereket</label>
                                <div>
                                    <a href="#" class="btn btn-sm btn-warning mr-2" wire:click.prevent="isEdit({{ $banner->id }})">Edit</a>
                                    <a href="#" class="btn btn-sm btn-primary waves-effect waves-light" wire:click.prevent="updateOffice">Save</a>
                                </div>

                            </div>
                        </div>


                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <h5 class="card-header">Banneriň suraty</h5>
                        <div class="card-body">

                            <img class="w-50 rounded" src="{{ asset('images/placeholder.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            @endforeach
            </div>

        </div>
</section>
