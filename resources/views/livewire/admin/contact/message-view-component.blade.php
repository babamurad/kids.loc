@section('title', 'Admin View Message')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Message</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.messages') }}">Message</a> </li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input disabled type="text" id="name" class="form-control" wire:model="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input disabled type="text" id="email" class="form-control" wire:model="email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input disabled type="text" id="phone" class="form-control" wire:model="phone">
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="read"
                               @if($read) checked @endif
                               wire:model.live="read"
                               wire:click="readUpdate">
                        <label class="custom-control-label" for="read">Is read</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input disabled type="text" id="subject" class="form-control" wire:model="subject">
                    </div>
                    <div class="form-group">
                        <label for="text">Textarea</label>
                        <textarea disabled class="form-control" id="text" rows="3" wire:model="text"></textarea>
                    </div>

                </div>
                <div class="card-footer">
                    <a wire:navigate href="{{ route('admin.messages') }}" class="btn btn-secondary waves-effect waves-light">
                        Close
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
