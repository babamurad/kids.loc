@section('title', 'Admin Messages List')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Messages</h4>
                        @if(session('error'))
                            <div id="errorAlert" class="alert alert-danger alert-dismissible" style="margin-bottom: 0;">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <h5 style="margin-bottom: 0;"><i class="icon fas fa-check"></i> {{ session('error') }}</h5>
                                    <a type="button" class="close text-danger pr-0" data-dismiss="alert" aria-label="Close" wire:click.prevent="closeAlert" style="font-size: 2rem; padding-top: 0.5rem;">
                                        <span aria-hidden="true" style="margin-right: 0.450rem;">&times;</span>
                                    </a>
                                </div>
                            </div>
                        @endif



                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Messages</li>
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
                            <h4 class="">Messages List</h4>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Phone</th>
                                <th>Subject</th>
                                <th>Is Read</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $message)
                                <tr wire:key="{{ $message->id }}">
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td><strong>{{ $message->name }}</strong></td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ \Carbon\Carbon::create($message->created_at)->format('d.m.Y') }}</td>
                                    <td>{{ $message->phone?? '---' }}</td>
                                    <td style="width: 15%;">{{ $message->subject }}</td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck{{ $message->id }}" wire:model.live="read"
                                                   wire:click="PubUnPub({{ $message->id }})"
                                                   @if ($message->read)
                                                       checked
                                                @endif>
                                            <label class="custom-control-label" for="customCheck{{ $message->id }}">
                                                @if ( $message->read )
                                                    <span class="badge badge-success">Read</span>
                                                @else
                                                    <span class="badge badge-danger">Not Read</span>
                                                @endif
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        {{-- <a href="#" class="btn btn-sm btn-success mr-2 mt-2"><i class="fas fa-edit"></i></a> --}}
                                        <a wire:navigate href="{{ route('admin.message.view', ['id' => $message->id]) }}" class="btn btn-sm btn-warning mr-2 mt-2"><i class="fas fa-eye"></i></a>
                                        <button class="btn btn-sm btn-danger mt-2" data-toggle="modal" data-target="#ConfirmDelete" wire:click="deleteId({{ $message->id }})">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $messages->links() }}
                </div>
                <!-- end card-body-->
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('closeModal', event=> {
            $('#ConfirmDelete').modal('hide');
        })
        window.addEventListener('closeAlert', event=> {
            document.getElementById('errorAlert').style.display = 'none';
        });

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
