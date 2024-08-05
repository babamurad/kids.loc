<section class="contact-us">
    <div class="container mb-4">
        <div class="row">
            <div class="contact-info col-lg-6">
                <h2>Şahsy maglumatlar</h2>
                <p>Biziň bilen habarlaşmak üçin aşakdaky salgylardan peýdalanyp bilersiňiz.</p>
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
                    <div id="errorAlert" class="d-grid">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible" style="margin-bottom: 0; padding: 0.5rem;">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <h5 style="margin-bottom: 0;"><i class="icon fas fa-check"></i> Siziň hatynyz üstunlikli ugradyldy.</h5>
                                    <a type="button" class="close text-danger" data-dismiss="alert" aria-label="Close" wire:click.prevent="closeAlert" style="font-size: 2rem;">
                                        <span aria-hidden="true" style="margin-right: 0.450rem;">&times;</span>
                                    </a>
                                </div>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible" style="margin-bottom: 0; padding: 0.5rem;">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <h5 style="margin-bottom: 0;"><i class="icon fas fa-check"></i> Siziň hatynyz ugradylmady.</h5>
                                    <a type="button" class="close text-danger" data-dismiss="alert" aria-label="Close" wire:click.prevent="CloseErrorAlert" style="font-size: 2rem;">
                                        <span aria-hidden="true" style="margin-right: 0.450rem;">&times;</span>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                    <h2>Habarlaşmak üçin</h2>
                    <p>Biz bilen habarlaşmak üçin aşakdaky formany ulanyň. E-poçta salgyňyz çap edilmez.</p>
                    <form id="form" class="form-group flex-wrap mt-4"  wire:submit.prevent="mailSend">
                        <div class="form-input col-lg-12 d-flex mb-3">
                            <input wire:model="name" type="text" name="name" placeholder="Adyňyz" class="form-control ps-3 me-3  @error('name') is-invalid @enderror">
                            <input wire:model="email" type="email" name="email" placeholder="Email salgyňyz" class="form-control ps-3  @error('email') is-invalid @enderror">
                        </div>
                        <div class="col-lg-12 mb-3">
                            <input wire:model="phone" type="text" name="phone" placeholder="Telefon nomeriňiz" class="form-control ps-3">
                        </div>
                        <div class="col-lg-12 mb-3">
                            <input wire:model="subject" type="text" name="subject" placeholder="Temany şu ýere ýazyň" class="form-control ps-3 @error('subject') is-invalid @enderror">
                        </div>
                        <div class="col-lg-12 mb-3">
                            <textarea wire:model="text" placeholder="Habaryňyzy şu ýere ýazyň" class="form-control ps-3  @error('text') is-invalid @enderror" style="height:150px;"></textarea>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-primary px-5 py-3">Ugrat</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@push('close-btn')
    <script>
        window.addEventListener('error-alert-hidden', event=> {
            document.getElementById('errorAlert').style.display = 'none';
        })
        window.addEventListener('error-alert-hidden', event=> {
            document.getElementById('errorAlert').style.display = 'none';
        });
    </script>
@endpush

