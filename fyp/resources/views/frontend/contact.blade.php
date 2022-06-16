@extends('frontend.main')
@section('content')
<section class="contact">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 m-auto text-center">
        <h1>Contact Us</h1>
        <h6 style="color: red;">Always Be In Touch With Us.</h6>
      </div>
    </div>
    <div class="row py-5">
      <div class="col-lg-9 m-auto">
        <div class="row">
          <div class="col-lg-4">
            <h6>LOCATION</h6>
            <p>Itahari-20, Tarahara, Nepal</p>
          
            <h6>Phone Number</h6>
            <p>9812343248</p>
          
            <h6>E-Mail</h6>
            <p>katwalshop@gmail.com</p>
        
        </div>
        <div class="col-lg-7">
        <form method="POST" action="/emailstore">
            @csrf
          <div class="row">
            <div class="col-lg-6">
              <input type="text" class="form-control bg-light" placeholder="Your Name" name="name">
            </div>
            <div class="col-lg-6">
              <input type="text" class="form-control bg-light" placeholder="Email Address" name="email">
            </div>
            <div class="col-lg-12 py-3">
              <textarea class="form-control bg-light" placeholder="Message" name="subject" cols="10" rows="5"></textarea>
            </div>
            <div >
            <button class="btn btn-primary" type="submit">Send Message</button>
              </div>

        </form>
              <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28513.40949586757!2d87.24245292527134!3d26.70681782585077!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ef6b099076d76f%3A0x64e882684b4bc291!2sTarahara%2C%2056705!5e0!3m2!1sen!2snp!4v1649345229210!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
          </div>
       
        </div>
      </div>
    </div>
  </div>
</section>
@endsection