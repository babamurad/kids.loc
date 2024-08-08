@section('title', 'Makalalar')
<div>
    <section id="banner" class="jarallax position-relative"
        style="background-image: url({{ asset('images/banners') . '/' . $image }}); background-size: cover; background-repeat: no-repeat; background-position: center;">

        <div class="d-none d-md-flex justify-content-between position-absolute w-100 px-5 pt-5 mt-lg-5">
            <div> <iconify-icon icon="solar:cloud-sun-2-outline"
                    class="icon-float1 text-info-emphasis opacity-75"></iconify-icon></div>
            <div> </div>
            <div> </div>
            <div> </div>
            <div> <iconify-icon icon="solar:ufo-outline" class="icon-float2 text-warning opacity-75"></iconify-icon>
            </div>
            <div> </div>
            <div> <iconify-icon icon="ph:rainbow-cloud" class="icon-float1 text-success opacity-75"></iconify-icon></div>
            <div> </div>
            <div> <iconify-icon icon="solar:sun-2-outline" class="icon-float2 text-danger opacity-75"></iconify-icon>
            </div>

        </div>

        <div class="container padding-medium">
            <div class="hero-content ">
                <h2 class="banner-title display-2 text-white">Makalalar</h2>
                <nav class="breadcrumb">
                    <a class="breadcrumb-item nav-link text-white banner-title" href="/" wire:navigate>Esasy</a>
{{--                    <a class="breadcrumb-item nav-link text-white banner-title" href="#">Pages</a>--}}
                    <span class="breadcrumb-item text-white banner-title active" aria-current="page">Makalalar</span>
                </nav>
            </div>
        </div>
    </section>

    <div class="container padding-medium">
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card bg-white rounded-4">
                        <a href="{{ route('single-article', ['id' => $article->id]) }}" wire:navigate><img
                                src="{{ asset('images/articles/') . '/' . $article->image }}"
                                class="img-fluid rounded-top-4 " alt="image"></a>
                        <div class="card-body p-3">
                            <p class="mb-2">{{ Carbon\Carbon::create($article->created_at)->format('d.m.Y') }} y.</p>
                            <a href="{{ route('single-article', ['id' => $article->id]) }}" class="hover-color" wire:navigate>
                                <h2 class="m-0 lh-sm">{{ $article->title }}</h2>
                            </a>
                            <p class="mt-2">
                                {!! substr($article->content, 0, 30) !!}{{ strlen($article->content) > 30 ? '...' : '' }}
                                <span>
                                    <a
                                        href="{{ route('single-article', ['id' => $article->id]) }}"
                                        class="text-decoration-underline" wire:navigate>Giňişleýin
                                    </a>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        {{ $articles->links('components.simple-bootstrap-4') }}

    </div>
    @php
        $icons = [
            'mdi:playground-slide',
            'material-symbols:house-outline',
            'mdi:art',
            'material-symbols:abc-rounded',
            'mdi:book-open-page-variant',
            'mdi:gamepad-variant',
            'mdi:music-note',
            'mdi:palette',
            'mdi:rocket',
            // Добавьте больше иконок, если нужно
        ];
        $colors = [
            'bg-red',
            'bg-green',
            'bg-blue',
            'bg-yellow',
        ];
    @endphp
    <section id="categories">
        <div class="container padding-medium pt-0">
            <div class="row">
                @foreach($categories as $category)
                    <div class="col my-4 my-lg-0 text-center">
                        <a href="{{ route('lessons') }}" class="categories-item" wire:navigate>
                            <iconify-icon class="category-icon {{ $colors[$loop->index % count($colors)] }} text-white p-5 rounded-circle" icon="{{ $icons[$loop->index % count($icons)] }}"></iconify-icon>

                            <h2 class="mt-2">{{ ucfirst($category->name) }}</h2>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</div>
</section>
</div>
