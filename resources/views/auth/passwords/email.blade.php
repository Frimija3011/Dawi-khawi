@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-mobile-reset" style="height: 240px; margin-top: 10em">
                  <div class="card-header card-mobile" style="color: whitesmoke; font-weight: bold"><i class="fas fa-unlock"></i> Réinitialisation du mot de passe</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-right" style="font-weight: bold; color: whitesmoke">Adresse e-mail</label>

                            <div class="col-md-6">
                                  <input id="email" type="email" placeholder="Ex : adresse@domaine.fr" class="my-input-texte form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary" style="width: 100%">
                                      <i class="fas fa-link"></i> Recevoir le lien de réinitialisation
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
