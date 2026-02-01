@extends('site.layout.master')


@section('content')
<div class="site-section bg-light contact-wrap" id="contact-section">
      <div class="container">
        
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-8  section-heading">
            <span class="subheading">get in touch</span>
            <h2 class="heading mb-3">Contact Us</h2>
            <p>Have questions about our games, bookings, or just want to say hello? We're here to help!
            </p>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-md-7">
            <form method="post" data-aos="fade" class="aos-init aos-animate">
              <div class="form-group row">
                <div class="col-md-6 mb-3 mb-lg-0">
                  <input type="text" class="form-control" placeholder="First name">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Last name">
                </div>
              </div>
    
              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="Subject">
                </div>
              </div>
    
              <div class="form-group row">
                <div class="col-md-12">
                  <input type="email" class="form-control" placeholder="Email">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <textarea class="form-control" id="" cols="30" rows="10" placeholder="Write your message here."></textarea>
                </div>
              </div>
    
              <div class="form-group row">
                <div class="col-md-6">
    
                  <input type="submit" class="btn btn-primary py-3 px-5 btn-block" value="Send Message">
                </div>
              </div>
    
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection