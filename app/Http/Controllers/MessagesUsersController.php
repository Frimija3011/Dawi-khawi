<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Mail\Events\MessageSent;

use App\Models\MessageUser;
use App\User;

use App\Events\MessageSentEvent;

use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\DeleteMessageRequest;


class MessagesUsersController extends Controller
{
      private $message_user;
      private $user;
      
      protected $fillable = ['body'];
      protected $appends = ['selfMessage'];
      
      function __construct(MessageUser $message_user, User $user) 
      {
            $this->message_user = $message_user; 
            $this->user = $user;
                      
            return $this->middleware('auth');
      }
      
      /************************************************* Vue js ******************************************************/      
      public function fetchMessages($id)
      {
            // Connected user
            $connected_user = auth()->user();
            
            // Messages 
            $messages = MessageUser::all();

            
            // Utilisateurs
            
            
            // Utilisteur connecté
            
            
            
            return $messages;
      }
      
      public function sendMessage(Request $request)
      {
            $message = auth()->user()->messages()->create([
                    'message' => $request->message
            ]);
            
            broadcast(new MessageSent(auth()->user(), $message))->toOthers();
            
            return ['status' => 'Message Sent!'];
      }
      
      /*****************************************************************************************************************/
      public function sendToUser(Request $request)
      {
            // Expéditeur
            $id_user_from = $request->has('id_user_from') ? $request->input('id_user_from') : 0;
            if ($id_user_from === 0) {
                  return 'Une erreur internet s\'est produite (code : CMUSTU - 1)';
            } 
            
            // Destinataire
            $id_user_to = $request->has('id_user_to') ? $request->input('id_user_to') : 0;
            if ($id_user_to === 0) {
                  return 'Une erreur internet s\'est produite (code : CMUSTU - 2)';
            }
            
            // Contenu
            $content = $request->has('content') ? $request->input('content') : '';
            if ($content === '') {
                  return 'Une erreur internet s\'est produite (code : CMUSTU - 3)';
            }
            
            $message_user = new MessageUser();
            $message_user->user_from = $id_user_from;
            $message_user->user_to = $id_user_to;
            $message_user->content = $content;
            $message_user->image_id = null;            
            $message_user->archive = 0;
            
            $message_user->save();
      }     
      
      public function checkNew(Request $request)
      {
            // Expéditeur
            $id_user_from = $request->has('id_user_from') ? $request->input('id_user_from') : 0;
            if ($id_user_from === 0) {
                  return 'Une erreur internet s\'est produite (code : CMUSTU - 1)';
            } 
            
            // Destinataire
            $id_user_to = $request->has('id_user_to') ? $request->input('id_user_to') : 0;
            if ($id_user_to === 0) {
                  return 'Une erreur internet s\'est produite (code : CMUSTU - 2)';
            }
            
            // Nb messages existants
            $nb_messages_existants = $request->has('nb_messages_with_user') ? $request->input('nb_messages_with_user') : 0;
            
            // New nb messages
            $new_nb_messages = $this->message_user->getNbMessages($id_user_from, $id_user_to);
            
            // All messages between this 2 users
            $all_messages_between_2_users = $this->message_user->getAll();
            
            $new_messages_between_users = [];
            foreach ($all_messages_between_2_users as $nb) {
                  if ($nb->user_from == $id_user_to && $nb->user_to == $id_user_from || $nb->user_from == $id_user_from && $nb->user_to == $id_user_to) {
                        $new_messages_between_users[] = $nb;
                  }
            }
            
            if ($nb_messages_existants < count($new_messages_between_users)) {
                 return ' true';
            }
            
            return  'false';
      }

}
