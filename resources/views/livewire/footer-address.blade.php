<div class="container text-center pt-4">
    <div class="row">
        <div class="col-sm-6">
            <h2>Mekdebe çenli bilim we terbiýe</h2>
            <h5>Türkmenistanyň Bilim Ministrligi</h5>
        </div>
        <div class="col-sm-6">
            <a class="navbar-brand" href="#">
                <h2>Ministrlik</h2>
            </a>
            <ul class="info list-unstyled mt-4">
                <li class="location text-capitalize mb-2 d-flex justify-content-center align-items-center">
                    <svg class="text-primary me-1" width="18" height="18">
                        <use xlink:href="#location"></use>
                    </svg>
                    {{ $company->address }}
                </li>
                <li class="email text-capitalize mb-2 d-flex justify-content-center align-items-center">
                    <svg class="text-primary me-1" width="18" height="18">
                        <use xlink:href="#email"></use>
                    </svg>{{ $company->email }}
                </li>
                <li class="phone text-capitalize mb-2 d-flex justify-content-center align-items-center">
                    <svg class="text-primary me-1" width="18" height="18">
                        <use xlink:href="#phone"></use>
                    </svg>{{ $company->phone }}
                </li>
                <li class="clock text-capitalize mb-2 d-flex justify-content-center align-items-center">
                    <svg class="text-primary me-1" width="18" height="18">
                        <use xlink:href="#clock"></use>
                    </svg>8:00-18:00, Ýekşenbe: Ýapyk
                </li>
            </ul>

        </div>
    </div>
</div>
