@section('title', 'Esasy')
<div>
@if (Route::currentRouteName() == 'home')
@livewire('carousel-component', ['type' => 'carousel'])
@else
@livewire('carousel-component', ['type' => 'banner'])
@endif

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
            'bg-accent-gradient',
            'bg-danger-subtle',
            'bg-dark-subtle',
        ];
    @endphp

    <section id="categories">
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
        <div class="container padding-medium">
            <div class="row">
                @foreach($categories as $category)
                <div class="col my-4 my-lg-0 text-center">
                    <a href="{{ route('lessons') }}" class="categories-item" wire:navigate>
                        <img class="{{ $category->color }} p-2" src="{{ asset('/images/categories/' . '/' . $category->icon) }}" alt="" style="width: 120px; border-radius: 50%;">
                        <h2 class="mt-2">{{ ucfirst($category->name) }}</h2>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="about-us">
        <div class="container padding-medium pt-0">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="imageblock">
                        <div class="animated-border">
                            <img src="{{ asset('/images/about/').'/'.$about->image }}" alt="img" class="img-fluid rounded-circle ">
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mt-5 mt-md-0">
                    <div class="section-title">
                        <h2 class="display-4 mb-3">{{ $about->title }}</h2>
                    </div>
                    <p>
                        {!! $about->shortText !!}
                    </p>
                    <a class="btn btn-primary mt-3" href="{{ route('about-us') }}" wire:navigate>About Us</a>
                </div>

            </div>
        </div>
    </section>


    <section id="teacher">
        <div class="container padding-medium pt-0">
            <h2 class="display-4 text-center mb-5">Meet our educators</h2>
            <div class="row justify-content-center">
                @foreach ($teachers as $teacher)
                <div class="col-md-6 col-lg-3 my-4 my-lg-3">
                    <div class="text-center ">
                        <a href="{{ route('teachers') }}">
                            <img src="{{ asset('images/teachers') . '/' . $teacher->image }}" class="img-fluid rounded-4" alt="{{ $teacher->firstname }}">
                        </a>
                        <a href="{{ route('teachers') }}" class="hover-color">
                            <h2 class="mt-3 m-0">{{ $teacher->firstname . ' ' . $teacher->lastname }}</h2>
                        </a>
                        <p class="m-0">{{ $teacher->position }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <livewire:front-lessons-comonent limit="8"/>


    {{-- Gallery --}}
    @livewire('gallery-component', ['limit' => 6, 'btn' => true])
    {{-- /Gallery --}}



    <section id="news" class="mb-3">
        <div class="container">
            <h2 class="display-4 text-center mb-5">Makalalar</h2>
            <div class="row">
                @foreach($articles as $article)
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="card bg-white rounded-4">
                        <a href="#"><img src="{{ asset('images/articles') . '/' . $article->image }}" class="img-fluid rounded-top-4 " alt="image"></a>
                        <div class="card-body p-3">
                            <p class="mb-2">{{ \Carbon\Carbon::create($article->created_at)->locale('ru')->format('j F, Y') }}</p>
                            <a href="{{ route('single-article', ['id' => $article->id]) }}"  wire:navigate class="hover-color">
                                <h2 class="m-0 lh-sm">{{ str($article->title)->words(4) }}</h2>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="text-center">
                <a class="btn btn-primary mt-5" href="{{ route('articles') }}" wire:navigate>Hemmesini oka</a>
            </div>
        </div>
    </section>


</div>
