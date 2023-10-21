  <nav class="navbar navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand text-light" href="/"><img class="nav-logo" src="/assets/logo (1).png" alt=""></a>
        <div class="d-flex">
          <a href="/" class="nav-link text-dark h6 mb-0">Home</a>
          <a href="/#blogs" class="nav-link text-dark h6 mb-0">Blogs</a>
          <a href="#subscribe" class="nav-link text-dark h6 mb-0">Subscribe</a>
          @if(Auth::check())
           <p class="nav-link text-dark h6 mb-0">{{auth()->user()->name}}</p>
            <form action="/logout" method="post">
              @csrf
              <button class="nav-link btn btn-link text-dark h6" type="submit">Logout</button>
            </form>
          @else
          <a class="nav-link btn btn-link text-dark h6 mb-0" href="./signin">LogIN</a>
          @endif
        </div>
      </div>
    </nav>
