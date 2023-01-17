@include('user.head')
@include('user.navbar')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-lg-5">
            <main class="form-registration w-100 ">
                <form action="/register" method="post">
                    @csrf
                  <h1 class="h3 mb-3 fw-normal text-center">Registratiron Form</h1>
                  
                  <div class="form-floating">
                    <input type="text" class="form-control rounded-top @error('name')is-invalid @enderror" id="name" placeholder="name" name="name" required value="{{ old('name') }}">
                    <label for="name">Name</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                  </div>

                  <div class="form-floating">
                    <input type="text" class="form-control rounded-top @error('username')is-invalid @enderror" id="username" placeholder="Username" name="username" required value="{{ old('username') }}">
                    <label for="username">Username</label>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                  </div>

                  <div class="form-floating">
                    <input type="email" class="form-control @error('email')is-invalid @enderror" id="email" placeholder="email" name="email" required value="{{ old('email') }}">
                    <label for="email">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                  </div>
                  <div class="form-floating">
                    <input type="password" class="form-control rounded-bottom @error('password')is-invalid @enderror" id="password" placeholder="Password" name="password" required>
                    <label for="password">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                  </div>
              
                  <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
                  <small class="mb-0 d-flex flex-row mt-2">
                    Have an account? <a href="/login" class="text-decoration-none d-block "> Login Now</a>
                  </small>
                </form>
            </main>
        </div>
    </div>
</div>


@include('user.foot')