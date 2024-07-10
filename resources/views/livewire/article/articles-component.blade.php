@section('title', 'Makalalar')
<div>
    <section id="banner" class="jarallax position-relative"
        style="background-image: url(images/testimonial-bg.jpg); background-size: cover; background-repeat: no-repeat; background-position: center;">

        <div class="d-none d-md-flex justify-content-between position-absolute w-100 px-5 pt-5 mt-lg-5">
            <div> <iconify-icon icon="solar:cloud-sun-2-outline"
                    class="icon-float1 text-info-emphasis opacity-75"></iconify-icon></div>
            <div> </div>
            <div> </div>
            <div> </div>
            <div> <iconify-icon icon="solar:ufo-outline" class="icon-float2 text-warning opacity-75"></iconify-icon>
            </div>
            <div> </div>
            <div> <iconify-icon icon="ph:rainbow-cloud" class="icon-float1 text-success opacity-75"></iconify-icon></div>
            <div> </div>
            <div> <iconify-icon icon="solar:sun-2-outline" class="icon-float2 text-danger opacity-75"></iconify-icon>
            </div>

        </div>

        <div class="container padding-medium">
            <div class="hero-content ">
                <h2 class="banner-title display-2 text-white">Blog</h2>
                <nav class="breadcrumb">
                    <a class="breadcrumb-item nav-link text-white banner-title" href="index.html">Home</a>
                    <a class="breadcrumb-item nav-link text-white banner-title" href="#">Pages</a>
                    <span class="breadcrumb-item text-white banner-title active" aria-current="page">Blog</span>
                </nav>
            </div>
        </div>
    </section>

    <div class="container padding-medium">
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card bg-white rounded-4">
                        <a href="{{ route('single-article', ['id' => $article->id]) }}"><img
                                src="{{ asset('images/articles/') . '/' . $article->image }}"
                                class="img-fluid rounded-top-4 " alt="image"></a>
                        <div class="card-body p-3">
                            <p class="mb-2">{{ Carbon\Carbon::create($article->created_at)->format('d.m.Y') }} y.</p>
                            <a href="{{ route('single-article', ['id' => $article->id]) }}" class="hover-color">
                                <h2 class="m-0 lh-sm">{{ $article->title }}</h2>
                            </a>
                            <p class="mt-2">At the core of our practice is the idea that cities are the incubators of
                                our greatest
                                achievements, and the best hope for children sustainable future. 
                                <span>
                                    <a
                                        href="{{ route('single-article', ['id' => $article->id]) }}"
                                        class="text-decoration-underline">Read more
                                    </a>
                                </span> 
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        {{ $articles->links('components.simple-bootstrap-4') }}

    </div>

    <section id="categories">
        <div class="container padding-medium pt-0">
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
                        <iconify-icon class="category-icon bg-blue text-white p-5 rounded-circle"
                            icon="mdi:art"></iconify-icon>
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

    <section id="enroll">
        <div class="container padding-medium pt-0">

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
                        <textarea type="text" name="message" placeholder="Your message" class="w-100 border ps-4 py-2 rounded-3"></textarea>
                    </div>
                </form>

                <button class="btn btn-primary mt-3" href="#">Submit</button>
            </div>

        </div>
</div>
</section>
</div>
