@include('user.head')
@include('user.navbar')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-lg-5">
            <main class="form-signin w-100 ">
              @if (session()->has('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
              @if (session()->has('loginError'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
                <form action="/login" method="post">
                  @csrf
                  <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
                  <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" name="email" autofocus required value="{{ old('email') }}">
                    <label for="email">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                    <label for="password">Password</label>
                  </div>
              
                  <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                  <a href="/register" class="text-decoration-none d-block mt-2">Register Now</a>
                </form>
            </main>
        </div>
    </div>
</div>


@include('user.foot')