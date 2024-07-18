@section('title', 'Admin Dashboard')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Dashboard</h4>
@include('components.alerts')
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Opatix</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="avatar-sm float-right">
                        <span class="avatar-title bg-soft-primary rounded-circle">
                            <i class="bx bx-layer m-0 h3 text-primary"></i>
                        </span>
                    </div>
                    <h6 class="text-muted text-uppercase mt-0">Project Income</h6>
                    <h3 class="my-3">$4,514</h3>
                    <span class="badge badge-soft-primary mr-1"> +11% </span> <span class="text-muted">From previous period</span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="avatar-sm float-right">
                        <span class="avatar-title bg-soft-primary rounded-circle">
                            <i class="bx bx-dollar-circle m-0 h3 text-primary"></i>
                        </span>
                    </div>
                    <h6 class="text-muted text-uppercase mt-0">Net Revenue</h6>
                    <h3 class="my-3">$85,365</h3>
                    <span class="badge badge-soft-primary mr-1"> -29% </span> <span class="text-muted">This Month</span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="avatar-sm float-right">
                        <span class="avatar-title bg-soft-primary rounded-circle">
                            <i class="bx bx-analyse m-0 h3 text-primary"></i>
                        </span>
                    </div>
                    <h6 class="text-muted text-uppercase mt-0">New Leads</h6>
                    <h3 class="my-3">$<span data-plugin="counterup">9.94</span></h3>
                    <span class="badge badge-soft-primary mr-1"> 0% </span> <span class="text-muted">This Month</span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="avatar-sm float-right">
                        <span class="avatar-title bg-soft-primary rounded-circle">
                            <i class="bx bx-basket m-0 h3 text-primary"></i>
                        </span>
                    </div>
                    <h6 class="text-muted text-uppercase mt-0">Quoted </h6>
                    <h3 class="my-3" data-plugin="counterup">5,842</h3>
                    <span class="badge badge-soft-primary mr-1"> +89% </span> <span class="text-muted">This Month</span>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-4">
            <div class="card card-animate">
                <div class="card-body">
                    <div>
                        <h2>Изменение пароля</h2>

                        <form wire:submit.prevent="resetPassword">
                            @csrf

                            <div class="mb-3">
                                <label for="currentPassword" class="form-label">Текущий пароль</label>
                                <input type="password" wire:model="currentPassword" id="currentPassword" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Новый пароль</label>
                                <input type="password" wire:model="password" id="password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Подтверждение нового пароля</label>
                                <input type="password" wire:model="password_confirmation" name="password_confirmation" id="password_confirmation" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Изменить пароль</button>
                        </form>
                    </div>


                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-lg-8">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="dropdown float-right position-relative">
                        <a href="#" class="dropdown-toggle h4 text-muted" data-toggle="dropdown"
                           aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#" class="dropdown-item">Action</a></li>
                            <li><a href="#" class="dropdown-item">Another action</a></li>
                            <li><a href="#" class="dropdown-item">Something else here</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a href="#" class="dropdown-item">Separated link</a></li>
                        </ul>
                    </div>

                    <div class="card-title">
                        <div class="row">
                            <h4 class="d-inline-block mr-3">
                                Teachers
                            </h4>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Position</th>
                                        <th>Order</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($teachers as $teacher)
                                        <tr>
                                            <th scope="row">{{ $loop->index + 1 }}</th>
                                            <td class="pr-0 mr-0"><a href="{{ route('admin.teachers.edit', ['id' => $teacher->id]) }}"><img style="width: 15%;" src="{{ asset('images/teachers/'.$teacher->image) }}" alt=""></a>  </td>
                                            <td style="width: 15%;"><a href="{{ route('admin.teachers.edit', ['id' => $teacher->id]) }}">{{ $teacher->firstname }}</a></td>
                                            <td style="width: 15%;"><a href="{{ route('admin.teachers.edit', ['id' => $teacher->id]) }}">{{ $teacher->lastname }}</a></td>
                                            <td>{{ $teacher->position }}</td>
                                            <td>{{ $teacher->order }}</td>
                                            <td>{{ $teacher->published }}</td>
                                            <td style="width: 12%;">
{{--                                                <a href="{{ route('admin.teachers.edit', ['id' => $teacher->id]) }}" class="btn btn-sm btn-success mr-2"><i class="fas fa-edit"></i></a>--}}
                                                <a href="{{ route('admin.teachers.view', ['id' => $teacher->id]) }}" class="btn btn-sm btn-warning mr-2"><i class="fas fa-eye"></i></a>
                                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ConfirmDelete" wire:click="deleteId({{ $teacher->id }})"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div> <!-- end col -->

    </div>
    <!-- end row-->

</div>
