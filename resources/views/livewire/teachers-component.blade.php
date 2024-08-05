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
                <h2 class="banner-title display-2 text-white">Mugallymlar</h2>
                <nav class="breadcrumb">
                    <a class="breadcrumb-item nav-link text-white banner-title" href="/" wire:navigate>Esasy</a>
{{--                    <a class="breadcrumb-item nav-link text-white banner-title" href="#">Pages</a>--}}
                    <span class="breadcrumb-item text-white banner-title active" aria-current="page">Mugallymlar</span>
                </nav>
            </div>
        </div>
    </section>

    <section id="instructors" class="padding-medium">
        <div class="container">
            <h2 class="display-4 text-center mb-5">Biziň mugallymlarymyz</h2>

            <div class="row justify-content-center">
            @forelse ($teachers as $teacher)
                <div class="col-md-4 mt-5 ">
                    <div class="team-member position-relative">
                        <div class="image-holder zoom-effect">
                            <img src="{{ asset('images/teachers/' . $teacher->image) }}" alt="team member">
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

</div>
