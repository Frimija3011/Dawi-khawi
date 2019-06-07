<template>
      
      <div class="card-body contacts_body"> 
            <ui class="ul_membre contacts"> 

                  <li class="limembre" data-type="liste_messages_user" v-for="user in users">
                        <div class="d-flex bd-highlight"> 

                              <div class="img_cont"> 
                                      <img src="" class="rounded-circle user_img">                                              
                                      <span class="online_icon" v-if="user.statut = 'En ligne'"></span>
                                      <span class="online_icon offline" v-if="user.statut = 'Hors ligne'"></span>                                              
                              </div>

                              <div class="user_info">
                                      <span>{{ user.name }}</span>
                                      <p>{{ user.email }}</p>
                              </div>

                          </div>
                  </li>
 
            </ui>
      </div>
      
</template>

<script>
      export default {
            props: ['users']
      };
</script>