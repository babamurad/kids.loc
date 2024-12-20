<div class="dropdown d-inline-block">
    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="rounded-circle header-profile-user"
             src="{{Auth::user()->teacher? asset('/images/teachers') . '/' . auth()->user()->teacher->image : asset('/images/default-avatar.jpg') }}"
             alt="Header Avatar">
        <span class="d-none d-sm-inline-block ml-1">
            @if(auth()->user()->type == 'TCH') {{auth()->user()->teacher->firstname . ' ' . auth()->user()->teacher->lastname}}
            @else {{ auth()->user()->name }} @endif
        </span>
        <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right">
        @if(Auth::user()->teacher)
        <a class="dropdown-item d-flex align-items-center justify-content-between"
           href="{{ route('teacher.dashboard') }}">
            <span>Dolandyryş</span>
        </a>
        <a class="dropdown-item d-flex align-items-center justify-content-between"
           href="{{  route('teacher.teacher-lessons', ['teacherId' => auth()->user()->teacher->id]) }}">
            <span>Sapaklar</span>
            <span class="badge badge-pill badge-soft-danger">{{ $lessonCount }}</span>
        </a>
        @elseif(auth()->user()->type == 'ADM')
            <a class="dropdown-item d-flex align-items-center justify-content-between"
               href="{{ route('admin.dashboard') }}">
                <span>Dolandyryş</span>
            </a>
        @endif
        <button wire:click.prevent="logout" class="dropdown-item d-flex align-items-center justify-content-between">
            <span>Çykmak</span>
        </button>
    </div>
</div>
