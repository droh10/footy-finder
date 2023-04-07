<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSchedule extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=>'required',
            'description'=>'nullable',
            'venue'=>'required',
            'date'=>'bail|required|date|after:yesterday'.$this->schedule->id,
            'start_time'=>'required',
            'end_time'=>'bail|required|after:start_time',
            'play_type_id'=>'required|not_in:0',
            'player_type_id'=>'required|not_in:0',
            'contact_person_name'=>'required',
            'contact_number'=>'required',
            'contact_email'=>'bail|required|email',
            'max_player'=>'required|integer',
            'image'=>'mimes:png,jpg,jpeg|max:2048'
        ];
    }
}
