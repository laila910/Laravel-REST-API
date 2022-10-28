<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
    $user=$this->user();
    return $user != null && $user->tokenCan('create');//if he can't , return false 
   }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       
        // $this->merge([
        //     'postal_code'=>$this->postalCode
        // ]);
      
        return [
            'name'=>['required'],
            'type'=>['required',Rule::in(['I','B','i','b'])],
            'email'=>['required','email'],
            'address'=>['required'],
            'city'=>['required'],
            'state'=>['required'],
            'postalCode'=>['required'],
            
        ];
    }
    
    protected function prepareForValidation(){
        $this->merge([
            'postal_code'=>$this->postalCode
        ]);
    }
}
