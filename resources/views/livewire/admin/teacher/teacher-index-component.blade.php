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
                    </div>



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
                                <th>Published</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($teachers as $teacher)
                            <tr>
                                <th scope="row">1</th>
                                <td class="pr-0 mr-0"><img style="width: 15%;" src="{{ asset('images/teachers/'.$teacher->image) }}" alt=""> </td>
                                <td style="width: 15%;">{{ $teacher->firstname }}</td>
                                <td style="width: 15%;">{{ $teacher->lastname }}</td>
                                <td>{{ $teacher->position }}</td>
                                <td>{{ $teacher->order }}</td>
                                <td>{{ $teacher->published }}</td>
                                <td style="width: 12%;">
                                    <a href="{{ route('admin.teachers.edit', ['id' => $teacher->id]) }}" class="btn btn-sm btn-success mr-2"><i class="fas fa-edit"></i></a>
                                    <button class="btn btn-sm btn-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show Employee"><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-sm btn-danger"data-toggle="modal" data-target="#ConfirmDelete"><i class="fas fa-trash-alt"></i></button>

                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end card-body-->
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Teacher</h5>
                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" id="firstname" class="form-control" placeholder="Enter your First Name">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" id="lastname" class="form-control" placeholder="Enter your Last Name">
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row mb-3">
                                        <label for="order" class="col-3 col-form-label">Order</label>
                                        <div class="col-9">
                                            <input type="number" class="form-control" id="order" placeholder="Order" value="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="custom-control custom-checkbox mt-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Published</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-1">
                                <label>File Browser</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desc">Description</label>
                                <textarea class="form-control" id="desc" rows="9"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6"><img class="img-fluid" src="{{ asset('images/team-item2.jpg') }}" alt=""></div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
