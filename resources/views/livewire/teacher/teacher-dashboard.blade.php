@section('title', 'Teacher Dashboard')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Dolandyryş</h4>
                <h1>{{ $teacher->name }}</h1>
                @include('components.alerts')
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mugallym</a></li>
                        <li class="breadcrumb-item active">Dolandyryş</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->



    <div class="row">
        @foreach ($lessonsByCategory as $categoryName => $data)
        <div class="col-xl-3 col-md-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="avatar-sm float-right">
                        <span class="avatar-title bg-soft-primary rounded-circle">
                            <i class="bx bx-layer m-0 h3 text-primary"></i>
                        </span>
                    </div>
                    <h6 class="text-muted text-uppercase mt-0">{{ $categoryName }}</h6>
                    <h3 class="my-3">{{ $data['count'] }}</h3>
                    <span class="text-muted">Umumy sapaklaryň sanyndan</span>
                    <span class="badge badge-soft-primary ml-auto"> {{ $data['percentage'] }}% </span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- end row -->


</div>
