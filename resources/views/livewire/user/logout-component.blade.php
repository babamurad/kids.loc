<ul class="info d-flex flex-wrap list-unstyled m-0">
    <li class="social-icon text-white d-flex align-items-center me-3">
        <a wire:click="logout">Logout</a>
    </li>
    @if (Auth::user()->type == 'ADM'|| Auth::user()->type === 'TCH')
    <li class="social-icon text-white d-flex align-items-center me-3">
        |
    </li>
    <li class="social-icon text-white d-flex align-items-center ">
        @if(auth()->user()->teacher)
            <a href="{{ route('teacher.dashboard') }}" wire:navigate>Dashboard</a>
        @elseif(auth()->user()->type == 'ADM')
            <a href="{{ route('admin.dashboard') }}" wire:navigate>Dashboard</a>
        @endif

    </li>
    @endif

</ul>
