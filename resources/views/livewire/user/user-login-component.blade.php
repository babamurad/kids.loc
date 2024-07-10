<div class="container">
    <div class="col-sm-4 offset-4">
        <form name="contactform" class="form-group contact-form mt-4">
            <div class="col-sm-12 my-2">
                <input wire:model="email" type="email" name="email" placeholder="E-mail"
                    class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-12 my-2">
                <input wire:model="password" type="password" name="password" placeholder="Password"
                    class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-4 offset-4 my-4">
                <div class="d-grid">
                    <button type="submit" name="submit" class="btn btn-dark"
                        wire:click.prevent="login">Submit</button>
                </div>
            </div>
    </div>
    </form>


</div>
