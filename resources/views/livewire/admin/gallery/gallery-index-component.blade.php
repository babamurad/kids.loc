@section('title', 'Admin Gallery')
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-4">@include('components.alerts')</div>
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Galereýa</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dolandyryş</a></li>
                        <li class="breadcrumb-item active">Galereýa</li>
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
                            <h4 class="">Galereýa suratlarynyň sanawy</h4>
                        </div>
                        <div class="col-sm-3 mb-2">
                            <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary waves-effect waves-light" wire:navigate>
                                Döret
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Surat | Bellik</th>
                                <th>Tertip</th>
                                <th>Ýagdaýy</th>
                                <th>Hereket</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($galleries as $item)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td class="pr-0 mr-0">
                                        <a href="{{ route('admin.gallery.edit', ['id' => $item->id]) }}">
                                            <img class="mr-5" style="width: 12%;" src="{{ asset('images/gallery/'.$item->image) }}" alt="">
                                        </a>
                                    {{ $item->desc }}</td>
                                    <td style="width: 12%;">
                                        <div class="row">
                                            <span type="button" class="btn waves-effect text-danger " wire:click="DecOrder({{ $item->id }})" style="padding: 0.5rem 0.6rem; font-size: 14px;"><i class="bx bx-minus"></i></span>
                                            <span class="mt-2" wire:click="editOrder">{{ $item->order }}</span>
                                            <span type="button" class="btn waves-effect text-danger bold" wire:click="IncOrder({{ $item->id }})" style="padding: 0.5rem 0.6rem; font-size: 14px;"><i class="bx bx-plus"></i></span>
                                        </div>
                                    </td>
                                    <td style="width: 10%;">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck{{ $item->id }}" wire:model.live="status"
                                                   wire:click="PubUnPub({{ $item->id }})"
                                                   @if ($item->status) checked @endif>
                                            <label class="custom-control-label" for="customCheck{{ $item->id }}">
                                                @if ( $item->status )
                                                    <span class="badge badge-success">Görkez</span>
                                                @else
                                                    <span class="badge badge-danger">Görkez</span>
                                                @endif
                                            </label>
                                        </div>
                                    </td>
                                    <td style="width: 10%;">
                                        <a href="{{ route('admin.gallery.edit', ['id' => $item->id]) }}" class="btn btn-sm btn-success mr-2"><i class="fas fa-edit"></i></a>
{{--                                        <a href="{{ route('admin.gallery.view', ['id' => $item->id]) }}" class="btn btn-sm btn-warning mr-2"><i class="fas fa-eye"></i></a>--}}
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ConfirmDelete" wire:click="deleteId({{ $item->id }})"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $galleries->links() }}
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
                    <button type="button" class="btn btn-danger waves-effect waves-light" wire:click="destroy">Öçür</button>
                </div>
            </div>
        </div>
    </div>
</div>
