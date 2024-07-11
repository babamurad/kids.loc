<div>
    <section id="slider">
        <div class="swiper slider ">
            <div class="swiper-wrapper">
                @foreach ($carousel as $item)
                <div class="swiper-slide d-flex jarallax position-relative"
                     style="background-image: url('{{ asset('images/carousel') . '/' . $item->image }}'); 
                     background-size: cover; background-repeat: no-repeat; height: 80vh; background-position: center; height: 80vh;">

                    <div class="d-none d-md-flex justify-content-between position-absolute w-100 px-5 pt-5 mt-5">
                        <div> <iconify-icon icon="solar:cloud-sun-2-outline"
                                            class="icon-float1 text-info-emphasis opacity-75"></iconify-icon>
                        </div>
                        <div></div>
                        <div> <iconify-icon icon="bi:stars" class="icon-float2 text-warning opacity-75"></iconify-icon> </div>
                        <div></div>
                        <div> <iconify-icon icon="ph:rainbow" class="icon-float1 text-danger opacity-75"></iconify-icon> </div>
                        <div></div>
                        <div> <iconify-icon icon="ph:moon" class="icon-float2 text-white opacity-75"></iconify-icon> </div>
                        <div></div>
                        <div> <iconify-icon icon="ph:cloud" class="icon-float1 text-secondary opacity-75"></iconify-icon> </div>
                    </div>
                    <div class="d-none d-md-flex justify-content-between position-absolute top-50 w-100 px-5 padding-medium pb-0">
                        <div></div>
                        <div> <iconify-icon icon="ph:rainbow-cloud" class="icon-float2 text-success opacity-75"></iconify-icon>
                        </div>
                        <div></div>
                        <div> <iconify-icon icon="ion:snow-outline" class="icon-float1 text-white opacity-75"></iconify-icon> </div>
                        <div></div>
                        <div> <iconify-icon icon="solar:ufo-outline"
                                            class="icon-float2 text-info-emphasis opacity-75"></iconify-icon> </div>
                        <div></div>
                        <div> <iconify-icon icon="solar:sun-2-outline" class="icon-float1 text-warning opacity-75"></iconify-icon>
                        </div>
                        <div></div>
                    </div>

                    <div class="banner-content text-center m-auto" data-aos="zoom-out">
                        <h2 class="banner-title display-1 text-white mb-4">{{ $item->title }}</h2>
                        <a href="{{ route('about-us') }}l" class="btn btn-primary mt-3">about us</a>
                    </div>

                </div>                    
                @endforeach


            </div>
            <div class="position-absolute top-0 bottom-0 end-0 m-auto me-0 me-md-5 main-slider-button-next">
                <svg class="arrow-right light-color" width="60" height="60">
                    <use xlink:href="#arrow-right"></use>
                </svg>
            </div>
            <div class="position-absolute top-0 bottom-0 start-0 m-auto ms-0 ms-md-5 main-slider-button-prev">
                <svg class="arrow-left light-color" width="60" height="60">
                    <use xlink:href="#arrow-left"></use>
                </svg>
            </div>
        </div>
    </section>
</div>
