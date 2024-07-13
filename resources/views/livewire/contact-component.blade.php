<section class="contact-us">
    <div class="container mb-4">
        <div class="row">
            <div class="contact-info col-lg-6">
                <h2>Contact Information</h2>
                <p>Tortor dignissim convallis aenean et tortor at risus viverra adipiscing.</p>
                <div class="page-content d-flex flex-wrap">
                    <div class="col-lg-6 col-sm-12">
                        <div class="content-box text-dark pe-4">
                            <h4 class="mb-2">Office</h4>
                            <p><iconify-icon class="text-primary fs-5 me-2" icon="mdi:location" style="vertical-align:text-bottom"></iconify-icon>730 Glenstone, Springfield, USA</p>
                            <p><iconify-icon class="text-primary fs-5 me-2" icon="solar:phone-bold" style="vertical-align:text-bottom"></iconify-icon>(510)710-3464</p>
                            <p><iconify-icon class="text-primary fs-5 me-2" icon="ic:baseline-email" style="vertical-align:text-bottom"></iconify-icon> info@yourwebsite.com </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="content-box text-dark">
                            <h4 class="mb-2">Management</h4>
                            <p><iconify-icon class="text-primary fs-5 me-2" icon="mdi:location" style="vertical-align:text-bottom"></iconify-icon>30 E Lake St, Chicago, USA</p>
                            <p><iconify-icon class="text-primary fs-5 me-2" icon="solar:phone-bold" style="vertical-align:text-bottom"></iconify-icon>(510)987-3216</p>
                            <p><iconify-icon class="text-primary fs-5 me-2" icon="ic:baseline-email" style="vertical-align:text-bottom"></iconify-icon>contactmanagement@website.com </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="inquiry-item col-lg-6 mt-5 mt-md-0">
                <div class="rounded-5">
                    <h2>Get in Touch</h2>
                    <p>Use the form below to get in touch with us.</p>
                    <form id="form" class="form-group flex-wrap mt-4">
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
                    </form>
                    <div class="d-grid">
                        <button class="btn btn-primary px-5 py-3" wire:click="send">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
