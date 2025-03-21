<div class="container">
    {{-- @include('components.alerts') --}}
    <div class="col-sm-4 offset-4">
        <form name="contactform" class="form-group contact-form mt-4">
            <div class="col-sm-12 my-2">
                <input wire:model="name" type="text" minlength="2" name="name" placeholder="Name"
                    class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
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
            <div class="col-sm-12 my-2">
                <input wire:model="password_confirmation" type="password" name="confirmed_password"
                    placeholder="Confirmed Password" class="form-control">
            </div>
            <div class="col-sm-4 offset-4 my-4">
                <div class="d-grid">
                    <button type="submit" name="submit" class="btn btn-dark"
                        wire:click.prevent="registerUser">Submit</button>
                </div>
            </div>
    </div>
    </form>


</div>
