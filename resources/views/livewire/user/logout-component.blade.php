<ul class="info d-flex flex-wrap list-unstyled m-0">
    <li class="social-icon text-white d-flex align-items-center me-3">
        <a wire:navigate wire:click="logout">Logout</a>
    </li> 
    @if (Auth::user()->type == 'ADM')
    <li class="social-icon text-white d-flex align-items-center me-3">
        |
    </li>
    <li class="social-icon text-white d-flex align-items-center ">
        <a href="{{ route('admin.dashboard') }}" wire:navigate>Dashboard</a>
    </li>                                
    @endif 
       
</ul>