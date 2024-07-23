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
                            <h4 class="">Users List</h4>
                        </div>
                        <div class="col-sm-3 mb-2">
                            <div class="input-group">
                                <input wire:model.live="searchTerm" type="text" class="form-control"
                                    id="validationCustomUsername" placeholder="Search ...minimum 3 characters"
                                    aria-describedby="inputGroupPrepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">
                                        <i class="bx bx-search-alt-2"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>
                                        <span wire:click.prevent="sortField('name')" href="" type="button"
                                            class="@if ($sortBy == 'name') text-primary @endif">Name
                                            @if ($sortBy == 'name')
                                                {!! $sortIcon !!}
                                            @else
                                                <i class="bx bx-sort-up ml-1"></i>
                                            @endif
                                        </span>
                                    </th>
                                    <th>
                                        <span wire:click.prevent="sortField('email')" href="" type="button"
                                            class="@if ($sortBy == 'email') text-primary @endif">Email
                                            @if ($sortBy == 'email')
                                                {!! $sortIcon !!}
                                            @else
                                                <i class="bx bx-sort-up ml-1"></i>
                                            @endif
                                        </span>

                                    </th>
                                    <th>
                                        <span wire:click.prevent="sortField('type')" href="" type="button"
                                            class="@if ($sortBy == 'type') text-primary @endif">Type
                                            @if ($sortBy == 'type')
                                                {!! $sortIcon !!}
                                            @else
                                                <i class="bx bx-sort-up ml-1"></i>
                                            @endif
                                        </span>
                                    </th>
                                    <th>
                                        <span wire:click.prevent="sortField('created_at')" href="" type="button"
                                            class="@if ($sortBy == 'created_at') text-primary @endif">Date
                                            @if ($sortBy == 'created_at')
                                                {!! $sortIcon !!}
                                            @else
                                                <i class="bx bx-sort-up ml-1"></i>
                                            @endif
                                        </span>
                                    </th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row" style="width: 5%;">{{ $loop->index + 1 }}</th>
                                        <td style="width: 20%;"><a href="{{ route('admin.users.edit', ['id' => $user->id]) }}">{{ $user->name }}</a></td>
                                        <td style="width: 20%;">{{ $user->email }}</td>
                                        <td style="width: 20%;">{{ $user->type_label }}</td>
                                        <td style="width: 15%;">
                                            {{ Carbon\Carbon::create($user->created_at)->format('d.m.Y') }}</td>
                                        <td style="width: 20%;">
                                            <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}"
                                                class="btn btn-sm btn-success mr-2"><i class="fas fa-edit"></i></a>

                                            <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#ConfirmDelete"
                                                wire:click="deleteId({{ $user->id }})"><i
                                                    class="fas fa-trash-alt"></i></button>
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
        window.addEventListener('closeModal', event => {
            $('#ConfirmDelete').modal('hide');
        })
    </script>

    <!-- Modal -->

    <div wire:ignore.self class="modal fade" id="ConfirmDelete" tabindex="-1" role="dialog"
        aria-labelledby="ConfirmDelete" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ConfirmDelete">Modal title</h5>
                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Вы действительно хотите удалить?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect waves-light"
                        data-dismiss="modal">Отмена</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light"
                        wire:click="destroy">Удалить</button>
                </div>
            </div>
        </div>
    </div>
</div>
