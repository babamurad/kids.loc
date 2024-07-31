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
                <h2 class="banner-title display-2 text-white">Biz barada</h2>
                <nav class="breadcrumb">
                    <a class="breadcrumb-item nav-link text-white banner-title" href="/">Esasy</a>
{{--                    <a class="breadcrumb-item nav-link text-white banner-title" href="#">Pages</a>--}}
                    <span class="breadcrumb-item text-white banner-title active" aria-current="page">Biz barada</span>
                </nav>
            </div>
        </div>
    </section>

       <div class="container padding-medium">
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


<section id="news">
    <div class="container padding-medium">
        <h2 class="display-4 text-center mb-5">Makalalar we Täzelikler</h2>
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
                            <h2 class="m-0 lh-sm">Çagalar bagynyň sungat taslamalary üçin hünär ideýalary</h2>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <div class="text-center">
            <a class="btn btn-primary mt-5" href="{{ route('articles') }}">Hemmesini oka</a>
        </div>
    </div>
</section>

@livewire('contact-component')

</div>
