<?php

namespace App\Http\Requests\Frontsite\Events;

use Illuminate\Foundation\Http\FormRequest;

class StoreEvent extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'contact_number' => 'required',
            'email' => 'required|email|confirmed',
            'event_type_id' => 'required',
            'date' => 'required', // event date
            'location' => 'required',
            'budget' => 'required',
            'terms_agreement' => 'accepted'
        ];
    }
}
