@section('title', 'Esasy')
<div>

@if (Route::currentRouteName() == 'home')
@livewire('carousel-component', ['type' => 'carousel'])
@else
@livewire('carousel-component', ['type' => 'banner'])
@endif


    <section id="categories">
        <div class="container padding-medium">
            <div class="row">
                <div class="col my-4 my-lg-0 text-center">
                    <a href="#" class="categories-item">
                        <iconify-icon class="category-icon bg-red text-white p-5 rounded-circle"
                                      icon="mdi:playground-slide"></iconify-icon>
                        <h2 class="mt-2">gaming Playground</h2>
                    </a>
                </div>
                <div class="col my-4 my-lg-0 text-center">
                    <a href="#" class="categories-item">
                        <iconify-icon class="category-icon bg-green text-white p-5 rounded-circle"
                                      icon="material-symbols:house-outline"></iconify-icon>
                        <h2 class="mt-2">Happy environment</h2>
                    </a>
                </div>
                <div class="col my-4 my-lg-0 text-center">
                    <a href="#" class="categories-item">
                        <iconify-icon class="category-icon bg-blue text-white p-5 rounded-circle" icon="mdi:art"></iconify-icon>
                        <h2 class="mt-2">Creative class</h2>
                    </a>
                </div>
                <div class="col my-4 my-lg-0 text-center">
                    <a href="#" class="categories-item">
                        <iconify-icon class="category-icon bg-yellow text-white p-5 rounded-circle"
                                      icon="material-symbols:abc-rounded"></iconify-icon>
                        <h2 class="mt-2">Active Learning </h2>
                    </a>
                </div>
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
                        {!! $about->content !!}
                    </p>
                    <a class="btn btn-primary mt-3" href="{{ route('about-us') }}" wire:navigate>About Us</a>
                </div>

            </div>
        </div>
    </section>


    <section id="cta" class="jarallax"
             style="background-image: url({{ asset('images/cta.jpg') }}); background-repeat: no-repeat; background-position: center;">
        <div class="container padding-medium">

            <div class="offset-md-3 col-md-6 text-center ">
                <div class="section-title">
                    <h2 class="display-4 mb-3 banner-title">Are you going to enroll your child to a class?</h2>
                </div>

                <p class="banner-title">Pretium turpis faucibus adipiscing duis. Id quis tristique mi vitae nec. In et in
                    praesent pellentesque sit porta ridiculus faucibus. </p>
                <a class="btn btn-primary mt-3" href="enrollment.html">Read More</a>
            </div>

        </div>

    </section>

    <section id="classes">
        <div class="container padding-medium">
            <h2 class="display-4 text-center mb-5">Choose Classes for your kid</h2>
            <div class="swiper classes-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card bg-transparent border-0">
                            <div class="zoom-effect rounded-4">
                                <a href="class-details.html"><img src="images/class1.jpg" class="img-fluid " alt="image"></a>
                            </div>
                            <div class="card-body p-0">
                                <a href="class-details.html">
                                    <h2 class="mt-3">Learning Class</h2>
                                </a>

                                <div class="card-text">
                                    <div class="d-flex">
                                        <div class="pe-4 border-end border-2">
                                            <p class="text-primary fw-medium fs-4 m-0">2-5</p>
                                            <p class="m-0">Years old</p>
                                        </div>
                                        <div class="ps-4 pe-4 border-end border-2">
                                            <p class="text-primary fw-medium fs-4 m-0">22</p>
                                            <p class="m-0">Class size</p>
                                        </div>
                                        <div class="ps-4 pe-4">
                                            <p class="text-primary fw-medium fs-4 m-0">$56.00</p>
                                            <p class="m-0">Pricing</p>
                                        </div>

                                    </div>


                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="swiper-slide">
                        <div class="card bg-transparent border-0">
                            <div class="zoom-effect rounded-4">
                                <a href="class-details.html"><img src="images/class2.jpg" class="img-fluid" alt="image"></a>
                            </div>
                            <div class="card-body p-0">
                                <a href="class-details.html">
                                    <h2 class="mt-3">Meditation Class</h2>
                                </a>

                                <div class="card-text">
                                    <div class="d-flex">
                                        <div class="pe-4 border-end border-2">
                                            <p class="text-primary fw-medium fs-4 m-0">2-5</p>
                                            <p class="m-0">Years old</p>
                                        </div>
                                        <div class="ps-4 pe-4 border-end border-2">
                                            <p class="text-primary fw-medium fs-4 m-0">22</p>
                                            <p class="m-0">Class size</p>
                                        </div>
                                        <div class="ps-4 pe-4">
                                            <p class="text-primary fw-medium fs-4 m-0">$56.00</p>
                                            <p class="m-0">Pricing</p>
                                        </div>

                                    </div>


                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="swiper-slide">
                        <div class="card bg-transparent border-0">
                            <div class="zoom-effect rounded-4">
                                <a href="class-details.html"><img src="images/class3.jpg" class="img-fluid" alt="image"></a>
                            </div>
                            <div class="card-body p-0">
                                <a href="class-details.html">
                                    <h2 class="mt-3">Art Class</h2>
                                </a>

                                <div class="card-text">
                                    <div class="d-flex">
                                        <div class="pe-4 border-end border-2">
                                            <p class="text-primary fw-medium fs-4 m-0">2-5</p>
                                            <p class="m-0">Years old</p>
                                        </div>
                                        <div class="ps-4 pe-4 border-end border-2">
                                            <p class="text-primary fw-medium fs-4 m-0">22</p>
                                            <p class="m-0">Class size</p>
                                        </div>
                                        <div class="ps-4 pe-4">
                                            <p class="text-primary fw-medium fs-4 m-0">$56.00</p>
                                            <p class="m-0">Pricing</p>
                                        </div>

                                    </div>


                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="swiper-slide">
                        <div class="card bg-transparent border-0">
                            <div class="zoom-effect rounded-4">
                                <a href="class-details.html"><img src="images/class1.jpg" class="img-fluid" alt="image"></a>
                            </div>
                            <div class="card-body p-0">
                                <a href="class-details.html">
                                    <h2 class="mt-3">Learning Class</h2>
                                </a>

                                <div class="card-text">
                                    <div class="d-flex">
                                        <div class="pe-4 border-end border-2">
                                            <p class="text-primary fw-medium fs-4 m-0">2-5</p>
                                            <p class="m-0">Years old</p>
                                        </div>
                                        <div class="ps-4 pe-4 border-end border-2">
                                            <p class="text-primary fw-medium fs-4 m-0">22</p>
                                            <p class="m-0">Class size</p>
                                        </div>
                                        <div class="ps-4 pe-4">
                                            <p class="text-primary fw-medium fs-4 m-0">$56.00</p>
                                            <p class="m-0">Pricing</p>
                                        </div>

                                    </div>


                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="swiper-slide">
                        <div class="card bg-transparent border-0">
                            <div class="zoom-effect rounded-4">
                                <a href="class-details.html"><img src="images/class2.jpg" class="img-fluid" alt="image"></a>
                            </div>
                            <div class="card-body p-0">
                                <a href="class-details.html">
                                    <h2 class="mt-3">Meditation Class</h2>
                                </a>

                                <div class="card-text">
                                    <div class="d-flex">
                                        <div class="pe-4 border-end border-2">
                                            <p class="text-primary fw-medium fs-4 m-0">2-5</p>
                                            <p class="m-0">Years old</p>
                                        </div>
                                        <div class="ps-4 pe-4 border-end border-2">
                                            <p class="text-primary fw-medium fs-4 m-0">22</p>
                                            <p class="m-0">Class size</p>
                                        </div>
                                        <div class="ps-4 pe-4">
                                            <p class="text-primary fw-medium fs-4 m-0">$56.00</p>
                                            <p class="m-0">Pricing</p>
                                        </div>

                                    </div>


                                </div>

                            </div>
                        </div>

                    </div>

                </div>
                <div class="swiper-pagination position-relative pt-5 mt-3"></div>
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

    <livewire:front-lessons-comonent />

    <section id="events">
        <div class="container padding-medium">
            <div class="row flex-md-row-reverse align-items-center">

                <!-- <div class="col-md-6">
                  <div class="imageblock">
                    <img src="images/event-img.jpg" alt="img" class="img-fluid rounded-pill"
                      style="border: 25px dotted #E3EAF0;">
                  </div>
                </div> -->

                <div class="col-md-6">
                    <div class="imageblock">
                        <div class="animated-border">
                            <img src="images/event-img.jpg" alt="img" class="img-fluid rounded-circle ">
                        </div>
                    </div>
                </div>

                <div class="col-md-6 pe-lg-5 mt-5 mt-md-0">
                    <div class="section-title">
                        <h2 class="display-4 mb-5">upcoming events</h2>
                    </div>
                    <div class="border rounded-3 px-4 py-2 mb-3 me-lg-5">
                        <div class="row">
                            <div class="col-2 ps-3">
                                <h2 class="m-0 lh-sm">22</h2>
                                <p class="m-0">Feb</p>
                            </div>
                            <div class="col-10 d-flex justify-content-between align-items-center">
                                <a href="event-details.html" class="hover-color">
                                    <div>
                                        <h2 class="m-0 lh-sm">Storytime Hour</h2>
                                        <p class="m-0">4:30 PM - 5:30 PM</p>
                                    </div>
                                </a>
                                <a href="event-details.html">
                                    <svg class="text-primary " width="25" height="25">
                                        <use xlink:href="#arrow-right-tail"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="border rounded-3 px-4 py-2 mb-3 me-lg-5">
                        <div class="row">
                            <div class="col-2 ps-3">
                                <h2 class="m-0 lh-sm">30</h2>
                                <p class="m-0">Sep</p>
                            </div>
                            <div class="col-10 d-flex justify-content-between align-items-center">
                                <a href="event-details.html" class="hover-color">
                                    <div>
                                        <h2 class="m-0 lh-sm">Music and Dance Party</h2>
                                        <p class="m-0">4:30 PM - 5:30 PM</p>
                                    </div>
                                </a>
                                <a href="event-details.html">
                                    <svg class="text-primary " width="25" height="25">
                                        <use xlink:href="#arrow-right-tail"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="border rounded-3 px-4 py-2 mb-3 me-lg-5">
                        <div class="row">
                            <div class="col-2 ps-3">
                                <h2 class="m-0 lh-sm">26</h2>
                                <p class="m-0">Oct</p>
                            </div>
                            <div class="col-10 d-flex justify-content-between align-items-center">
                                <a href="event-details.html" class="hover-color">
                                    <div>
                                        <h2 class="m-0 lh-sm">Celebration of Cultures</h2>
                                        <p class="m-0">4:30 PM - 5:30 PM</p>
                                    </div>
                                </a>
                                <a href="event-details.html">
                                    <svg class="text-primary " width="25" height="25">
                                        <use xlink:href="#arrow-right-tail"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    {{-- Gallery --}}
    @livewire('gallery-component', ['limit' => 6, 'btn' => true])
    {{-- /Gallery --}}



    <section id="news" class="mb-3">
        <div class="container">
            <h2 class="display-4 text-center mb-5">News & Articles</h2>
            <div class="row">
                @foreach($articles as $article)
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="card bg-white rounded-4">
                        <a href="#"><img src="{{ asset('images/articles') . '/' . $article->image }}" class="img-fluid rounded-top-4 " alt="image"></a>
                        <div class="card-body p-3">
                            <p class="mb-2">{{ \Carbon\Carbon::create($article->created_at)->locale('ru')->format('j F, Y') }}</p>
                            <a href="{{ route('single-article', ['id' => $article->id]) }}"  wire:navigate class="hover-color">
                                <h2 class="m-0 lh-sm">{{ $article->title }}</h2>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="text-center">
                <a class="btn btn-primary mt-5" href="{{ route('articles') }}" wire:navigate>Read All News</a>
            </div>
        </div>
    </section>


</div>
