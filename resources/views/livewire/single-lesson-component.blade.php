<div>
    @section('title', 'Sapak')

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
                    <a class="breadcrumb-item nav-link text-white banner-title" href="/">Esasy</a>
                    <a class="breadcrumb-item nav-link text-white banner-title" href="{{ route('lessons') }}">Sapaklar</a>
                    <span class="breadcrumb-item text-white banner-title active" aria-current="page">Sapak</span>
                </nav>
            </div>
        </div>
    </section>

    <div class="container padding-medium pb-5">
        <h2 class="display-5 ">{{ $title }}</h2>
        <div class="d-md-flex mt-2 mb-5">
            <div><iconify-icon icon="lets-icons:date-today" class="text-primary fs-5 pt-1" style="vertical-align: sub;"></iconify-icon>
                {{ Carbon\Carbon::create($created_at)->format('M, d.Y') }}
            </div>
            <div class=" align-self-end fs-5">&nbsp; | &nbsp;</div>
            <div>
{{--                <iconify-icon icon="mdi:location" class="text-primary fs-5 pt-1" style="vertical-align: sub;"></iconify-icon>--}}
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="#f1a017" d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2S7.5 4.019 7.5 6.5M20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1z"/></svg>
                {{ $FirstName . ' ' . $LastName }}</div>
            <div class=" align-self-end fs-5">&nbsp; | &nbsp;</div>
            <div>
{{--                <iconify-icon icon="solar:phone-bold" class="text-primary fs-5 pt-1" style="vertical-align: sub;"></iconify-icon>--}}
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="#f1a017" d="M20 17a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H9.46c.35.61.54 1.3.54 2h10v11h-9v2m4-10v2H9v13H7v-6H5v6H3v-8H1.5V9a2 2 0 0 1 2-2zM8 4a2 2 0 0 1-2 2a2 2 0 0 1-2-2a2 2 0 0 1 2-2a2 2 0 0 1 2 2"/></svg>
                {{ $position }}</div>
        </div>
        @if ($image)
         <div class="col-sm-12">
            <img src="{{ asset('images/lesson/images/'.$image) }}" alt="single-post" class="img-fluid">
        </div>
        @endif

    </div>

    <div class="post-wrap mb-5">
        <div class="container">
            <div class="row g-md-5">
                <main class="post-grid col-md-12">
                    @if ($video)
                       <div class="col-sm-12">
                        <video class="w-100" controls>
                            <source src="{{ asset('images/lesson/video/') . '/' . $video }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    @endif

                    <div class="post-description">
                        {!! $content !!}
                    </div>

                </main>
            </div>
        </div>
    </div>
</div>
