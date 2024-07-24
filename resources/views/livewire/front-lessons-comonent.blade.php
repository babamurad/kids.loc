<div>
    @section('title', 'Jadyly sabdyk')
    <section id="activities" class="bg-gray">
        <div class="container padding-medium">

            <h2 class="display-4 text-center mb-5">Our Activities & Events</h2>

            <div class="row">
                <div class="col-sm-2">
                    <div class="text-center mb-5">
                        <button class="mx-auto filter-button py-2 px-4 mt-3 active d-block" data-filter="*">All</button>
                        @foreach($categories as $category)
                        <button class="mx-auto filter-button py-2 px-4 mt-3 d-block" data-filter=".cat{{ $category->id }}" wire:key="{{ $category->id }}">{{ $category->name }}</button>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="isotope-container row" style="position: relative; height: 650px;">
                    @foreach($lessons as $lesson)
                        <div class="item {{ 'cat' . $lesson->category->id }} col-md-3 text-center">
                            <div class="position-absolute top-50 start-50 translate-middle">
                                <a href="#" class="hover-color">
                                    <p class="m-0">{{ Carbon\Carbon::create($lesson->until_date)->format('d.m.Y') }}</p>
                                    <p class="text-black py-4">{{ $lesson->title }}</p>
                                    <p class="m-0">{{ Carbon\Carbon::create($lesson->created_at)->format('d.m.Y') }}</p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>

        </div>

    </section>
</div>
