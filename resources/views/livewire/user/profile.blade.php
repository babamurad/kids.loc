<div class="dropdown d-inline-block">
    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="rounded-circle header-profile-user" src="{{ asset('admin/assets/images/users/avatar-1.jpg') }}"
             alt="Header Avatar">
        <span class="d-none d-sm-inline-block ml-1">
            @if(auth()->user()->type == 'TCH') {{auth()->user()->teacher->firstname . ' ' . auth()->user()->teacher->lastname}}
            @else {{ auth()->user()->name }} @endif
        </span>
        <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item d-flex align-items-center justify-content-between"
           href="{{ route('admin.dashboard') }}">
            <span>Profile</span>
            <span class="badge badge-pill badge-soft-danger">1</span>
        </a>
        <a class="dropdown-item d-flex align-items-center justify-content-between"
           href="{{ route('admin.company') }}">
            Settings
        </a>
        <a wire:navigate wire:click.prevent="logout" class="dropdown-item d-flex align-items-center justify-content-between"
           href="#">
            <span>Log Out</span>
        </a>
    </div>
</div>
