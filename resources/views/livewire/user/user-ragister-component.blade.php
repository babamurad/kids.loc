<div class="container">
    <div class="col-sm-6 offset-3">
        <form name="contactform" action="contact.php" method="post" class="form-group contact-form mt-4">
            <div class="col-sm-12 my-2">
                <input type="text" minlength="2" name="name" placeholder="Name" class="form-control" required="">
            </div>
            <div class="col-sm-12 my-2">
                <input type="email" name="email" placeholder="E-mail" class="form-control" required="">
            </div>
            <div class="col-sm-12 my-2">
                <input type="password" name="password" placeholder="Password" class="form-control" required="">
            </div>
            <div class="col-sm-12 my-2">
                <input type="confirmed_password" name="confirmed_password" placeholder="Confirmed Password"
                    class="form-control" required="">
            </div>
            <label>
                <input type="checkbox" required="">
                <span class="label-body">I agree all the <a href="#">Terms and Conditions</a></span>
            </label>
            <div class="col-sm-4 offset-4 my-4">
                <div class="d-grid">
                    <button type="submit" name="submit" class="btn btn-dark">Submit</button>
                </div>
            </div>
    </div>
    </form>
    </div>
</div>
