<div class="card mb-sm-12 mb-md-0 " style="padding: 0;" >
      <div class="card-header msg_head">
                @include('search') 
      </div>
      <div class="card-header msg_head">
            <div class="d-flex bd-highlight">
                  <div class="img_cont" style="font-size: 4.2em; color: white">
                            <!--<img src="https://devilsworkshop.org/files/2013/01/enlarged-facebook-profile-picture.jpg" class="rounded-circle user_img">-->
                            <i class="glyphicon glyphicon-pencil"></i>                                                                              
                    </div>
                    <div class="user_info">
                          <span style="font-weight: bold">Modifier room</span>
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

              <form method="post" action="{{ route('edit-from-vue') }}" id="formEditRoom">

                    @csrf
                    
                    <input type="hidden" value="{{ $room_edit ? $room_edit->id : '' }}" name="id_room_edit" id="id_room_edit" />
                    
                    <div class="form-group" >
                          <label for="room_label_edit" class="col-md-4 col-form-label " style="color: white; margin-left: 10px">Nom</label>

                          <div class="col-md-12">
                              <input id="room_label_edit" type="text" class="my-input-texte form-control{{ $errors->has('room_label_edit') ? ' is-invalid' : '' }} " name="room_label_edit" value="{{ $room_edit && $room_edit->label ? $room_edit->label : old('room_label_edit')  }}" required autofocus>

                            @if ($errors->has('room_label_edit'))
                                <span class="invalid-feedback" room_label_edit="alert">
                                    <strong>{{ $errors->first('room_label_edit') }}</strong>
                                </span>
                            @endif
                        </div>                    
                    </div>

                    <div class="form-group" >
                          <label for="room_type_edit" class="col-md-4 col-form-label " style="color: white; margin-left: 10px; margin-top: 25px">Visibilité</label>

                        <div class="col-md-6" style="margin-top: 25px">
                              @if ($room_edit && $room_edit->prive == 1)
                                    <input type="checkbox" name="room_type_edit" id="room_type_edit" value="on" checked data-toggle="toggle" data-on="Privée" data-off="Publique" {{ old('room_type') == 'on' ? 'checked' : '' }} >
                              @else
                                    <input type="checkbox" name="room_type_edit" id="room_type_edit" value="on"  data-toggle="toggle" data-on="Privée" data-off="Publique" {{ old('room_type') == 'on' ? 'checked' : '' }} >
                              @endif
                        </div>
                          
                    </div>

                    <div id="divRoomCodeEdit" class="form-group  {{ old('room_type') || $room_edit && $room_edit->prive == 1 ? '' : 'hidden' }}" >
                          <label for="room_code_edit" class="col-md-4 col-form-label " style="color: white; margin-left: 10px; margin-top: 15px;">Code</label>

                          <div class="col-md-12" style="margin-top: 15px">
                                <input id="room_code_edit" type="text" class="my-input-texte form-control{{ $errors->has('room_code_edit') ? ' is-invalid' : '' }}" 
                                       style="float: left; width: 90%" name="room_code_edit" value="@if ($room_edit && $room_edit != null && $room_edit->code != null) {{ $room_edit->code }} @endif" placeholder="6 caractètes min.">
                                
                                <a href="#" title="Générer un code aléatoire">
                                      <i id="randomCodeEdit" class="glyphicon glyphicon-random pull-right" style="color: white; margin-top: 7px"></i>
                                </a>               

                                <span class="invalid-feedback" role="alert" id="msgCodeError" style="display: none">

                                </span>
                            @if ($errors->has('room_code_edit'))                                    
                              <span class="invalid-feedback" role="alert">
                                    <br><br><br>
                                    <strong>{{ $errors->first('room_code_edit') }}</strong>
                              </span>                         
                            @endif
                        </div>                    
                    </div>              

                        <div class="col-md-12" style="margin-top: 25px !important">  
                              <button  type="button" class="btn btn-default col-md-5 col-xs-5"  data-type="liste_rooms" id="returnBtnRoomEdit">
                                  <b>Annuler</b>
                              </button>
                               <button id="btnEditRoom" type="submit" class="btn btn-primary col-md-5 col-xs-5 pull-right">
                                  <b>Modifier</b>
                              </button>
                        </div>

              </form>

      </div>
      
      <div class="card-footer"></div>
      
</div>