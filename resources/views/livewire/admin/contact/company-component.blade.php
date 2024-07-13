@section('title', 'Admin Company Info')
<section class="contact-us">
    <div class="mb-4">
        <div class="row"><div class="col-sm-4 pb-3">@include('components.alerts')</div></div>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <h5 class="card-header">Office</h5>
                    <div class="card-body">
                        <h4 class="card-title">Contact Information</h4>
                        <p class="card-text">Update information about Office</p>
                        <div class="form-group">
                            <label for="ofname">Place</label>
                            <input type="text" id="ofname" class="form-control @error('ofname') is-invalid @enderror" placeholder="Place" wire:model="ofname" @if (!$EditOffice) disabled @endif>
                            @error('ofname')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="ofaddress">Address</label>
                            <input type="text" id="ofaddress" class="form-control @error('ofaddress') is-invalid @enderror" placeholder="Address" wire:model="ofaddress" @if (!$EditOffice) disabled @endif>
                            @error('ofaddress')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="ofphone">Phone</label>
                                    <input type="text" id="ofphone" class="form-control @error('ofphone') is-invalid @enderror" placeholder="Address" wire:model="ofphone" @if (!$EditOffice) disabled @endif>
                                    @error('ofphone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="ofemail">Email</label>
                                    <input type="text" id="ofemail" class="form-control @error('ofemail') is-invalid @enderror" placeholder="Address" wire:model="ofemail" @if (!$EditOffice) disabled @endif>
                                    @error('ofemail')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <a href="#" class="btn btn-warning mr-2" wire:click="CanEditOffice">Edit</a>
                        <a href="#" class="btn btn-primary waves-effect waves-light" wire:click="updateOffice">Save</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <h5 class="card-header">Management</h5>
                    <div class="card-body">
                        <h4 class="card-title">Contact Information</h4>
                        <p class="card-text">Update information about Management</p>
                        <div class="form-group">
                            <label for="maname">Place</label>
                            <input type="text" id="maname" class="form-control @error('maname') is-invalid @enderror" placeholder="Place" wire:model="maname" @if (!$EditManage) disabled @endif>
                            @error('maname')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="maaddress">Address</label>
                            <input type="text" id="maaddress" class="form-control @error('maaddress') is-invalid @enderror" placeholder="Address" wire:model="maaddress" @if (!$EditManage) disabled @endif>
                            @error('maaddress')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="maphone">Phone</label>
                                    <input type="text" id="maphone" class="form-control @error('maphone') is-invalid @enderror" placeholder="Address" wire:model="maphone" @if (!$EditManage) disabled @endif>
                                    @error('maphone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="maemail">Email</label>
                                    <input type="text" id="maemail" class="form-control @error('maemail') is-invalid @enderror" placeholder="Address" wire:model="maemail" @if (!$EditManage) disabled @endif>
                                    @error('maemail')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <a href="#" class="btn btn-warning mr-2" wire:click="CanEditManage">Edit</a>
                        <a href="#" class="btn btn-primary waves-effect waves-light" wire:click="updateManage">Save</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
