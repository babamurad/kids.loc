@section('title', 'Admin Company Info')
<section class="contact-us">
    <div class="mb-4">
        <div class="row"><div class="col-sm-4 pb-3">@include('components.alerts')</div></div>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <h5 class="card-header">Institut</h5>
                    <div class="card-body">
                        <h4 class="card-title">Habarlaşmak üçin maglumat</h4>
                        <p class="card-text">Institut barada maglumaty üýtgetmek</p>
                        <div class="form-group">
                            <label for="ofname">Ýerleşýän ýeri</label>
                            <input type="text" id="ofname" class="form-control @error('ofname') is-invalid @enderror" placeholder="Place" wire:model="ofname" @if (!$EditOffice) disabled @endif>
                            @error('ofname')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="ofaddress">Salgysy</label>
                            <input type="text" id="ofaddress" class="form-control @error('ofaddress') is-invalid @enderror" placeholder="Address" wire:model="ofaddress" @if (!$EditOffice) disabled @endif>
                            @error('ofaddress')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="ofphone">Telefon belgisi</label>
                                    <input type="text" id="ofphone" class="form-control @error('ofphone') is-invalid @enderror" placeholder="Address" wire:model="ofphone" @if (!$EditOffice) disabled @endif>
                                    @error('ofphone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="ofemail">E-poçta</label>
                                    <input type="text" id="ofemail" class="form-control @error('ofemail') is-invalid @enderror" placeholder="Address" wire:model="ofemail" @if (!$EditOffice) disabled @endif>
                                    @error('ofemail')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <a href="#" class="btn btn-warning mr-2" wire:click="CanEditOffice">Düzediş</a>
                        <a href="#" class="btn btn-primary waves-effect waves-light" wire:click="updateOffice">Ýatda sakla</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <h5 class="card-header">Ministrlik</h5>
                    <div class="card-body">
                        <h4 class="card-title">Habarlaşmak üçin maglumat</h4>
                        <p class="card-text">Ministrlik barada maglumatlary üýtgetmek</p>
                        <div class="form-group">
                            <label for="maname">Ýerleşýän ýeri</label>
                            <input type="text" id="maname" class="form-control @error('maname') is-invalid @enderror" placeholder="Place" wire:model="maname" @if (!$EditManage) disabled @endif>
                            @error('maname')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="maaddress">Salgysy</label>
                            <input type="text" id="maaddress" class="form-control @error('maaddress') is-invalid @enderror" placeholder="Address" wire:model="maaddress" @if (!$EditManage) disabled @endif>
                            @error('maaddress')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="maphone">Telefon</label>
                                    <input type="text" id="maphone" class="form-control @error('maphone') is-invalid @enderror" placeholder="Address" wire:model="maphone" @if (!$EditManage) disabled @endif>
                                    @error('maphone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="maemail">E-poçta</label>
                                    <input type="text" id="maemail" class="form-control @error('maemail') is-invalid @enderror" placeholder="Address" wire:model="maemail" @if (!$EditManage) disabled @endif>
                                    @error('maemail')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <a href="#" class="btn btn-warning mr-2" wire:click="CanEditManage">Düzediş</a>
                        <a href="#" class="btn btn-primary waves-effect waves-light" wire:click="updateManage">Ýatda sakla</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
