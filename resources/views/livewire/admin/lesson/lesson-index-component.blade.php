@section('title', 'Admin Lessons')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Lessons</h4>

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
                            <h4 class="">Lessons List</h4>
                        </div>
                        <div class="col-sm-3 mb-2">
                            <a href="{{ route('admin.teacher-lessons.create', ['teacherId' => auth()->user()->id]) }}" class="btn btn-primary waves-effect waves-light">
                                Create
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
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
                                    <td class="pr-0 mr-0"><a href="{{ route('admin.article.edit', ['id' => $lesson->id]) }}">
                                            <img class="mr-3" style="width: 15%;" src="{{ asset('images/articles/'.$lesson->image) }}" alt="">
                                            <strong>{{ $lesson->title }}</strong>
                                        </a>
                                    </td>
                                    <td style="width: 15%;">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck{{ $lesson->id }}" wire:model.live="published"
                                                   wire:click="PubUnPub({{ $lesson->id }})"
                                                   @if ($lesson->published)
                                                       checked
                                                @endif>
                                            <label class="custom-control-label" for="customCheck{{ $lesson->id }}">
                                                @if ( $lesson->published )
                                                    <span class="badge badge-success">Published</span>
                                                @else
                                                    <span class="badge badge-danger">Not Published</span>
                                                @endif
                                            </label>
                                        </div>


                                    </td>
                                    <td style="width: 7%;">
                                        <div class="row">
                                            <span type="button" class="btn waves-effect text-danger " wire:click="DecOrder({{ $lesson->id }})" style="padding: 0.5rem 0.6rem; font-size: 14px;"><i class="bx bx-minus"></i></span>
                                            <span class="mt-2">{{ $lesson->order }}</span>
                                            <span type="button" class="btn waves-effect text-danger bold" wire:click="IncOrder({{ $lesson->id }})" style="padding: 0.5rem 0.6rem; font-size: 14px;"><i class="bx bx-plus"></i></span>
                                        </div>


                                        {{--
                                        <div class="icon-stack-container">
                                        <div class="icon-stack"> wire:click="IncOrder({{ $lesson->id }})"
                                            <i class="bx bx-up-arrow"></i>
                                            <i class="bx bx-down-arrow" wire:click="DecOrder({{ $lesson->id }})"></i>
                                        </div>
                                        </div> --}}

                                    </td>
                                    <td style="width: 10%;">
                                        <div class="mt-2">{{ Carbon\Carbon::create($lesson->publish_date)->format('d.m.Y') }}</div>

                                    </td>
                                    <td style="width: 12%;">
                                        <a href="{{ route('admin.article.edit', ['id' => $lesson->id]) }}" class="btn btn-sm btn-success mr-2 mt-2"><i class="fas fa-edit"></i></a>
                                        {{-- <a href="{{ route('admin.teachers.view', ['id' => $lesson->id]) }}" class="btn btn-sm btn-warning mr-2"><i class="fas fa-eye"></i></a> --}}
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