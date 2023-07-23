@extends('Templates.Welcome')

@section('content')
    <img src="{{ asset('images/background7.jpg') }}" alt="" class="wave">
    <div class="container">
        <div class="img">

        </div>

        <div class="login-content">
            <form role="form text-left mt-5" method="POST" action="{{ route('login') }}">
                @csrf
                <img src="https://raw.githubusercontent.com/sefyudem/Responsive-Login-Form/master/img/avatar.svg">
                <h2 class="title">Shotoku</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Usuario</h5>

                        <input id="email" type="email" class="input @error('email') is-invalid @enderror"
                            name="email" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Contraseña</h5>
                        <input type="password" class="input @error('password') is-invalid @enderror" name="password"
                            aria-describedby="password-addon" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>
                {{-- <a href="#">Forgot Password?</a> --}}
                <input type="submit" class="btn" value="Ingresar">
                <p style="font-weight:bold;">Grupo coguasimales</p>
            </form>


        </div>



    </div>


    </div>

    {{-- 
    <section class="min-vh-80">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('./images/bg-control.jpg');opacity: 0.85;">
           
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 ">Bienvenidos</h1>
                        <p class="text-lead text-white" style="font-weight:bold;font-size:18px;">Grupo Coguasimales</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0" style="position:relative;bottom:50px;border:1px solid rgb(24, 25, 63);">
                        <div class="card-header text-center pt-4">
                            <h5>Iniciar sesion</h5>
                        </div>
                        <div class="row px-xl-5 px-sm-4 px-3">

                            <div class="mt-2 position-relative text-center">
                                <p
                                    class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline z-index-2 bg-white px-3">
                                    <img src=" {{ asset('images/Captura1.PNG') }}" style="position:relative;width:60%;">

                                </p>
                            </div>
                        </div>
                        <div class="card-body">
                            <form role="form text-left mt-5" method="POST" action="{{ route('login') }}">

                                @csrf

                                <div class="mb-3 mt-4">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" placeholder="Correo" aria-label="Email" aria-describedby="email-addon"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" placeholder="Contraseña" aria-label="Password"
                                        aria-describedby="password-addon" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-4">
                                        {{ __('Ingresar') }}</button>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>s
            </div>
        </div>
    </section>
 --}}
@endsection
