<template>
      
      <div class="card-body msg_card_body">
             
            <div class="d-flex justify-content-start mb-4" v-for="message in messages">
                    <div class="img_cont_msg">
                             <img src="" class="rounded-circle user_img_msg">
                    </div>
                    <div class="msg_cotainer"style="min-width: 120px !important"> 
                            {{ message.content }}
                            <span class="msg_time" style="margin-left: 5px">Auj. à 22:30 </span> 
                    </div>
            </div> 

            <div class="d-flex justify-content-end mb-4">
                  <div class="msg_cotainer_send"style="min-width: 120px !important">
                        Contenu du message ici ...
                        <span class="msg_time_send" style="margin-right: 5px">Hier à 18:17</span>
                  </div>
                  <div class="img_cont_msg">
                        <img src="" class="rounded-circle user_img_msg">
                  </div>
            </div>
              
      </div>
      
</template>

<script>
      export default {
            props: ['messages']
      };
</script>