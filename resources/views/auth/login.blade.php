@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
          <div class="col-md-8">
            <div class="card" style="height: 350px; margin-top: 10em">
                  <div class="card-header" style="color: whitesmoke; font-weight: bold"><i class="fas fa-key"></i> Connectez-vous pour ouvrir une session</div>

                <div class="card-body">
                      <form method="POST" action="{{ route('login') }}" id="formConnexion">
                        @csrf

                        <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-right" style="color: white">Adresse E-mail</label>

                            <div class="col-md-6">
                                  <input id="email" type="email" placeholder="" class="my-input-texte form-control{{ $errors->has('email') ? ' is-invalid' : '' }} " name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right" style="color: white">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="my-input-texte form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                  <div class="form-check" style="padding-left: 18px">
                                      <input class="form-check-input" type="checkbox" style="margin-left: -17px !important; margin-right: 10px !important;" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label"  for="remember" style="color: white; ">
                                        Rester connecté
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">                                  
                                  <button type="submit" class="btn btn-primary" >                                      
                                      Se connecter
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" style="color: white" href="{{ route('password.request') }}">
                                          <u>Mot de passe oublié ?</u>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
          
    </div>
</div>
@endsection
