<div class="card" >
            
      <div class="card mb-sm-12 mb-md-0 contacts_card" >
      
            <div class="card-header msg_head">
                      @include('search') 
            </div>
 
            <div class="card-header msg_head">
                  <div class="d-flex bd-highlight">
                        <div class="img_cont" style="font-size: 4.2em; color: white">
                                  <!--<img src="https://devilsworkshop.org/files/2013/01/enlarged-facebook-profile-picture.jpg" class="rounded-circle user_img">-->
                                  <i class="glyphicon glyphicon-user"></i>
                          </div>
                          <div class="user_info">
                                <span style="font-weight: bold">Liste des membres</span>
                                    <p style="font-size: 12px;">  
                                          <i class="glyphicon glyphicon-check"></i> <span class="hidden-xs hidden-sm" style="font-size: 12px">Actuellement en</span> <span class="hidden-md hidden-lg" style="font-size: 12px">En</span> ligne : 11 <br> 
                                              <i class="fas fa-envelope"></i> Messages : 1767
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
                                <li id="switch_left_column_liste_rooms" data-type="liste_rooms">
                                      <i class="glyphicon glyphicon-screenshot"></i> Liste des rooms
                                </li>
                          </ul>
                  </div>
            </div>

            <div id="app">
                  <chat-membres :users="users"></chat-membres>            
                  <chat-messages :messages="messages"></chat-messages>
            </div>            

            <div class="card-footer"></div>

      </div>      

      <div class="card-header msg_head">
              <div class="d-flex bd-highlight">
                      <div class="img_cont">
                              <img src="https://devilsworkshop.org/files/2013/01/enlarged-facebook-profile-picture.jpg" class="rounded-circle user_img">
                              <span class="online_icon offline"></span>                             
                      </div>
                      <div class="user_info">
                              <span><i class="fas fa-user"></i> Nom utilisateur</span>
                              <p>  
                                        <i class="fas fa-calendar"></i> En ligne<br> 
                                        <i class="fas fa-envelope"></i>1767
                              </p>
                      </div>
                      <div class="video_cam">
                              <span><i class="fas fa-video"></i></span>
                              <span><i class="fas fa-phone"></i></span>
                      </div>
              </div>
              <span id="action_menu_membre"><i class="fas fa-ellipsis-v"></i></span>
              <div class="action_menu_membre_div">
                      <ul>
                              <li><i class="fas fa-user-circle"></i> Voir son profi</li>
                              <li><i class="fas fa-users"></i> Ajouter aux amis</li>
                              <li><i class="fas fa-plus"></i> Ajouter au groupe</li>
                              <li><i class="fas fa-ban"></i> Bloquer</li>
                      </ul>
              </div>
      </div>

      <div class="card-footer">
                <div class="input-group" style="padding: 0">
                      <div class="input-group-append">
                              <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                      </div>
                      <textarea name="content" id="content" class="form-control type_msg" placeholder="Ecrivez un message ..." style="width: 95%;"></textarea>                                                            
                      <button onclick="SendMessageUser();" class="btn btn-primary" style="margin-right: -50px; margin-top: 15px;"><i class="fas fa-location-arrow"></i></button>
              </div>
      </div>

</div>