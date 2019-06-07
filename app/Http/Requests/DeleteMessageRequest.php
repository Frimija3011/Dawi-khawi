<?php
    
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\MessageUser;

class DeleteMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $message = MessageUser::findOrFail($this->route('id'));
        return Auth::user() && Auth::user()->id == $message->user_from;
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
        ];
    }
}