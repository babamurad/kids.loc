@section('title', 'Biz barada')
<div>
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
                <h2 class="banner-title display-2 text-white">About Us</h2>
                <nav class="breadcrumb">
                    <a class="breadcrumb-item nav-link text-white banner-title" href="index.html">Home</a>
                    <a class="breadcrumb-item nav-link text-white banner-title" href="#">Pages</a>
                    <span class="breadcrumb-item text-white banner-title active" aria-current="page">About Us</span>
                </nav>
            </div>
        </div>
    </section>

    <div class="container padding-medium">
        <div class="row ">
            <div class="col-md-6 pe-md-5">
                <h2 class="display-4">How Kindergarten Started </h2>
                <p>In commodo auctor eget congue sit. Ultrices eget pretium sit euismod mi id. Risus, aliquam odio
                    posuere ac in in nisl sed augue. Porta aenean egestas malesuada in pulvinar enim viverra.</p>
                <a href="#" class="btn btn-primary py-3 px-5"> Read Blog </a>
            </div>
            <div class="col-md-6 mt-5 mt-md-0">
                <h2 class="display-4">More About Us </h2>
                <p>In commodo auctor aenean egestas malesuada in pulvinar enim viverra.</p>
                <p class="m-0 mb-2"> <span class="text-primary">✓</span> Porta aenean egestas malesuada in pulvinar enim
                    viverra.</p>
                <p class="m-0 mb-2"> <span class="text-primary">✓</span> Ultrices eget pretium sit euismod mi id.</p>
                <p class="m-0 mb-2"> <span class="text-primary">✓</span> Risus, aliquam odio posuere ac in in nisl sed augue.
                </p>
                <p class="m-0 mb-2"> <span class="text-primary">✓</span> Commodo aenean egestas malesuada in pulvinar enim
                    viverra.</p>

            </div>
        </div>
    </div>

    <div class="container padding-medium pt-0">
        <div class="row ">
            <div class="col-md-6 pe-md-5">
                <div class="imageblock">
                    <div class="animated-border">
                        <img src="{{ asset('/images/about/').'/'.$about->image }}" alt="img" class="img-fluid rounded-circle ">
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-5 mt-md-0">
                <h2 class="display-4">{{ $about->title }}</h2>

                {!! $about->content !!}

            </div>
        </div>
    </div>

    <section id="cta" class="jarallax"
             style="background-image: url({{ asset('images/cta.jpg') }}); background-repeat: no-repeat; background-position: center;">
        <div class="container padding-medium">

            <div class="offset-md-3 col-md-6 text-center ">
                <div class="section-title">
                    <h2 class="display-4 mb-3 banner-title">Are you going to enroll your child to a class?</h2>
                </div>

                <p class="banner-title">Pretium turpis faucibus adipiscing duis. Id quis tristique mi vitae nec. In et
                    in
                    praesent pellentesque sit porta ridiculus faucibus. </p>
                <a class="btn btn-primary mt-3" href="enrollment.html">Read More</a>
            </div>
        </div>
    </section>

{{-- Gallery --}}
@livewire('gallery-component', ['limit' => 6])
{{-- /Gallery --}}

<section id="testimonial" class="jarallax"
         style="background-image: url({{ asset('images/testimonial-bg.jpg') }}); background-repeat: no-repeat; background-position: center;">
    <div class="container padding-medium">

        <div class="offset-md-1 col-md-10 ">
            <div class="swiper testimonial-swiper py-3 py-md-5 bg-white rounded-4">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="review px-md-5">
                            <div class="review-content px-5 d-lg-flex align-items-center ">
                                <img src="{{ asset('images/reviewer1.jpg') }}" alt="reviewer" class="img-fluid rounded-circle">
                                <div class="ms-md-4 mt-3 mt-lg-0">
                                    <p>“Pretium turpis faucibus adipiscing duis. Id quis tristique mi vitae nec. In et in praesent
                                        pellentesque. Porta sit porta ridiculus faucibus. Curabitur lacus pretium pellentesque interdum
                                        urna blandit.”</p>
                                    <h2 class="name m-0 lh-sm">Emily Smith</h2>
                                        <p class="m-0">Serene mom</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="review px-md-5">
                            <div class="review-content px-5 d-lg-flex align-items-center ">
                                <img src="{{ asset('images/reviewer3.jpg') }}" alt="reviewer" class="img-fluid rounded-circle">
                                <div class="ms-md-4 mt-3 mt-lg-0">
                                    <p>“Pretium turpis faucibus adipiscing duis. Id quis tristique mi vitae nec. In et in praesent
                                        pellentesque. Porta sit porta ridiculus faucibus. Curabitur lacus pretium pellentesque interdum
                                        urna blandit.”</p>
                                    <h2 class="name m-0 lh-sm">Jenny Will</h2>
                                        <p class="m-0">Hanay mom</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="review px-md-5">
                            <div class="review-content px-5 d-lg-flex align-items-center ">
                                <img src="{{ asset('images/reviewer2.jpg') }}" alt="reviewer" class="img-fluid rounded-circle">
                                <div class="ms-md-4 mt-3 mt-lg-0">
                                    <p>“Pretium turpis faucibus adipiscing duis. Id quis tristique mi vitae nec. In et in praesent
                                        pellentesque. Porta sit porta ridiculus faucibus. Curabitur lacus pretium pellentesque interdum
                                        urna blandit.”</p>
                                    <h2 class="name m-0 lh-sm">Noran Shara</h2>
                                        <p class="m-0">Sam mom</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination position-relative pt-4 pt-md-5"></div>
            </div>
        </div>

    </div>
</section>

<section id="news">
    <div class="container padding-medium">
        <h2 class="display-4 text-center mb-5">News & Articles</h2>
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                <div class="card bg-white rounded-4">
                    <a href="#"><img src="{{ asset('images/blog1.jpg') }}" class="img-fluid rounded-top-4 " alt="image"></a>
                    <div class="card-body p-3">
                        <p class="mb-2">10 Feb, Sun</p>
                        <a href="#" class="hover-color">
                            <h2 class="m-0 lh-sm">The Benefits of Play-Based Learning for Kindergarteners</h2>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                <div class="card bg-white rounded-4">
                    <a href="#"><img src="{{ asset('images/blog3.jpg') }}" class="img-fluid rounded-top-4 " alt="image"></a>
                    <div class="card-body p-3">
                        <p class="mb-2">15 Mar, Mon</p>
                        <a href="#" class="hover-color">
                            <h2 class="m-0 lh-sm">Creating a Safe and Inclusive Kindergarten Environment</h2>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                <div class="card bg-white rounded-4">
                    <a href="#"><img src="{{ asset('images/blog2.jpg') }}" class="img-fluid rounded-top-4 " alt="image"></a>
                    <div class="card-body p-3">
                        <p class="mb-2">22 Feb, Fri</p>
                        <a href="#" class="hover-color">
                            <h2 class="m-0 lh-sm">Nutrition Tips for Healthy Kindergarten Snacks</h2>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                <div class="card bg-white rounded-4">
                    <a href="#"><img src="{{ asset('images/blog4.jpg') }}" class="img-fluid rounded-top-4 " alt="image"></a>
                    <div class="card-body p-3">
                        <p class="mb-2">26 Apr, Tue</p>
                        <a href="#" class="hover-color">
                            <h2 class="m-0 lh-sm">Craft Ideas for Kindergarten Art Projects</h2>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <div class="text-center">
            <a class="btn btn-primary mt-5" href="blog.html">Read All News</a>
        </div>
    </div>
</section>

    <section class="contact-us">
        <div class="container mb-4">
            <div class="row">
                <div class="contact-info col-lg-6">
                    <h2>Contact Information</h2>
                    <p>Tortor dignissim convallis aenean et tortor at risus viverra adipiscing.</p>
                    <div class="page-content d-flex flex-wrap">
                        @foreach($companies as $company)
                        <div class="col-lg-6 col-sm-12">
                            <div class="content-box text-dark pe-4">
                                <h4 class="mb-2">{{ $company->name }}</h4>
                                <p><iconify-icon class="text-primary fs-5 me-2" icon="mdi:location" style="vertical-align:text-bottom"></iconify-icon>{{ $company->address }}</p>
                                <p><iconify-icon class="text-primary fs-5 me-2" icon="solar:phone-bold" style="vertical-align:text-bottom"></iconify-icon>{{ $company->phone }}</p>
                                <p><iconify-icon class="text-primary fs-5 me-2" icon="ic:baseline-email" style="vertical-align:text-bottom"></iconify-icon> {{ $company->email }} </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="inquiry-item col-lg-6 mt-5 mt-md-0">
                    <div class="rounded-5">
                        <div class="d-grid">
                            <button class="btn btn-secondary w-100 btn-lg">Extra Large Full Width Button</button>
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible" style="margin-bottom: 0%; padding-top:0.5rem; padding-bottom:0.5rem; ">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-check"></i> {{ session('success') }}</h5>
                                </div>
                            @endif
                        </div>
                        <h2>Get in Touch</h2>
                        <p>Use the form below to get in touch with us.</p>
                        <p>{{ $res }}</p>
                        <form id="form" class="form-group flex-wrap mt-4"  wire:submit.prevent="mailSend">
                            <div class="form-input col-lg-12 d-flex mb-3">
                                <input wire:model="name" type="text" name="name" placeholder="Write Your Name Here" class="form-control ps-3 me-3">
                                <input wire:model="email" type="email" name="email" placeholder="Write Your Email Here" class="form-control ps-3">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <input wire:model="phone" type="text" name="phone" placeholder="Phone Number" class="form-control ps-3">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <input wire:model="subject" type="text" name="subject" placeholder="Write Your Subject Here" class="form-control ps-3">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <textarea wire:model="text" placeholder="Write Your Message Here" class="form-control ps-3" style="height:150px;"></textarea>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary px-5 py-3">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
