<?php

namespace App\Http\Requests\Prize;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePrizeReqest extends FormRequest
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
                // dd($this->request->all());

        $rules = [
            'item'  =>  ' required | integer ',
            'gift'  =>  ' required ',
            'code'  =>  ' required ',
            'quantity'  =>  'required | integer ',
            'total_week_in_month'   =>  'required | integer',
            'total_quantity_in_month'   => ' required | integer',
            'probability'               => ' required '            
        ];

        return $rules;
    }
}
