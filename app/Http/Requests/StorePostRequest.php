<?php
// Made this request so i copy paste the validation every single time to easy multiple use 
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title'=>'required|min:3',
            'description'=>'required'
        ];
    }

    // Use messages function to customize the error message (messages function is predefined i only override it)
    public function messages () {
        return [
            'title.required'=>"Title is null",
            'description.required'=>"Description is null"
        ]; 
    }
}
