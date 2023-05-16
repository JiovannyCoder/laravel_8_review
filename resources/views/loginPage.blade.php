<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
  <link rel="stylesheet" href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}">

  <script defer src="{{ asset('lib/bootstrap/js/bootstrap.bundle.js') }}"></script>
  <script defer src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
  <script defer src="{{ asset('js/app.js') }}"></script>
</head>

<body class="bg-light">
  <div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="{{ route('home') }}" class="text-decoration-none d-flex align-items-center w-auto">
                <h2 class="d-none d-lg-block">Laravel Authentication</h2>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3 px-4 pb-2 shadow">

              <div class="card-body">
                <div class="pt-4 pb-2">
                  <h5 class="text-primary  card-title text-center pb-0 fs-4">Login to Your Account</h5>
                  <p class="text-center small">Enter your username & password to login</p>
                </div>

                <!-- Validation Errors -->
                @if($errors->any())
                <div class="alert alert-danger">
                  @foreach($errors->all() as $error)
                      <small>{{ $error }}</small>
                  @endforeach
                </div>
                @endif

                <form class="row g-3 needs-validation" method="POST" action="{{ route('login') }}">
                  @csrf

                  <!-- Email Address -->
                  <div class="col-12">
                    <label for="yourEmail" class="form-label">Email</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="email" name="email" class="form-control" id="yourEmail" value= "{{ old('email') }}" required>
                    </div>
                  </div>
                  
                  <!-- Password -->
                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                  </div>

                  <!-- Remember Me -->
                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Login</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">Don't have account? <a href="{{ route('register') }}">Create an account</a></p>
                  </div>
                </form>

              </div>
            </div>

          </div>
        </div>
      </div>

    </section>

  </div>
</body>

</html>