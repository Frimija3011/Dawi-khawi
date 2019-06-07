<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddRoomRequest;

use App\Models\Outils\Constantes;

class RoomsController extends Controller
{
      private $room;
      
      function __construct(Room $room) {
            $this->room = $room;
      }
      
      public function getAllRooms($user_id = null)
      {
            $rooms = $this->room->getAll($user_id);
            return $rooms;
      }
      
      public function getById($id)
      {
            $room = $this->room->getById($id);
            
            if ($room) {
                  return $room;
            }
            
            return null;
      }
      
      public function showEditForm(Request $request)
      {            
            session(['room_edit_session_id' => $request->input('id_room_edit')]);
            
            session(['affichage_gauche' => Constantes::ROOM_EDIT ]);

            return redirect()->route('home');
      }
      
      public function addFromVue(AddRoomRequest $request)
      {
            $room = new Room();
            
            // label            
            if (!$request->exists('room_label')) {                  
                  return 0;
            }
            
            $room->label = $request->input('room_label');
            
            // prive + code
            $room->prive = 0;
            $room->code = null;
            if ($request->exists('room_code') && $request->input('room_code') != null) {
                  $room->prive = 1;
                  $room->code = $request->input('room_code');
            }
            
            // user
            $user = Auth::user();
            
            if (!$user) {
                  return 0;
            }
            
            $room->user_id = $user->id;
            
            $save = $room->save();
            
            if (!$save) {
                  return  0;
            }
            
            session(['affichage_gauche' => Constantes::LISTE_ROOMS ]);

            return redirect()->route('home');
      }      
      
      public function editFromVue(Request $request)
      {
            $room = $this->room->getById($request->input('id_room_edit'));
            
            // label            
            if (!$request->exists('room_label_edit')) {                  
                  return 0;
            }
            
            $room->label = $request->input('room_label_edit');
            
            // prive + code
            $room->prive = 0;
            $room->code = null;
            
            if ($request->exists('room_type_edit') && $request->input('room_type_edit') != null) {
                  $room->prive = 1;
                  $room->code = $request->input('room_code_edit');
            }
            
            // user
            $user = Auth::user();
            
            if (!$user) {
                  return 0;
            }
            
            $room->user_id = $user->id;
            
            $save = $room->update();
            
            if (!$save) {
                  return  0;
            }
            
            session(['affichage_gauche' => Constantes::LISTE_ROOMS ]);

            return redirect()->route('home');
      }
      
}
