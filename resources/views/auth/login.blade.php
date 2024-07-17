<!doctype html>
<html lang="en">

<head>
  <title>GorettiSnackXpress</title>
    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon1.png') }}" rel="icon">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

<!-- Section: Design Block -->
<section class="text-center">
  <!-- Background image -->
  <div class="p-5 bg-image" style="
        background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
        height: 300px;
        "></div>
  <!-- Background image -->

  <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
    <div class="card-body py-5 px-md-5">

    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form action="{{route('login')}}" method="post">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">

                                            <!--<i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;">LG</i>-->
                                            <span class="h1 fw-bold mb-0">Bienvenido de nuevo</span>
                                        </div>
                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Iniciar Sesión</h5>
                                        
                                        
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example17">Gmail</label>
                                            <input type="email" name="email" id="email" class="form-control form-control-lg" />
                                            @error('email')
                                                <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">* {{ $message }}</p>
                                            @enderror
                                          </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example27">Contraseña</label>
                                            <input type="password" name="password" id="password" id="form2Example27" class="form-control form-control-lg" />
                                            @error('password')
                                                <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">* {{ $message }}</p>
                                            @enderror
                                          </div>
                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Ingresar</button>
                                        </div>
                                        <div class="pt-1 mb-4">
                                          <p>No tienes una cuenta?</p>
                                          <a href="{{route('register')}}" class="btn btn-primary">Registrate</a>
                                        </div>
                                        <div class="pt-1 mb-4">
                                        <a href="{{ route('auth.google') }}" class="btn btn-primary">Iniciar sesión con Google</a>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
  </div>
</section>
<!-- Section: Design Block -->

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
</div>
                            