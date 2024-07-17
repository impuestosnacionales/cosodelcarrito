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

      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-5">Registrarse</h2>
          <form action="{{route('register')}}" method ="post">
            @csrf
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row">
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <input type="text" name="name" class="form-control" />
                  <label class="form-label" for="form3Example1">Nombre</label>
                  @error('name')
                    <p class="text-danger mt-2">* {{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <input type="email" name="email" class="form-control" />
                  @error('email')
                    <p class="text-danger mt-2">* {{ $message }}</p>
                  @enderror
                  <label class="form-label" for="form3Example2">Correo</label>
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="form-outline">
                  <label class="form-label" for="id_rol">Rol</label>
                  <select class="form-select" name="id_rol" id="id_rol">
                      @foreach ($roles as $rol)
                          <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                      @endforeach
                  </select>
                  @error('id_rol')
                  <p class="text-danger mt-2">* {{ $message }}</p>
                  @enderror
              </div>
          </div>
            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" name="password" class="form-control"  />
              @error('password')
                <p class="text-danger mt-2">* {{ $message }}</p>
              @enderror
              <label class="form-label" for="form3Example4">Contraseña</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" name="password_confirmation" class="form-control"  />
              <label class="form-label" for="form3Example4">Confirmar Contraseña</label>
            </div>
            <!-- Submit button -->

            <!-- Register buttons -->
            <div class="pt-1 mb-4">
            <button class="btn btn-dark btn-lg btn-block" type="submit">Ingresar</button>
           </div>
          </form>
        </div>
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