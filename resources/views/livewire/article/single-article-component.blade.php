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
        <h2 class="banner-title display-2 text-white">Single Post</h2>
        <nav class="breadcrumb">
          <a class="breadcrumb-item nav-link text-white banner-title" href="index.html">Home</a>
          <a class="breadcrumb-item nav-link text-white banner-title" href="{{ route('articles') }}">Articles</a>
          <span class="breadcrumb-item text-white banner-title active" aria-current="page">Single Post</span>
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
              <span class="meta-date">{{ Carbon\Carbon::create($article->created_at)->format('d.m.Y') }}</span>
              <span class="meta-category">/ <a href="#">Tips & Tricks</a></span>
            </div>
            <h2>{{ $article->title }}</h2>
            <img src="{{ asset('images/articles/' . '/' . $article->image) }}" alt="image" class="img-fluid rounded-4 my-4">
            <p>
                {!! $article->content !!}
            </p>
            
            
            <hr class="my-5">

            <div class="post-bottom-link d-lg-flex align-items-center justify-content-between">
              <div class="block-tag">
                <ul class="list-unstyled d-flex fs-4">
                  <li class="pe-3">
                    <a href="#">Children</a>
                  </li>
                  <li class="pe-3">
                    <a href="#">Tips</a>
                  </li>
                  <li class="pe-3">
                    <a href="#">Learning</a>
                  </li>
                </ul>
              </div>
              <div class="social-links d-flex fs-4">
                <div class="element-title pe-2">Share:</div>
                <ul class="d-flex list-unstyled">
                  <li class="p-0 me-2">
                    <a href="#">
                      <svg class="facebook" width="24" height="24">
                        <use xlink:href="#facebook"></use>
                      </svg>
                    </a>
                  </li>
                  <li class="p-0 me-2">
                    <a href="#">
                      <svg class="instagram" width="24" height="24">
                        <use xlink:href="#instagram"></use>
                      </svg>
                    </a>
                  </li>
                  <li class="p-0 me-2">
                    <a href="#">
                      <svg class="twitter" width="24" height="24">
                        <use xlink:href="#twitter"></use>
                      </svg>
                    </a>
                  </li>
                  <li class="p-0 me-2">
                    <a href="#">
                      <svg class="linkedin" width="24" height="24">
                        <use xlink:href="#linkedin"></use>
                      </svg>
                    </a>
                  </li>
                  <li class="p-0 me-2">
                    <a href="#">
                      <svg class="youtube" width="24" height="24">
                        <use xlink:href="#youtube"></use>
                      </svg>
                    </a>
                  </li>
                </ul>
              </div>
            </div>

          </div><!--post-content-->

          <section class="comments-wrap py-5 my-5">
            <h2>Comments</h2>
            <div class="comment-list mt-5">
              <article class="comment-item pb-3 row">
                <div class="col-md-1">
                  <img src="{{ asset('images/commentor-item1.jpg') }}" alt="default" class="commentor-image img-fluid rounded-circle">
                </div>
                <div class="col-md-10">
                  <div class="author-post mb-4">
                    <div class="comment-meta mt-3 mt-md-0 mb-2 text-capitalize d-flex gap-3 text-black">
                      <div class="author-name fs-5">Lufy carlson</div>
                      <span class=" ">Jul 10</span>
                    </div>
                    <p>Tristique tempis condimentum diam done ullancomroer sit
                      element henddg sit he
                      consequert.Tristique tempis condimentum diam done
                      ullancomroer sit element henddg sit he
                      consequert.</p>
                    <div class="comments-reply border-animation">
                      <a href="#">
                        <i class="icon icon-mail-reply"></i>Reply </a>
                    </div>
                  </div>
                </div>
              </article>
              <article class="comment-item pb-3 row child-comments">
                <div class="col-md-1">
                  <img src="{{ asset('images/commentor-item2.jpg') }}" alt="default" class="commentor-image img-fluid rounded-circle">
                </div>
                <div class="col-md-10">
                  <div class="author-post mb-4">
                    <div class="comment-meta mt-3 mt-md-0 mb-2 text-capitalize d-flex gap-3 text-black ">
                      <div class="author-name fs-5  ">Lora leigh</div>
                      <span class=" ">Jul 10</span>
                    </div>
                    <p>Tristique tempis condimentum diam done ullancomroer sit
                      element henddg sit he
                      consequert.Tristique tempis condimentum diam done
                      ullancomroer sit element henddg sit he
                      consequert.</p>
                    <div class="comments-reply border-animation">
                      <a href="#">
                        <i class="icon icon-mail-reply"></i>Reply </a>
                    </div>
                  </div>
                </div>
              </article>
              <article class="comment-item pb-3 row">
                <div class="col-md-1">
                  <img src="{{ asset('images/commentor-item3.jpg') }}" alt="default" class="commentor-image img-fluid rounded-circle">
                </div>
                <div class="col-md-10">
                  <div class="author-post mb-4">
                    <div class="comment-meta mt-3 mt-md-0 mb-2 text-capitalize d-flex gap-3 text-black ">
                      <div class="author-name fs-5  ">Natalie dormer</div>
                      <span class=" ">Jul 10</span>
                    </div>
                    <p>Tristique tempis condimentum diam done ullancomroer sit
                      element henddg sit he
                      consequert.Tristique tempis condimentum diam done
                      ullancomroer sit element henddg sit he
                      consequert.</p>
                    <div class="comments-reply border-animation">
                      <a href="#">
                        <i class="icon icon-mail-reply"></i>Reply </a>
                    </div>
                  </div>
                </div>
              </article>
            </div><!--comment-list-->

          </section>

          <section class="comment-respond">
            <h2>Leave a Comment</h2>
            <form method="post" class="form-group">

              <div class="row">
                <div class="col-md-6 mt-2">
                  <input class="form-control" type="text" name="author" id="author" placeholder="Your full name">
                </div>
                <div class="col-md-6 mt-2">
                  <input class="form-control" type="email" name="email" id="email" placeholder="E-mail Address">
                </div>
              </div>

              <div class="row mt-4 d-grid gap-3">
                <div class="col-md-12">
                  <textarea class="form-control" id="comment" name="comment" placeholder="Write your comment here"
                    rows="4"></textarea>
                </div>
                <div class="col-md-12">
                  <label class="example-send-yourself-copy">
                    <input type="checkbox">
                    <span class="label-body">Save my name, email, and website in this browser for
                      the next time I
                      comment.</span>
                  </label>
                </div>
                <div class="col-md-12">
                  <div class="d-grid my-4">
                    <input class="btn btn-arrow btn-primary btn-lg btn-pill btn-dark fs-6" type="submit"
                      value="Submit ">
                  </div>
                </div>
              </div>

            </form>
          </section>
        </main>

        <aside class="col-lg-3">
          <div class="post-sidebar">

            <div class="widget sidebar-categories bg-gray border rounded-3 p-3 mb-5">
              <h3 class="widget-title  border-bottom pb-2 mb-3">Post Categories</h3>
              <ul class="list-unstyled">
                <li>
                  <a href="#" class="item-anchor text-capitalize d-flex align-items-center">
                    <svg width="18" height="18">
                      <use xlink:href="#alt-arrow-right-bold"></use>
                    </svg>Parenting tips
                  </a>
                </li>
                <li>
                  <a href="#" class="item-anchor text-capitalize d-flex align-items-center">
                    <svg width="18" height="18">
                      <use xlink:href="#alt-arrow-right-bold"></use>
                    </svg>Child Psychology
                  </a>
                </li>
                <li>
                  <a href="#" class="item-anchor text-capitalize d-flex align-items-center">
                    <svg width="18" height="18">
                      <use xlink:href="#alt-arrow-right-bold"></use>
                    </svg>Learning
                  </a>
                </li>
                <li>
                  <a href="#" class="item-anchor text-capitalize d-flex align-items-center">
                    <svg width="18" height="18">
                      <use xlink:href="#alt-arrow-right-bold"></use>
                    </svg>Playing
                  </a>
                </li>
                <li>
                  <a href="#" class="item-anchor text-capitalize d-flex align-items-center">
                    <svg width="18" height="18">
                      <use xlink:href="#alt-arrow-right-bold"></use>
                    </svg>Child Care
                  </a>
                </li>
                <li>
                  <a href="#" class="item-anchor text-capitalize d-flex align-items-center">
                    <svg width="18" height="18">
                      <use xlink:href="#alt-arrow-right-bold"></use>
                    </svg>Day Care
                  </a>
                </li>
              </ul>
            </div>

            <div class="widget sidebar-tags bg-gray border rounded-3 p-3 mb-5">
              <h3 class="widget-title  border-bottom pb-2 mb-3">Popular Tags</h3>
              <div class="tags d-flex flex-wrap">
                <a href="#" class="text-capitalize me-2 mb-2">Children,</a>
                <a href="#" class="text-capitalize me-2 mb-2">Parents,</a>
                <a href="#" class="text-capitalize me-2 mb-2">Teacher,</a>
                <a href="#" class="text-capitalize me-2 mb-2">Learning,</a>
                <a href="#" class="text-capitalize me-2 mb-2">Kindergarten,</a>
              </div>
            </div>

            <div class="widget sidebar-popular-posts bg-gray border rounded-3 p-3 mb-5">
              <h3 class="widget-title  border-bottom pb-2 mb-4">Related Posts</h3>
              @foreach ($articles as $article)
              <div class="sidebar-post-item d-flex justify-content-center">
                <div class="row mb-3">
                  <div class="col-md-4">
                    <div class="image-holder">
                      <a href="#">
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
              <h3 class="widget-title border-bottom pb-3 mb-4">Have any question?</h3>
              <input type="text" name="name" placeholder="Full Name" class="w-100 mb-2 border p-2 ps-3 rounded-3">
              <input type="email" name="email" placeholder="Email" class="w-100 mb-2 border p-2 ps-3 rounded-3">
              <textarea class="w-100 mb-2 border p-2 ps-3 rounded-3" type="text" name="details"
                placeholder="Details"></textarea>
              <a href="#" class="btn btn-medium btn-primary btn-pill mt-3 text-uppercase">Submit</a>
            </div>

          </div>
        </aside>
      </div>
    </div>
  </section>

  <section id="enroll">
    <div class="container padding-medium pt-0">

      <div class="offset-md-3 col-md-6 text-center ">

        <h2 class="display-4 mb-3">How to enroll your child?</h2>
        <p class="fw-bold">Call: 666 333 9999 or Fill in the form below</p>
        <p>Pretium turpis faucibus adipiscing duis. Id quis tristique mi vitae nec. In et in praesent pellentesque.
          Porta sit porta ridiculus faucibus.</p>

        <form class="contact-form row mt-5">

          <div class="col-md-12 col-sm-12 mb-4">
            <input type="text" name="Parents" placeholder="Parents name" class="w-100 border ps-4 py-2 rounded-3">
          </div>
          <div class="col-md-12 col-sm-12 mb-4">
            <input type="number" name="Phone" placeholder="Contact phone" class="w-100 border ps-4 py-2 rounded-3">
          </div>

          <div class="col-md-12 col-sm-12 mb-4">
            <textarea type="text" name="message" placeholder="Your message"
              class="w-100 border ps-4 py-2 rounded-3"></textarea>
          </div>
        </form>

        <button class="btn btn-primary mt-3" href="#">Submit</button>
      </div>

    </div>
    </div>
  </section>
</div>
