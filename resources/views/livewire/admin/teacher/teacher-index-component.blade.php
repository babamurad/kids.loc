@section('title', 'Admin Teachers List')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Teachers</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Teachers</li>
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
                            <h4 class="">Teachers List</h4>
                        </div>
                        <div class="col-sm-3 mb-2">
{{--                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#exampleModal">--}}
{{--                                Create--}}
{{--                            </button>--}}
                            <a href="{{ route('admin.teachers.create') }}" class="btn btn-primary waves-effect waves-light">
                                Create
                            </a>
                        </div>
                        <div class="col-sm-3 mb-2">
                            <div class="input-group">
                                <input wire:model.live="searchTerm" type="text" class="form-control" id="validationCustomUsername" placeholder="Search ... min 3 characters" aria-describedby="inputGroupPrepend">
                                <div class="invalid-feedback">
                                  Please choose a username.
                                </div>
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="bx bx-search-alt-2"></i></span>
                                  </div>
                            </div>
                        </div>
                    </div>



                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>
                                    <span wire:click.prevent="sortField('firstname')" href="" type="button" class="@if($sortBy=='firstname') text-primary @endif">First Name
                                        @if($sortBy=='firstname') {!!$sortIcon!!} @else <i class="bx bx-sort-up ml-1"></i> @endif
                                    </span>
                                </th>
                                <th>
                                    <span wire:click.prevent="sortField('lastname')" href="" type="button" class="@if($sortBy=='lastname') text-primary @endif">Last Name
                                        @if($sortBy=='lastname') {!!$sortIcon!!} @else <i class="bx bx-sort-up ml-1"></i> @endif
                                    </span>
                                </th>
                                <th>Position</th>
                                <th>
                                    <span wire:click.prevent="sortField('order')" href="" type="button" class="@if($sortBy=='order') text-primary @endif">Order
                                        @if($sortBy=='order') {!!$sortIcon!!} @else <i class="bx bx-sort-up"></i> @endif
                                    </span>
                                </th>
                                <th>
                                    <span wire:click.prevent="sortField('published')" href="" type="button" class="@if($sortBy=='published') text-primary @endif">Published
                                        @if($sortBy=='published') {!!$sortIcon!!} @else <i class="bx bx-sort-up"></i> @endif
                                    </span>
                                </th>
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
                                <td style="width: 10%;">{{ $teacher->position }}</td>
                                <td>{{ $teacher->order }}</td>
                                <td>{{ $teacher->published }}</td>
                                <td style="width: 12%;">
                                    <a href="{{ route('admin.teachers.edit', ['id' => $teacher->id]) }}" class="btn btn-sm btn-success mr-2"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('admin.teachers.view', ['id' => $teacher->id]) }}" class="btn btn-sm btn-warning mr-2"><i class="fas fa-eye"></i></a>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ConfirmDelete" wire:click="deleteId({{ $teacher->id }})"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $teachers->links() }}
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
