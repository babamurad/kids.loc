@section('title', $article->title)

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
        <h2 class="banner-title display-2 text-white">Makala</h2>
        <nav class="breadcrumb">
          <a class="breadcrumb-item nav-link text-white banner-title" href="/">Esasy</a>
          <a class="breadcrumb-item nav-link text-white banner-title" href="{{ route('articles') }}" wire:navigate>Makalalar</a>
          <span class="breadcrumb-item text-white banner-title active" aria-current="page">{{ $article->title }}</span>
        </nav>
      </div>
    </div>
  </section>

  <section id="blog-post">

    <div class="container padding-ex-small">
      <div class="row g-lg-5">
        <main class="post-grid col-lg-9">
          <div class="post-content">
            <div class="card-meta text-capitalize mb-2">
                <iconify-icon icon="lets-icons:date-today" class="text-primary fs-5 pt-1" style="vertical-align: sub;"></iconify-icon>
              <span class="meta-date">
                  {{ Carbon\Carbon::create($article->created_at)->format('d.m.Y') }}</span>
              <span class="meta-category">/
                  <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24"><path fill="#f1a017" d="M7 17h7v-2H7zm0-4h10v-2H7zm0-4h10V7H7zM5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h14q.825 0 1.413.588T21 5v14q0 .825-.587 1.413T19 21zm0-2h14V5H5zM5 5v14z"/></svg>
                  <a href="{{ route('articles') }}" wire:navigate>Makalalar</a>
              </span>
            </div>
            <h2>{{ $article->title }}</h2>
            <img src="{{ asset('images/articles/' . '/' . $article->image) }}" alt="image" class="img-fluid rounded-4 my-4">
            <p>
                {!! $article->content !!}
            </p>

            <hr class="my-5">
          </div>

        </main>

        <aside class="col-lg-3">
          <div class="post-sidebar">

            <div class="widget sidebar-popular-posts bg-gray border rounded-3 p-3 mb-5">
              <h3 class="widget-title  border-bottom pb-2 mb-4">Soňky makalalar</h3>
              @foreach ($articles as $article)
              <div class="sidebar-post-item d-flex justify-content-center">
                <div class="row mb-3">
                  <div class="col-md-4">
                    <div class="image-holder">
                      <a href="{{ route('single-article', ['id' => $article->id]) }}">
                        <img src="{{ asset('images/articles/') . '/' . $article->image }}" alt="blog" class="img-fluid rounded-2">
                      </a>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="sidebar-post-content ">
                      <div class="post-meta text-secondary">
                        <span class="meta-date">{{ Carbon\Carbon::create($article->created_at)->format('F j, Y') }}</span>
                      </div>
                      <h5 class="lh-sm post-title">
                        <a href="{{ route('single-article', ['id' => $article->id]) }}">{{ $article->title }}</a>
                      </h5>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>

            <div class="widget sidebar-any-questions bg-gray border rounded-3 p-3 mb-5">
              @if(!$SendMessage)
                    <form wire:submit.prevent="SendQuestion">
                        @csrf
                  <h3 class="widget-title border-bottom pb-3 mb-4">Soragyňyz barmy?</h3>
                  <input type="text" name="name" placeholder="Adyňyz" class="w-100 mb-2 border p-2 ps-3 rounded-3" wire:model="name">
                  <input type="email" name="email" placeholder="Email salgyňyz" class="w-100 mb-2 border p-2 ps-3 rounded-3" wire:model="email">
                  <textarea class="w-100 mb-2 border p-2 ps-3 rounded-3" type="text" name="details" placeholder="Soragyňyz" wire:model="text"></textarea>
                  <button class="btn btn-medium btn-primary btn-pill mt-3 text-uppercase" type="submit">Ugrat</button>
                    </form>
              @else
                  <h5 class="widget-title border-bottom pb-3 mb-4 text-center">Soragyňyz üstünlikli ugradyldy!</h5>
              @endif
            </div>

          </div>
        </aside>
      </div>
    </div>
  </section>

  </section>
</div>
