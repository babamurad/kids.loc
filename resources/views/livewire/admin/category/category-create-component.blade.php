@section('title', 'Admin Category Create')
@assets
<link href="{{ asset('admin/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('admin/assets/plugins/select2/select2.min.js') }}"></script>
@endassets

@push('select-js')

    <script>
        $(document).ready(function() {
            function formatIcon (icon) {
                if (!icon.id) { return icon.text; }
                var baseUrl = $(icon.element).data('icon');
                var $icon = $(
                    '<span><img src="' + baseUrl + '" class="img-flag" /> ' + icon.text + '</span>'
                );
                return $icon;
            };

            $("#icon-select").select2({
                templateResult: formatIcon,
                templateSelection: formatIcon,
                escapeMarkup: function(m) { return m; } // Для отображения HTML
            });
        });

    </script>
@endpush
<div class="container-fluid">
    <style>
        .img-flag {
            width: 25px;
            height: 25px;
            margin-right: 10px;
            background-color: #3F51B5;
            border-radius: 4px;
            margin-top: opx;
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
    @include('components.alerts')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Kategoriýa döretmek</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dolandyryş</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.categories') }}">Kategoriýa</a> </li>
                        <li class="breadcrumb-item active">Döret</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Ady</label>
                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Kategoriýanyň ady" wire:model="name">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group row mb-3">
                        <label for="order" class="col-2 col-form-label pl-3">Tertip</label>
                        <div class="col-3">
                            <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" placeholder="Order" value="0" wire:model="order">
                            @error('order')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div wire:ignore class="form-group" data-select2-id="5">
                    <select id="icon-select" class="form-control" wire:model="icon">
                        @foreach($icons as $key => $icon)
                            <option value="{{ $icon }}" data-icon="{{ asset('images/categories/' . $icon) }}" wire:key="{{ $key }}">
                                {{ pathinfo($icon, PATHINFO_FILENAME) }}
                            </option>
                        @endforeach
                    </select>
                    </div>

                    <div class="mt-3">
                        @foreach($colors as $color)
                            <div class="custom-control custom-radio m-2">
                                <input type="radio" id="customRadio{{$loop->index}}" name="customRadio" class="custom-control-input" wire:model="color">
                                <label class="custom-control-label " for="customRadio{{$loop->index}}"> <span class="{{ $color }} p-1 rounded text-white">{{ $color }}</span></label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.categories') }}" class="btn btn-secondary waves-effect waves-light">Ýapmak</a>
                    <button type="button" class="btn btn-primary waves-effect waves-light" wire:click="create">Ýatda sakla</button>
                </div>
            </div>
        </div>
    </div>
</div>
