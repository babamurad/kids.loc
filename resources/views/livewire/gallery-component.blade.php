<div>
    @section('title', 'Galereýa')
    @livewire('carousel-component', ['type' => 'banner'])
    <section id="gallery">
        <div class="container padding-medium pt-0">
            <h2 class="display-4 text-center mb-5">Biziň surat galereýamyzy görüň</h2>
            <div class="row entry-container">
                @foreach ($gallery as $item)
                <div class="entry-item col-md-4 my-3">
                    <a href="{{ asset('images/gallery/') . '/' . $item->image }}" title="Galereýa suraty" class="image-link">
                        <img src="{{ asset('images/gallery/') . '/' . $item->image }}" class=" post-image img-fluid rounded-4">
                    </a>
                </div>
                @endforeach
            </div>
            <div class="text-center">
                <a class="btn btn-primary mt-4" href="{{ route('gallery') }}">Görmek</a>
            </div>
        </div>
    </section>

</div>
