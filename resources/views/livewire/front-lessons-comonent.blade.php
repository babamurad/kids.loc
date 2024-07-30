<div>
    @section('title', 'Jadyly sabdyk')
    <style>
        .card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border-radius: 0;
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-radius: 0;
        }
        .card-body {
            flex-grow: 1;
        }
    </style>

    <section id="banner" class="jarallax position-relative"
             style="background-image: url({{ asset('images/testimonial-bg.jpg') }}); background-size: cover; background-repeat: no-repeat; background-position: center;">

        <div class="d-none d-md-flex justify-content-between position-absolute w-100 px-5 pt-5 mt-lg-5">
            <div> <iconify-icon icon="solar:cloud-sun-2-outline"
                                class="icon-float1 text-info-emphasis opacity-75"></iconify-icon></div>
            <div> </div>
            <div> </div>
            <div> </div>
            <div> <iconify-icon icon="solar:ufo-outline" class="icon-float2 text-warning opacity-75"></iconify-icon> </div>
            <div> </div>
            <div> <iconify-icon icon="ph:rainbow-cloud" class="icon-float1 text-success opacity-75"></iconify-icon></div>
            <div> </div>
            <div> <iconify-icon icon="solar:sun-2-outline" class="icon-float2 text-danger opacity-75"></iconify-icon> </div>
        </div>

        <div class="container padding-medium">
            <div class="hero-content ">
                <h2 class="banner-title display-2 text-white">Teachers</h2>
                <nav class="breadcrumb">
                    <a class="breadcrumb-item nav-link text-white banner-title" href="/">Home</a>
                    <span class="breadcrumb-item text-white banner-title active" aria-current="page">Lessons</span>
                </nav>
            </div>
        </div>
    </section>

    <section id="activities" class="bg-gray">
        <div class="container padding-medium">

            <h2 class="display-4 text-center mb-5">Our Activities & Events</h2>

            <div class="row">
                <div class="col-sm-2">
                    <div class="text-center mb-5">
                        <button class="mx-auto filter-button py-2 px-4 mt-3 active d-block" data-filter="*">All</button>
                        @foreach($categories as $category)
                        <button class="mx-auto filter-button py-2 px-4 mt-3 d-block" data-filter=".cat{{ $category->id }}" wire:key="{{ $category->id }}">{{ $category->name }}</button>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="isotope-container row" style="position: relative; height: 650px;">
                    @foreach($lessons as $lesson)
                        <div class="item {{ 'cat' . $lesson->category->id }} col-md-3 text-center card p-0">
                            <a href="{{ route('single-lesson', ['id' => $lesson->id]) }}">
                                <img class="card-img-top" src="{{ asset('images/lesson/images/'.$lesson->image) }}" alt="">
                            </a>
                            <div class="card-body mb-3">
                                <div class="card-body">
                                    <div class="card-header">{{ $lesson->teacher->firstname . ' ' . $lesson->teacher->lastname }}</div>
                                    <div class="card-text"><a href="{{ route('single-lesson', ['id' => $lesson->id]) }}">{{ substr($lesson->title, 0, 20) }}{{ strlen($lesson->content) > 20 ? '...' : '' }}</a></div>
                                    <div class="card-footer">{{ Carbon\Carbon::create($lesson->created_at)->format('d.m.Y') }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>

        </div>

    </section>
</div>
