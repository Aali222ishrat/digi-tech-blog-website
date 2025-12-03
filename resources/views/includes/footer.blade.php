<footer class="py-5 mt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
         <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ asset('images/digi-tech-logo.png') }}" style="width:200px" alt="logo">
        </a>
        <p>Bootstrap 5 based static frontend. Replace with dynamic content later using Blade + Controllers.</p>
      </div>
      <div class="col-md-4">
        <h6 class="mb-3">Pages</h6>
        <ul class="list-unstyled">
          <li><a href="/courses" class="text-decoration-none">Blogs</a></li>
          <li><a href="/about" class="text-decoration-none">About</a></li>
          <li><a href="/contact" class="text-decoration-none">Contact</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h6 class="mb-3">Contact</h6>
        <p>Email: support@example.com<br>Phone: +92 300 0000000</p>
      </div>
    </div>
    <hr>
    <div class="d-flex justify-content-between align-items-center">
      <small>© {{ date('Y') }} Technology Blogs. All rights reserved.</small>
      
    </div>
  </div>
</footer>