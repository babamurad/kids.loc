@section('title', 'Admin Lessons List')
@assets
<link href="{{ asset('admin/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('admin/assets/plugins/select2/select2.min.js') }}"></script>
@endassets

@push('select-js')

    <script>
        // $('[data-toggle="select2"]').select2();
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {

            $('#teacherId').select2();
            console.log('ready');
            $('#teacherId').on('change', function (event){
                console.log(event.target.value);
                @this.set('teacherId', event.target.value);
            });
        });
        window.addEventListener('tidUpdate', event=> {
            //$('#teacherId').select2();
            console.log('tidUpdate');
        })
    </script>
@endpush


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @include('components.alerts')
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Lessons</h4>
{{--                <a href="{{ route('admin.admin-lessons.create') }}" class="btn btn-primary waves-effect waves-light">--}}
{{--                    Döret--}}
{{--                </a>--}}
                <h5 class="h5">Category: <span class="badge badge-primary badge-pill">{{ $categoryId != 0 ? $categoryName : '' }}</span>
                    /
                    Teacher: <span class="badge badge-success badge-pill">{{ $teacherId != 0 ? $teacherName : '' }}</span> </h5>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Lessons</li>
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
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Category</label>
                                </div>
                                <div class="col-sm-9">
                                    <select class="form-control mb-3" wire:model.live="categoryId">
                                        <option value="0">Hemmesi</option>
                                        @foreach ($categories as $category)
                                            <option wire:key="{{ $category->id }}" value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-3">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Teacher</label>
                                </div>
                                <div class="col-sm-9">
                                    <div wire:ignore class="form-group" data-select2-id="7">
                                        <select id="teacherId" class="form-control"  data-toggle="select2" wire:model.live="teacherId">
                                            <option value="0">Hemmesi</option>
                                            @foreach ($teachers as $teacher)
                                                <option wire:key="{{ $teacher->id }}" value="{{ $teacher->id }}">{{ $teacher->firstname . ' ' . $teacher->lastname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
{{--                                    <select class="form-control mb-3" wire:model.live="teacherId">--}}
{{--                                        <option value="0">Hemmesi</option>--}}
{{--                                        @foreach ($teachers as $teacher)--}}
{{--                                            <option wire:key="{{ $teacher->id }}" value="{{ $teacher->id }}">{{ $teacher->firstname . ' ' . $teacher->lastname }}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 mb-2">
                            <div class="input-group">
                                <input wire:model.live="search" type="text" class="form-control" id="validationCustomUsername"
                                       placeholder="Search ...minimum 3 characters" aria-describedby="inputGroupPrepend">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">
                                        <i class="bx bx-search-alt-2"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 mb-2">
                            <div class="row justify-content-end">
                                <div class="col-sm-3"><label for="perPage">Per Page</label></div>
                                <div class="col-sm-3">
                                    <select name="perPage" class="form-control form-control-sm" wire:model.live="perPage">
                                        <option>5</option>
                                        <option>10</option>
                                        <option>20</option>
                                        <option>50</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="table-responsive">

                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Title</th>
                                <th>Teacher</th>
                                <th>Category</th>
                                <th>Published</th>
                                <th>Order</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($lessons)
                                @foreach($lessons as $lesson)

                                    <tr wire:key="{{ $lesson->id }}">
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td class="pr-0 mr-0"><a href="{{ route('admin.admin-lessons.view', ['id' => $lesson->id]) }}">
                                                <img class="mr-3" style="width: 15%;" src="{{ asset('images/lesson/images/'.$lesson->image) }}" alt="">
                                                <strong>{{ $lesson->title }}</strong>
                                            </a>
                                        </td>
                                        <th scope="row">{{ $lesson->teacher->firstname . ' ' . $lesson->teacher->lastname }}</th>
                                        <th scope="row">{{ $lesson->category->name }}</th>
                                        <td>
                                            <label class="mt-2">
                                                @if ( $lesson->status )
                                                    <span class="badge badge-success">Published</span>
                                                @else
                                                    <span class="badge badge-danger">Not Published</span>
                                                @endif
                                            </label>


                                        </td>
                                        <td style="width: 7%;">
                                            <div class="row">
                                                {{-- <span type="button" class="btn waves-effect text-danger " wire:click="DecOrder({{ $lesson->id }})" style="padding: 0.5rem 0.6rem; font-size: 14px;"><i class="bx bx-minus"></i></span> --}}
                                                <span class="badge badge-secondary badge-pill mt-2 ml-3">{{ $lesson->order }}</span>
                                                {{-- <span type="button" class="btn waves-effect text-danger bold" wire:click="IncOrder({{ $lesson->id }})" style="padding: 0.5rem 0.6rem; font-size: 14px;"><i class="bx bx-plus"></i></span> --}}
                                            </div>

                                        </td>
                                        <td style="width: 10%;">
                                            <div class="mt-2">{{ Carbon\Carbon::create($lesson->created_at)->format('d.m.Y') }}</div>
                                        </td>
                                        <td style="width: 12%;">
{{--                                            <a href="#" class="btn btn-sm btn-success mr-2 mt-2"><i class="fas fa-edit"></i></a>--}}
                                             <a href="{{ route('admin.admin-lessons.view', ['id' => $lesson->id]) }}" class="btn btn-sm btn-warning mr-2 mt-2"><i class="fas fa-eye"></i></a>
                                            <button class="btn btn-sm btn-danger mt-2" data-toggle="modal" data-target="#ConfirmDelete" wire:click="deleteId({{ $lesson->id }})">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    @if($lessons)
                        {{ $lessons->links() }}
                    @endif
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
                    <h5 class="modal-title" id="ConfirmDelete">Удаление</h5>
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
