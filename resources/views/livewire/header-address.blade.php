<div>
    <ul class="info d-flex flex-wrap list-unstyled m-0">
        <li class="location text-capitalize text-white d-flex align-items-center me-4">
            <svg class="me-1" width="18" height="18">
                <use xlink:href="#location"></use>
            </svg>
            {{ $company->address }}
        </li>
        <li class="phone text-capitalize text-white d-flex align-items-center me-4">
            <svg class="me-1" width="18" height="18">
                <use xlink:href="#phone"></use>
            </svg>{{ $company->phone }}
        </li>
    </ul>
</div>
