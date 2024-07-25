@section('title', 'Mugallymlar')
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
                <h2 class="banner-title display-2 text-white">Teachers</h2>
                <nav class="breadcrumb">
                    <a class="breadcrumb-item nav-link text-white banner-title" href="/">Home</a>
                    <a class="breadcrumb-item nav-link text-white banner-title" href="#">Pages</a>
                    <span class="breadcrumb-item text-white banner-title active" aria-current="page">Teachers</span>
                </nav>
            </div>
        </div>
    </section>

    <section id="instructors" class="padding-medium">
        <div class="container">
            <h2 class="display-4 text-center mb-5">Our Teachers</h2>

            <div class="row justify-content-center">
            @forelse ($teachers as $teacher)
                <div class="col-md-4 mt-5 ">
                    <div class="team-member position-relative">
                        <div class="image-holder zoom-effect">
                            <img src="{{ asset('images/teachers/' . $teacher->image) }}" alt="team member">
                            <ul class="social-links list-unstyled position-absolute">
                                <li>
                                    <a href="#">
                                        <svg class="facebook text-white ms-1 mt-1" width="30" height="30" aria-hidden="true">
                                            <use xlink:href="#facebook"></use>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <svg class="twitter text-white ms-1" width="30" height="30" aria-hidden="true">
                                            <use xlink:href="#twitter"></use>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <svg class="instagram text-white ms-1" width="30" height="30" aria-hidden="true">
                                            <use xlink:href="#instagram"></use>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <svg class="linkedin text-white ms-1 mb-1" width="30" height="30" aria-hidden="true">
                                            <use xlink:href="#linkedin"></use>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="member-info pt-4 ">
                            <h2 class="lh-sm m-0 ">{{ $teacher->firstname . ' ' . $teacher->lastname }}</h2>
                            <span class="text-primary fs-6">{{ $teacher->position }}</span>
                            <p class="mt-2">{{ $teacher->desc }}</p>
                        </div>
                    </div>
                </div>
            @empty

            @endforelse


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

                <p class="banner-title">Pretium turpis faucibus adipiscing duis. Id quis tristique mi vitae nec. In et
                    in
                    praesent pellentesque sit porta ridiculus faucibus. </p>
                <a class="btn btn-primary mt-3" href="#">Read More</a>
            </div>

        </div>
    </section>

    <section id="enroll">
        <div class="container padding-medium">

            <div class="offset-md-3 col-md-6 text-center ">

                <h2 class="display-4 mb-3">How to enroll your child?</h2>
                <p class="fw-bold">Call: 666 333 9999 or Fill in the form below</p>
                <p>Pretium turpis faucibus adipiscing duis. Id quis tristique mi vitae nec. In et in praesent
                    pellentesque.
                    Porta sit porta ridiculus faucibus.</p>

                <form class="contact-form row mt-5">

                    <div class="col-md-12 col-sm-12 mb-4">
                        <input type="text" name="Parents" placeholder="Parents name"
                               class="w-100 border ps-4 py-2 rounded-3">
                    </div>
                    <div class="col-md-12 col-sm-12 mb-4">
                        <input type="number" name="Phone" placeholder="Contact phone"
                               class="w-100 border ps-4 py-2 rounded-3">
                    </div>

                    <div class="col-md-12 col-sm-12 mb-4">
            <textarea type="text" name="message" placeholder="Your message"
                      class="w-100 border ps-4 py-2 rounded-3"></textarea>
                    </div>
                </form>

                <button class="btn btn-primary mt-3" href="#">Submit</button>
            </div>

        </div>
    </section>
</div>
