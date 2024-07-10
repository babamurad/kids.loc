<form name="contactform" action="contact.php" method="post" class="form-group contact-form mt-4">
    <div class="row">
      <div class="col-md-6">
        <input type="text" minlength="2" name="name" placeholder="Name" class="form-control" required="">
      </div>
      <div class="col-md-6">
        <input type="email" name="email" placeholder="E-mail" class="form-control" required="">
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">

        <textarea class="form-control mt-4 mb-4" name="message" placeholder="Message" style="height: 150px;" required=""></textarea>

        <label>
          <input type="checkbox" required="">
          <span class="label-body">I agree all the <a href="#">Terms and Conditions</a></span>
        </label>

        <div class="d-grid">
          <button type="submit" name="submit" class="btn btn-dark">Submit</button>
        </div>
      </div>
    </div>
  </form>