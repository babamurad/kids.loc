@section('title', 'Paroly çalyşmak')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Paroly çalyşmak</h4>
                @include('components.alerts')
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('teacher.dashboard') }}" wire:navigate>Dolandyryş</a></li>
                        <li class="breadcrumb-item active">Paroly çalyşmak</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-lg-4">
            <div class="card card-animate">
                <div class="card-body">
                    <div>
                        <h2>Paroly çalyşmak</h2>

                        <form wire:submit.prevent="resetPassword">
                            @csrf

                            <div class="mb-3">
                                <label for="currentPassword" class="form-label">Häzirki parol</label>
                                <input type="password" wire:model="currentPassword" id="currentPassword" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Täze parol</label>
                                <input type="password" wire:model="password" id="password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Paoly tassyklaň</label>
                                <input type="password" wire:model="password_confirmation" name="password_confirmation" id="password_confirmation" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Üýtgetmek</button>
                        </form>
                    </div>


                </div>
            </div>
        </div> <!-- end col -->

        @if (Auth::user()->type == 'ADM')
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
            </div>
            <!-- end col -->
        @endif

    </div>
    <!-- end row-->

</div>
