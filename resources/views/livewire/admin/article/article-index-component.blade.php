@section('title', 'Admin Articles List')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Articles</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Articles</li>
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
                            <h4 class="">Articles List</h4>
                        </div>
                        <div class="col-sm-3 mb-2">
                            <a href="{{ route('admin.article.create') }}" class="btn btn-primary waves-effect waves-light">
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
                                <th>Title</th>
                                <th>Published</th>
                                <th>Order</th>
                                <th>Published date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td class="pr-0 mr-0"><a href="{{ route('admin.teachers.edit', ['id' => $article->id]) }}"><img style="width: 15%;" src="{{ asset('images/teachers/'.$article->image) }}" alt=""></a>  </td>
                                    <td style="width: 15%;"><a href="{{ route('admin.teachers.edit', ['id' => $article->id]) }}">{{ $article->firstname }}</a></td>
                                    <td style="width: 15%;">{{ $article->lastname }}</td>
                                    <td>{{ $article->order }}</td>
                                    <td>{{ $article->published }}</td>
                                    <td style="width: 12%;">
                                        <a href="{{ route('admin.teachers.edit', ['id' => $article->id]) }}" class="btn btn-sm btn-success mr-2"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.teachers.view', ['id' => $article->id]) }}" class="btn btn-sm btn-warning mr-2"><i class="fas fa-eye"></i></a>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ConfirmDelete" wire:click="deleteId({{ $article->id }})"><i class="fas fa-trash-alt"></i></button>
                                        <button wire:confirm="Are you sure?" wire:click="destroy">Delete post</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $articles->links() }}
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
    <p>
        git clone babamurad2010@yandex.ru:babamurad/repo.git

        git remote add origin git@github.com:babamurad/dum.loc
        fatal: not a git repository (or any parent up to mount point /)
        Stopping at filesystem boundary (GIT_DISCOVERY_ACROSS_FILESYSTEM not set).
    </p>


    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
    </button>

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
