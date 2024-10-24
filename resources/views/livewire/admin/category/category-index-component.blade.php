@section('title', 'Admin Categories')
@push('select-css')
    <style>
        .img-flag {
            width: 25px;
            height: 25px;
            margin-right: 10px;
            background-color: #3F51B5;
            border-radius: 4px;
            margin-top: 0;
        }

        .bg-red {
            background: #E47D7D;
        }

        .bg-green {
            background: #AED260;
        }

        .bg-blue {
            background: #649ACC;
        }

        .bg-yellow {
            background: #EBCE66;
        }
    </style>
@endpush

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Kategoriýalar</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dolandyryş</a></li>
                        <li class="breadcrumb-item active">Kategoriýalar</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        @include('components.alerts')
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row card-title">
                        <div class="col-sm-3">
                            <h4 class="">Kategoriýalaryň sanawy</h4>
                        </div>
                        <div class="col-sm-3 mb-2">
                            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary waves-effect waves-light">
                                Döret
                            </a>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Id</th>
                                <th>Ady</th>
                                <th>Ikonka/Reňki</th>
                                <th>Tertip</th>
                                <th>Sene</th>
                                <th>Hereket</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($categories)
                                @foreach($categories as $category)
                                    <tr wire:key="{{ $category->id }}">
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td><strong>{{ $category->id }}</strong></td>
                                        <td><a href="{{ route('admin.categories.edit', ['id' => $category->id]) }}"><strong>{{ $category->name }}</strong></a></td>
                                        <td><span class="badge badge-primary p-2 {{$category->color}}"><img class="" src="{{ asset('images/categories/' . $category->icon) }}" alt="" style="width: 30px;"></span></td>
                                        <td><span class="badge badge-secondary badge-pill mt-2 ml-3"><strong>{{ $category->order }}</strong></span></td>
                                        <td><span class="badge badge-light badge-pill p-1 ">
                                                <strong>{{ \Carbon\Carbon::create($category->created_at)->format('d.m.Y')  }} ý.</strong>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.categories.edit', ['id' => $category->id]) }}" class="btn btn-sm btn-success mr-2 mt-2"><i class="fas fa-edit"></i></a>
                                            {{-- <a href="{{ route('admin.teachers.view', ['id' => $category->id]) }}" class="btn btn-sm btn-warning mr-2"><i class="fas fa-eye"></i></a> --}}
                                            <button class="btn btn-sm btn-danger mt-2" data-toggle="modal" data-target="#ConfirmDelete" wire:click="deleteId({{ $category->id }})">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
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
                    <p>Siz dogrudanam bu ýazgyny öçürjemki?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Goýbolsun</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light" wire:click.prevent="destroy">Öçür</button>
                </div>
            </div>
        </div>
    </div>
</div>
