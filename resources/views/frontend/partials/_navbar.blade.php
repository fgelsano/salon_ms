<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">JCJ Salon</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
    <a class="nav-link" href="{{ route('home') }}">Home</a>
      <a class="nav-link" href="{{ route('frontend.about') }}">About</a>
      <a class="nav-link" href="{{ route('frontend.fservices') }}">Services</a>
      <a class="nav-link" href="{{ route('frontend.contact') }}">Contact</a>
      <a class="nav-link" href="{{ route('frontend.q.status') }}">Q.Status</a>
    </div>
  </div>
</nav>