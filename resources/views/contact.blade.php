@extends('frontend-layout.app')

@section('title','Contact Us - DigiSkills Clone')

@section('content')
<div class="container py-5">
  <h2 class="section-title">Contact Us</h2>
  <div class="row">
    <div class="col-md-6">
      <form>
        <div class="mb-3">
          <label class="form-label">Your name</label>
          <input type="text" class="form-control" placeholder="Full name">
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" placeholder="you@example.com">
        </div>
        <div class="mb-3">
          <label class="form-label">Message</label>
          <textarea class="form-control" rows="6"></textarea>
        </div>
        <button class="btn btn-primary btn-primary-custom">Send Message</button>
      </form>
    </div>
    <div class="col-md-6">
      <h6>Our Office</h6>
      <p>Address line 1<br>City, Country</p>
      <div class="ratio ratio-16x9">
        <iframe src="https://maps.google.com" style="border:0;" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>
@endsection
