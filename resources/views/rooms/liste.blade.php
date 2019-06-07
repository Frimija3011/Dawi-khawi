<div class="card mb-sm-12 mb-md-0 contacts_card" >
<div class="card-header msg_head">
          @include('search') 
</div>
<div class="card-header msg_head">
            <div class="d-flex bd-highlight">
                  <div class="img_cont" style="font-size: 4.2em; color: white">
                            <!--<img src="https://devilsworkshop.org/files/2013/01/enlarged-facebook-profile-picture.jpg" class="rounded-circle user_img">-->
                            <i class="glyphicon glyphicon-screenshot"></i>                                                                              
                    </div>
                    <div class="user_info">
                          <span style="font-weight: bold">Liste des rooms</span>
                              <p style="font-size: 12px;">  
                                          <i class="fas fa-comments"></i> Publics : <b>{{ $nb_rooms_publics }}</b> <br> 
                                      <i class="glyphicon glyphicon-lock"></i> Privés : <b>{{ $nb_rooms_prives }}</b> <br>                                       
                                      <i class="fas fa-envelope"></i> Messages : 0
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
                          @if ($habilite_room == true)
                              <li id="room_add_show_form_room_add" data-type="room_add">
                                    <i class="glyphicon glyphicon-plus-sign"></i> Nouveau room
                              </li>
                          @endif
                    </ul>
            </div>
    </div>
      <div class="card-body contacts_body" style="height: 80px">
              <ui class="ul_room contacts">
                  @foreach($rooms as $room)
                  <li class="li_room " id="li_room_{{ $room->id }}">
                              
                              <div class="d-flex bd-highlight" >
                                    <div class="img_cont">
                                              <img src="{{ asset('public/img/room.png') }}" class="user_img" style="border: none !important">     
                                                @if ($room->prive == 1)
                                                        <span class="online_icon offline" style="background-color: #f4b0af !important"></span>
                                                @else
                                                        <span class="online_icon" style="background-color: #ccc !important"></span>
                                                @endif                                              
                                      </div>
                                      <div class="user_info">                                                
                                                @if ($room->prive == 1)
                                                      <span>{{ $room->label }}</span>
                                                      <p style="color: #f4b0af !important">
                                                            <i class="fas fa-lock"></i> Privé
                                                      </p>
                                                @else
                                                      <span>{{ $room->label }}</span>
                                                      <p style="color: #ccc !important">
                                                            <i class="fas fa-comments"></i> Public
                                                      </p>
                                                @endif
                                              </p>                                              
                                      </div>                                    
                              </div>

                              <div id="blocPencil_{{ $room->id }}" class="blocPencil pull-right hidden" style="color: white; margin-top: -32px;">
                                    <input type="hidden" name="hidden_id_room" id="hidden_id_room" value="{{ $room ? $room->id : '' }}" />
                                    @if ($room->prive == 1)

                                                @if ($room->habilite_edit_room == true)
                                                      <a id="href_room_edit" data-type="room_edit" class="btn btn-primary editPencil" data-id="{{$room->id}}" style="font-size: 10px; width: 8px; padding-right: 20px">
                                                            <span class="glyphicon glyphicon-pencil" style="color: #fff !important; cursor: pointer;  "></span>
                                                      </a>
                                                      <a id="href_room_show" data-type="list_msg_room" class="btn btn-primary roomShow " style="background-color: #f4b0af !important; font-size: 11px; width: 11px; padding-right: 20px" data-id="{{$room->id}}" >
                                                            <span class="glyphicon glyphicon-eye-open text-primary" style="cursor: pointer;"></span>
                                                      </a>
                                                @endif

                                    @else

                                                @if ($room->habilite_edit_room == true)

                                                <a id="href_room_edit" data-type="room_edit" class="btn btn-default editPencil" data-id="{{$room->id}}" style="font-size: 10px; width: 8px; padding-right: 20px">
                                                      <i class="glyphicon glyphicon-pencil text-primary" style="cursor: pointer;  "></i>
                                                </a>

                                                @endif

                                                <a id="href_room_show" data-type="list_msg_room" class="btn btn-primary roomShow " style="background-color: #ccc !important; font-size: 11px; width: 11px; padding-right: 20px" data-id="{{$room->id}}" >                                                
                                                      <i class="glyphicon glyphicon-eye-open text-primary" style="cursor: pointer; "></i>
                                                </a>

                                    @endif
                              </div>
                              
                      </li>
                 @endforeach
              </ui>
      </div>
  <div class="card-footer"></div>
</div>