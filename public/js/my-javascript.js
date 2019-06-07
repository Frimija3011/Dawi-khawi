/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//window.setInterval("refreshMessages()", 4000);

//setInterval(refreshMessages, 14000);
function refreshMessages() {
      
      var id_user_from = $('#id_user_from').val();
      var id_user_to = $('#id_user_to').val();

      if (id_user_from != id_user_to) {
            
            var fd = new FormData();                        
            fd.append('_token', $('meta[name=csrf-token]').attr('content'));
            fd.append('id_user_from', id_user_from);
            fd.append('id_user_to', id_user_to);

            var nb_messages_with_user = $('#messages_with_user_hidden').val();
            fd.append('nb_messages_with_user', nb_messages_with_user);
            $.ajax({
                url: "message-user/checkNew",
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: 
                  function(data) {
                        console.log(data);
                        if (data.reload == 'true') {
                              $('#messages_with_user_hidden').val(data.new_nb_messages_user);                                                                                                        
                              loaction.reload();
                        }
                }
            });

      }
      
}

$(document).ready(function() {
      
      // initial call
      refreshMessages();

      hideLoader();     
            
      $('.action_menu_membre_div').click(function() {
            $(this).hide();
      });
      
      $('.action_menu_room_membre_div').click(function() {
            $(this).hide();
      });
      
      $(document).mouseup(function(e)  {
            
          var container1 = $(".action_menu_membre_div");
          var container2 = $(".action_menu_room_membre_div");

          // if the target of the click isn't the container nor a descendant of the container
          if (!container1.is(e.target) && container1.has(e.target).length === 0)  {
              container1.hide();
          }
          
          if (!container2.is(e.target) && container2.has(e.target).length === 0)  {
              container2.hide();
          }          
          
      });
      
      // Room type checked or not
      $('.toggle-group').click(function() {
            
            var radioValue = $("input[name='room_type']:checked").val();
            
            if (radioValue != undefined && radioValue == 'on') {
                  $('#room_code').val('');
                  $('#divRoomCode').addClass('hidden');
            } else if (radioValue == undefined) {
                  $('#divRoomCode').removeClass('hidden');
            }
      });
      
      $('.toggle-group').click(function() {
            
            var radioValue = $("input[name='room_type_edit']:checked").val();
            
            if (radioValue != undefined && radioValue == 'on') {
                  $('#divRoomCodeEdit').addClass('hidden');
            } else if (radioValue == undefined) {
                  $('#divRoomCodeEdit').removeClass('hidden');
            }
      });
      
      
      
       /********************************** Change display left *********************************/        
      $('#switch_left_column_liste_membres, #switch_left_column_liste_rooms, #room_add_show_form_room_add, #room_add_show_form, #returnBtnRoomEdit').click(function() {
            
            var type = $(this).attr('data-type');
            
            var fd1 = new FormData();                        
            fd1.append('_token', $('meta[name=csrf-token]').attr('content'));
            fd1.append('affichage_gauche', type);

            $.ajax({
                url: 'home/switch-liste-gauche',
                type: 'post',
                data: fd1,
                contentType: false,
                processData: false,
                success: function(response) {
                        location.reload();
                        hideLoader();
                }
            }); 
            
      });
      
      /********************************** Change display right *********************************/        
      $('#switch_left_column_liste_membres, #switch_left_column_liste_rooms, #room_add_show_form_room_add, #room_add_show_form, #returnBtnRoomEdit').click(function() {
            
            var type = $(this).attr('data-type');
            
            var fd1 = new FormData();                        
            fd1.append('_token', $('meta[name=csrf-token]').attr('content'));
            fd1.append('affichage_gauche', type);

            $.ajax({
                url: 'home/switch-liste-gauche',
                type: 'post',
                data: fd1,
                contentType: false,
                processData: false,
                success: function(response) {
                        location.reload();
                        hideLoader();
                }
            }); 
            
      });
      
      
      /*********************** Edit Room *************************/      
      $('#hrefEditRoom').click(function(e) {
            
            e.preventDefault();
            
            var fd3 = new FormData();                        
            fd3.append('_token', $('meta[name=csrf-token]').attr('content'));
            fd3.append('id_room_edit', $(this).attr('data-id'));

            $.ajax({
                url: 'room/edit-form',
                type: 'post',
                data: fd3,
                contentType: false,
                processData: false,
                success: function(response) {
                        location.reload();
                        hideLoader();
                }
            }); 
            
      });      
      
      $('#action_menu_membre').click(function() {
            $('.action_menu_membre_div').toggle();
      });
      
      $('#action_menu_room_membre').click(function() {
            $('.action_menu_room_membre_div').toggle();
      });
      
      // Clic sur un room dans la liste
      $('.li_room').click(function(e) {
            
            e.preventDefault();
            
            var id_chaine = $(this).attr('id');
            var id = id_chaine.split('_')[2];     
            
            $(".ul_room li").removeClass("active");
            $(".blocPencil").addClass('hidden');
            
            if (id_room_selected != undefined && id_room_selected == id && !$('#li_room_'+id).hasClass('active')) {
                  $('#li_room_'+id).addClass('active');
                  $('#blocPencil_'+id).removeClass('hidden');                                    
            } else if (id_room_selected != undefined &&  id_room_selected != id) {
                  $('#li_room_'+id_room_selected).addClass('active');
                  $('#blocPencil_'+id_room_selected).removeClass('hidden');
            } else if (id_room_selected == undefined) {
                  $('#li_room_'+id).addClass('active');
                  $('#blocPencil_'+id).removeClass('hidden');
            }          
            
      });
      
      // Clic sur un membre dans la liste
      $('.li_membre').click(function(e) {
            
            e.preventDefault();
            
            showLoader();
            
            var id_chaine = $(this).attr('id');
            var id = id_chaine.split('_')[2];             
            
            var type = $(this).attr('data-type');
            
            var fd = new FormData();                        
            fd.append('_token', $('meta[name=csrf-token]').attr('content'));
            fd.append('affichage_droite', type);
            fd.append('id_other_user_chat', id);

            $.ajax({
                url: 'home/switch-liste-droite',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response) {
                        location.reload();
                        hideLoader();
                        $('#li_membre_'+$('#id_other_user_chat').val()).addClass('active');;
                }
            }); 
            
            $(".ul_membre li").removeClass("active");
            $(".blocPencil").addClass('hidden');
            
            if (id_membre_selected != undefined && id_membre_selected == id && !$('#li_membre_'+id).hasClass('active')) {
                  $('#li_membre_'+id).addClass('active');                                               
            } else if (id_membre_selected != undefined &&  id_membre_selected != id) {
                  $('#li_membre_'+id_membre_selected).addClass('active');                               
            } else if (id_membre_selected == undefined) {
                  $('#li_membre_'+id).addClass('active');                  
            }          
            
      });
        
      /********************************* Loader when user action ***********************************/
      $('#formConnexion, #formInscription').submit(function() {
            showLoader();              
      });

      $('#btnAddRoom').click(function() {

            if ($('#room_label').val().trim() != '') {
                  showLoader();
            }

            var radioValue = $("input[name='room_type']:checked").val();

            if (radioValue == 'on' && $('#room_code').val().trim().length > 0 && $('#room_code').val().trim().length < 6) {
                  hideLoader();                                        
                  $('#room_code').css('background-color', 'red');
                  $('.invalid-feedback').empty();
                  $('.invalid-feedback').css('display', 'none');
                  $('#msgCodeError').append('<br><br><br><strong>Le code doit contenir 6 caractères minimum.</strong>');
                  $('#msgCodeError').css('display', 'block');
                  return false;
            } else {
                  $('#room_code').css('background-color', 'transparent');                    
                  $('.invalid-feedback').empty();
                  $('.invalid-feedback').css('display', 'none');
                  $('#msgCodeError').css('display', 'none');
            }
      });

      $('#btnEditRoom').click(function() {

            if ($('#room_label_edit').val().trim() != '') {
                  showLoader();
            }            

            var radioValue = $("input[name='room_type_edit']:checked").val();

            if (radioValue == 'on' && $('#room_code_edit').val().trim().length > 0 && $('#room_code_edit').val().trim().length < 6 ||
                    radioValue == 'on' && $('#room_code_edit').val().trim().length == 0) {
                  hideLoader();                                        
                  $('#room_code_edit').css('background-color', 'red');
                  $('.invalid-feedback').empty();
                  $('.invalid-feedback').css('display', 'none');
                  if (radioValue == 'on' && $('#room_code_edit').val().trim().length == 0) {
                        $('#msgCodeError').append('<br><br><br><strong>Le code est obligatoire.</strong>');
                  } else {
                        $('#msgCodeError').append('<br><br><br><strong>Le code doit contenir 6 caractères minimum.</strong>');
                  }
                  
                  $('#msgCodeError').css('display', 'block');
                  return false;
            } else {
                  $('#room_code_edit').css('background-color', 'transparent');                    
                  $('.invalid-feedback').empty();
                  $('.invalid-feedback').css('display', 'none');
                  $('#msgCodeError').css('display', 'none');
            }
      });

      $('.dropdown-item, .action_menu_membre_div ul li, .action_menu_room_membre_div ul li').click(function() {
            showLoader();
      });
      
      
      $('.editPencil').unbind();
      $('.editPencil').click(function() {
            
            var fd3 = new FormData();                        
                 fd3.append('_token', $('meta[name=csrf-token]').attr('content'));
                 fd3.append('id_room_edit', $(this).attr('data-id'));

           $.ajax({
                     url: 'room/edit-form',
                     type: 'post',
                     data: fd3,
                     contentType: false,
                     processData: false,
                     success: function(response) {
                             location.reload();
                             hideLoader();
                     }
           });
      });
      
      $('#randomCode').click(function() {            
              $('#room_code').empty();
              var code = getRandomString(6);
              $('#room_code').val(code);
        });
        
        $('#randomCodeEdit').click(function() {            
              $('#room_code_edit').empty();
              var code = getRandomString(6);
              $('#room_code_edit').val(code);
        });        
        
});

function showLoader()
{
      $('#effect').show();
}

function hideLoader()
{
      $('#effect').hide();
}

function getRandomString(length) 
{
      var result = '';
      var characters       = 'ABCDEFGHIJKLM0123456789NOPQRSTUVWXYZ0123456789';
      var charactersLength = characters.length;
      for ( var i = 0; i < length; i++ ) {
         result += characters.charAt(Math.floor(Math.random() * charactersLength));
      }
      return result;
}

function SendMessageUser()
{
      showLoader();
      
      var id_user_from = $('#id_user_from').val();
      var id_user_to = $('#id_user_to').val();
      var content = $('#content').val();
      
      var fd = new FormData();                        
      fd.append('_token', $('meta[name=csrf-token]').attr('content'));
      fd.append('id_user_from', id_user_from);
      fd.append('id_user_to', id_user_to);
      fd.append('content', content.trim());

      $.ajax({
          url: 'message/send-to-user',
          type: 'post',
          data: fd,
          contentType: false,
          processData: false,
          success: function(response) {
                  hideLoader();
                  location.reload();
          }
      });
      
}
