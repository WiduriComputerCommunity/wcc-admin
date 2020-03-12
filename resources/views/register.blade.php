<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <link rel="shortcut icon" href="{{asset ("favicon.png")}}" type="image/x-icon">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }

        .panel-heading {
          background-image: url('images/wccSlider.jpg');
          height: 100px;
        }
    </style>
</head>
<body id="app-layout">

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="background:#2561A8 !important;">
    <a class="navbar-brand" href="#">Widuri Computer Community</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/') }}">Login</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('register') }}">Register</a>
        </li>
      </ul>
    </div>
  </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">

              <div class="card my-5 shadow" style="border-radius: 30px !important;">

                <div class="card-header align-middle" style="border-radius: 30px 30px 0 0 !important; background:url('images/wccSlider.jpg'); height:200px;">
                  <span class="card-title text-white text-center" style="font-family:mono;">Register</span>
                </div>

                <div class="card-body">

                  <form class="form-horizontal" role="form" method="POST" action="{{ url('registerUser') }}">
                      {{ csrf_field() }}

                      <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                          <label for="nama" class="col-md-4 control-label">Nama Lengkap</label>

                          <div class="col">
                              <input id="name" type="text" class="form-control" name="nama" value="{{ old('nama') }}">

                              @if ($errors->has('nama'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('nama') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                          <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                          <div class="col">
                              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                              @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group">
                        <label for="notelp" class="col-md-4 control-label">No. Handphone</label>
                        <div class="col">
                          <input id="notelp" type="tel" name="notelp" class="form-control">

                            <?php if ($errors->has('notelp')): ?>
                              <span class="help-block" style="color:#FF0000;">
                                <strong>
                                  <?php
                                    if ($errors->first('notelp') == "The notelp format is invalid.")
                                      echo "Pastikan nomor telfon yang anda masuki berawalan angka 62 dan tanpa tanda (+)";
                                  ?>
                                </strong>
                              </span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="alasan" class="col-md-4 control-label">Alasan bergabung wcc</label>
                        <div class="col">
                          <textarea name="alasan" class="form-control" id="alasan"></textarea>
                        </div>
                      </div>

                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                          <label for="password" class="col-md-4 control-label">Password</label>

                          <div class="col">
                              <input id="password" type="password" class="form-control" name="password">

                              @if ($errors->has('password'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                          <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                          <div class="col">
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                              @if ($errors->has('password_confirmation'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">
                                  <i class="fa fa-btn fa-user"></i> Register
                              </button>
                          </div>
                      </div>
                  </form>

                  {{-- @if($errors->any())
                      @foreach ($errors->all() as $error)
                      <div class="alert alert-warning alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          {{ $error }}
                      </div>
                      @endforeach
                  @endif --}}

                </div>
              </div>

            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End container -->

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
