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
                    <a class="breadcrumb-item nav-link text-white banner-title" href="/">Home</a>
                    <a class="breadcrumb-item nav-link text-white banner-title" href="{{ route('lessons') }}" wire:navigate>Lessons</a>
                    <span class="breadcrumb-item text-white banner-title active" aria-current="page">Single Lesson</span>
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
            <div><iconify-icon icon="mdi:location" class="text-primary fs-5 pt-1" style="vertical-align: sub;"></iconify-icon>
                Newyork City, USA</div>
            <div class=" align-self-end fs-5">&nbsp; | &nbsp;</div>
            <div><iconify-icon icon="solar:phone-bold" class="text-primary fs-5 pt-1" style="vertical-align: sub;"></iconify-icon> (510) 710-3464</div>
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
                <main class="post-grid col-md-8">
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
                <aside class="col-md-4 mt-5">
                    <div class="post-sidebar">

                        <div class="reviews-components widget sidebar-categories rounded-3 p-4 p-md-5 mb-5">
                            <h2 class="widget-title border-bottom pb-3">Event Info:</h2>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th class="heading-color" scope="row">Cost :</th>
                                    <td class="text-primary fw-bold">$80.00</td>
                                </tr>
                                <tr>
                                    <th class="heading-color" scope="row">Total Slot :</th>
                                    <td>300</td>
                                </tr>
                                <tr>
                                    <th class="heading-color" scope="row">Booked Slot :</th>
                                    <td>50</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="d-grid text-center">
                                <button class="btn btn-primary px-5 py-3 my-2">Book now</button>
                            </div>

                        </div>

                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
