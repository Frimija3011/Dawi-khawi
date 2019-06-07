@extends('layouts.app')

@section('content')

<div class="contenu" >
      <div class="card-body">

          @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
          @endif

          <div class="container-fluid h-100" >
                   <div class="row justify-content-center h-100" >

                        <div class="col-md-4 chat hidden ">
                              @if ($affichage_gauche == 'liste_membres')            

                                    @include('membres.liste')

                              @elseif ($affichage_gauche == 'liste_rooms')

                                    @include('rooms.liste')

                              @elseif ($affichage_gauche == 'room_add')

                                    @include('rooms.add')

                              @elseif ($affichage_gauche == 'room_edit')

                                    @include('rooms.edit')

                              @endif
                        </div>

                        <div class="col-md-12 chat" >
                              
                              @include('messages.with_user')
<!--                              @if ($affichage_droite == 'liste_messages_user')

                                    @include('messages.with_user')

                              @elseif ($affichage_droite == 'liste_messages_room')

                                    @include('messages.in_room')

                              @endif-->
                        </div>

                  </div>
          </div>

      </div>
</div>
@endsection
