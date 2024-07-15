<section class="contact-us">
    <div class="container mb-4">
        <div class="row">
            <div class="contact-info col-lg-6">
                <h2>Contact Information</h2>
                <p>Tortor dignissim convallis aenean et tortor at risus viverra adipiscing.</p>
                <div class="page-content d-flex flex-wrap">
                    @foreach($companies as $company)
                        <div class="col-lg-6 col-sm-12">
                            <div class="content-box text-dark pe-4">
                                <h4 class="mb-2">{{ $company->name }}</h4>
                                <p><iconify-icon class="text-primary fs-5 me-2" icon="mdi:location" style="vertical-align:text-bottom"></iconify-icon>{{ $company->address }}</p>
                                <p><iconify-icon class="text-primary fs-5 me-2" icon="solar:phone-bold" style="vertical-align:text-bottom"></iconify-icon>{{ $company->phone }}</p>
                                <p><iconify-icon class="text-primary fs-5 me-2" icon="ic:baseline-email" style="vertical-align:text-bottom"></iconify-icon> {{ $company->email }} </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="inquiry-item col-lg-6 mt-5 mt-md-0">
                <div class="rounded-5">
                    <div class="d-grid">
                        <button class="btn btn-secondary w-100 btn-lg">Extra Large Full Width Button</button>
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible" style="margin-bottom: 0%; padding-top:0.5rem; padding-bottom:0.5rem; ">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> {{ session('success') }}</h5>
                            </div>
                        @endif
                    </div>
                    <h2>Get in Touch</h2>
                    <p>Use the form below to get in touch with us.</p>
                    <p>{{ $res }}</p>
                    <form id="form" class="form-group flex-wrap mt-4"  wire:submit.prevent="mailSend">
                        <div class="form-input col-lg-12 d-flex mb-3">
                            <input wire:model="name" type="text" name="name" placeholder="Write Your Name Here" class="form-control ps-3 me-3">
                            <input wire:model="email" type="email" name="email" placeholder="Write Your Email Here" class="form-control ps-3">
                        </div>
                        <div class="col-lg-12 mb-3">
                            <input wire:model="phone" type="text" name="phone" placeholder="Phone Number" class="form-control ps-3">
                        </div>
                        <div class="col-lg-12 mb-3">
                            <input wire:model="subject" type="text" name="subject" placeholder="Write Your Subject Here" class="form-control ps-3">
                        </div>
                        <div class="col-lg-12 mb-3">
                            <textarea wire:model="text" placeholder="Write Your Message Here" class="form-control ps-3" style="height:150px;"></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary px-5 py-3">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
