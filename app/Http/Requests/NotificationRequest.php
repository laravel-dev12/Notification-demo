<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationRequest extends FormRequest
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
            'message'=>'required',
            'type'=>'required|in:Marketing,Invoices,System',
            'expiry_date'=>'required|date|date_format:Y-m-d H:i',
            'user_id'=>'required'
        ];
    }
}
