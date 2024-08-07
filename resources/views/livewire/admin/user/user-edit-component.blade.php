@section('title', 'Admin User Edit')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Ulanyjy maglumatlaryna düzediş girizmek</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dolandyryş</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.users') }}">Ulanyjylar</a> </li>
                        <li class="breadcrumb-item active">Düzediş</li>
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
                            <label for="firstname">Ady</label>
                            <input disabled type="text" id="firstname" class="form-control @error('name') is-invalid @enderror" placeholder="Enter First Name" wire:model="name">
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="email">E-poçta</label>
                            <input disabled type="text" id="lastname" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Last Name" wire:model="email">
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="type">Saýla</label>
                            <select class="form-control" id="type" wire:model.live="type">
                                <option value="ADM">Administrator</option>
                                <option value="TCH">Mugallym</option>
                                <option value="USR">Ulanyjy</option>
                            </select>
                        </div>
                    @if($type == 'TCH')
                        @if($teachers)
                            <div class="form-group">
                                <label for="type">Mugallymlar</label>
                                <select class="form-control" id="teacherId" wire:model="teacherId">
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" @if($teacherId == $teacher->id) selected @endif>
                                            {{ $teacher->firstname . ' ' . $teacher->lastname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    @endif

                    <div class="form-group">
                        <input wire:model="password" type="password" name="password" placeholder="Password"
                               class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input wire:model="password_confirmation" type="password" name="confirmed_password" placeholder="Confirmed Password" class="form-control">
                    </div>

                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.users') }}" class="btn btn-secondary waves-effect waves-light" wire:navigate>Ýapmak</a>
                    <button type="button" class="btn btn-primary waves-effect waves-light" wire:click="update">Ýatda sakla</button>
                </div>
            </div>
        </div>
    </div>
</div>
