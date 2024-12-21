<!-- resources/views/login.blade.php -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> 
  </head>
  <body>
    <div class="row">
        <section class="vh-100" style="background-color: #0080FF;">
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                  <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                      <div class="col-md-6 col-lg-5 d-none d-md-block">
                        <img src="{{ asset('images/1.png') }}" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                      </div>
                      <div class="col-md-6 col-lg-7 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">
                          <form action="{{ route('login-user') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="d-flex align-items-center mb-3 pb-1">
                                <span class="h1 fw-bold mb-0"> Group Consulting </span>
                              </div>
                              <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
                              @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                              @endif
                              @if (Session::has('fail'))
                                <div class="alert alert-danger">
                                    {{ Session::get('fail') }}
                                </div>
                              @endif
                              <div data-mdb-input-init class="form-outline mb-4">
                                <input type="email" name="email" class="form-control" required>
                                <span class="text-danger">
                                  @error('email') {{$message}} @enderror
                                </span>
                              </div>
                              <div data-mdb-input-init class="form-outline mb-4">
                                <input type="password" name="password" class="form-control" required>
                                <span class="text-danger">
                                  @error('password') {{$message}} @enderror
                                </span>
                              </div>
                              <div class="pt-1 mb-4">
                                <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                              </div>
                              <p class="mb-5 pb-lg-2 mt-3" style="color: #393f81;">Vous n'avez pas de compte? <a href="{{ route('inscription') }}" style="color: #393f81;">Inscription</a></p>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
