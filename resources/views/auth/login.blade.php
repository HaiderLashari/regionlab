@extends('layouts.app')

@section('content')



<style>
    .splash-container{
       width: 100%;
    max-width: 375px;
    padding: 15px;
    margin: auto;
    }
 .login-card{
        height: 100%;
    }

  .login-card{
        display: -ms-flexbox;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>


    <div class="splash-container login-card p-0">
        <div class="card ">
            <div class="card-header text-center"><a href=""  style="font-size:26px; font-weight: bolder;">Regionlab</a></div>
            <div class="card-body my-3 px-4">
                <form method="POST" action="{{ route('login') }}">
                     @csrf
                    <div class="form-group">
                         {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" > --}}
                   

                     <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                    </div>
                    <div class="form-group">
                        <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn btn-block">Login</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0 ">
                <div class="card-footer">
                    <a href="{{ route('password.request') }}" class="footer-link">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>


@endsection
