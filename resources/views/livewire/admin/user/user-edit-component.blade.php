@section('title', 'Admin User Edit')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">User Edit</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.users') }}">Users</a> </li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 offset-3">
            <div class="card">
                <div class="card-body">
                        <div class="form-group">
                            <label for="firstname">Name</label>
                            <input disabled type="text" id="firstname" class="form-control @error('name') is-invalid @enderror" placeholder="Enter First Name" wire:model="name">
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input disabled type="text" id="lastname" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Last Name" wire:model="email">
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="type">Select</label>
                            <select class="form-control" id="type" wire:model.live="type">
                                <option value="ADM">Administrator</option>
                                <option value="TCH">Teacher</option>
                                <option value="USR">User</option>
                            </select>
                        </div>
                    @if($type == 'TCH')
                        @if($teachers)
                            <div class="form-group">
                                <label for="type">Teachers</label>
                                <select class="form-control" id="teacherId" wire:model="teacherId">
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->firstname . ' ' . $teacher->lastname }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    @endif
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.users') }}" class="btn btn-secondary waves-effect waves-light" wire:navigate>Close</a>
                    <button type="button" class="btn btn-primary waves-effect waves-light" wire:click="update">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
