@section('title', 'Teacher Lessons')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @include('components.alerts')
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Sapaklar</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('teacher.dashboard') }}">Dolandyryş</a></li>
                        <li class="breadcrumb-item active">Sapaklar</li>
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
                            <h4 class="">Sapaklaryň sanawy</h4>
                        </div>
                        <div class="col-sm-3 mb-2">
                            <a href="{{ route('teacher.teacher-lessons.create', ['teacherId' => auth()->user()->teacher->id]) }}" class="btn btn-primary waves-effect waves-light">
                                Döret
                            </a>
                        </div>
                        <div class="col-sm-3 mb-2">
                            <div class="row justify-content-end">
                                <div class="col-sm-3"><label for="perPage">Sahypada</label></div>
                                <div class="col-sm-3">
                                    <select name="perPage" class="form-control form-control-sm" wire:model.live="perPage">
                                        <option>4</option>
                                        <option>8</option>
                                        <option>12</option>
                                        <option>20</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">

                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Ady</th>
                                <th>Kategoriýa</th>
                                <th>Neşir</th>
                                <th>Tertip</th>
                                <th>Sene</th>
                                <th>Hereket</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($lessons)
                            @foreach($lessons as $lesson)
                                <tr wire:key="{{ $lesson->id }}">
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td class="pr-0 mr-0"><a href="{{ route('teacher.teacher-lessons.edit', ['id' => $lesson->id, 'teacherId' => $teacherId]) }}">
                                            <img class="mr-3" style="width: 15%;" src="{{ asset('images/lesson/images/'.$lesson->image) }}" alt="">
                                            <strong>{{ $lesson->title }}</strong>
                                        </a>
                                    </td>
                                    <th scope="row">{{ $lesson->category->name }}</th>
                                    <td>
                                        <label>
                                            @if ( $lesson->status )
                                                <span class="badge badge-success">Neşir edilen</span>
                                            @else
                                                <span class="badge badge-danger">Neşir edilmedi</span>
                                            @endif
                                        </label>
                                    </td>
                                    <td><span class="badge badge-secondary badge-pill">{{ $lesson->order }}</span></td>
                                    <td>
                                        <div class="mt-2"><span class="badge badge-light badge-pill">{{ Carbon\Carbon::create($lesson->created_at)->format('d.m.Y') }}</span></div>

                                    </td>
                                    <td style="width: 12%;">
                                        <a href="{{ route('teacher.teacher-lessons.edit', ['id' => $lesson->id, 'teacherId' => $teacherId]) }}" class="btn btn-sm btn-success mr-2 mt-2"><i class="fas fa-edit"></i></a>
                                        {{-- <a href="{{ route('teacher.teachers.view', ['id' => $lesson->id]) }}" class="btn btn-sm btn-warning mr-2"><i class="fas fa-eye"></i></a> --}}
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
                    <h5 class="modal-title" id="ConfirmDelete">Öçürmek</h5>
                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Öçürmek isleýäňizmi?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Ýatyr</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light" wire:click="destroy">Öçürmek</button>
                </div>
            </div>
        </div>
    </div>
</div>
