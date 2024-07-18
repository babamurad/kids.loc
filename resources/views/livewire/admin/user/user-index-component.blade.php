@section('title', 'Admin Users')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Users</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">users</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row card-title">
                        <div class="col-sm-3">
                            <h4 class="">users List</h4>
                        </div>
                        <div class="col-sm-3 mb-2">
                            {{-- <a href="{{ route('admin.teachers.create') }}" class="btn btn-primary waves-effect waves-light">
                                Create
                            </a> --}}
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th><a href="" type="button">Email<i class="bx bx-sort-up ml-1"></i></a> </th>
                                <th>Type<i class="bx bx-sort-down"></i></th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->type_label }}</td>
                                    <td style="width: 12%;">
                                        <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" class="btn btn-sm btn-success mr-2"><i class="fas fa-edit"></i></a>

                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ConfirmDelete" wire:click="deleteId({{ $user->id }})"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $users->links() }}
                </div>
                <!-- end card-body-->
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('closeModal', event=> {
            $('#ConfirmDelete').modal('hide');
        })

    </script>

    <!-- Modal -->

    <div wire:ignore.self class="modal fade" id="ConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="ConfirmDelete" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ConfirmDelete">Modal title</h5>
                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Вы действительно хотите удалить?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Отмена</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light" wire:click="destroy">Удалить</button>
                </div>
            </div>
        </div>
    </div>
</div>
