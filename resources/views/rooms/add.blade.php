<div class="card mb-sm-12 mb-md-0 contacts_card" >
      <div class="card-header msg_head">
                @include('search') 
      </div>
      <div class="card-header msg_head">
            <div class="d-flex bd-highlight">
                  <div class="img_cont" style="font-size: 4.2em; color: white">
                            <!--<img src="https://devilsworkshop.org/files/2013/01/enlarged-facebook-profile-picture.jpg" class="rounded-circle user_img">-->
                            <i class="glyphicon glyphicon-plus-sign"></i>                                                                              
                    </div>
                    <div class="user_info">
                          <span style="font-weight: bold">Nouveau room</span>
                            <p>  
                                  <i class="glyphicon glyphicon-info-sign"></i> Sera <b>public</b> par défaut.<br> 
                            </p>
                    </div>
                    <div class="video_cam">
                            <span><i class="fas fa-video"></i></span>
                            <span><i class="fas fa-phone"></i></span>
                    </div>
            </div>
            <span id="action_menu_room_membre"><i class="fas fa-ellipsis-v"></i></span>
            <div class="action_menu_room_membre_div" >
                    <ul>
                          <li id="switch_left_column_liste_membres" data-type="liste_membres">
                                <i class="glyphicon glyphicon-user"></i> Liste des membres
                          </li>
                          <li id="switch_left_column_liste_rooms" data-type="liste_rooms">
                                <i class="glyphicon glyphicon-screenshot"></i> Liste des rooms
                          </li>
                    </ul>
            </div>
      </div>
      <div class="card-body ">

              <form method="post" action="{{ route('add-from-vue') }}" id="formAddRoom">

                    @csrf

                    <div class="form-group">
                          <label for="room_label" class="col-md-4 col-form-label " style="color: white; margin-left: 10px">Nom</label>

                          <div class="col-md-12">
                              <input id="room_label" type="text" class="my-input-texte form-control{{ $errors->has('room_label') ? ' is-invalid' : '' }} " name="room_label" value="{{ old('room_label') ? old('room_label') : ''  }}" required autofocus>

                            @if ($errors->has('room_label'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('room_label') }}</strong>
                                </span>
                            @endif
                        </div>                    
                    </div>
                    
                    <div class="form-group" >
                          <label for="room_type" class="col-md-4 col-form-label " style="color: white; margin-left: 10px; margin-top: 25px">Visibilité</label>

                        <div class="col-md-6" style="margin-top: 25px">
                              <input type="checkbox" name="room_type" id="room_type" value="on" checked data-toggle="toggle" data-on="Privé" data-off="Public" {{ old('room_type') == 'on' ? 'checked' : '' }} >
                        </div>
                          
                    </div>

                    <div id="divRoomCode" class="form-group " >
                          <label for="room_code" class="col-md-4 col-form-label " style="color: white; margin-left: 10px; margin-top: 15px;">Code</label>

                          <div class="col-md-12" style="margin-bottom: 15px">
                                <input id="room_code" type="text" class="my-input-texte form-control{{ $errors->has('room_code') ? ' is-invalid' : '' }}" style="float: left; width: 90%" name="room_code" value="" placeholder="6 caractètes min.">
                                
                                <a href="#" title="Générer un code aléatoire">
                                      <i id="randomCode" class="glyphicon glyphicon-random pull-right" style="color: white; margin-top: 7px"></i>
                                </a>               

                                <span class="invalid-feedback" role="alert" id="msgCodeError" style="display: none">

                                </span>
                            @if ($errors->has('room_code'))                                    
                              <span class="invalid-feedback" role="alert">
                                    <br><br><br>
                                    <strong>{{ $errors->first('room_code') }}</strong>
                              </span>                         
                            @endif
                        </div>                    
                    </div>     
                    
                    <div class="col-md-12" style="margin-top: 25px !important">                                
                        <button  type="button" class="btn btn-default col-md-5 col-xs-5"  data-type="liste_rooms" id="returnBtnRoomEdit">
                            <b>Annuler</b>
                        </button>
                         <button id="btnAddRoom" type="submit" class="btn btn-primary col-md-5 col-xs-5 pull-right">
                            <b>Ajouter</b>
                        </button>
                    </div>

              </form>

      </div>
      
      <div class="card-footer"></div>
</div>