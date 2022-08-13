<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Post;
class postHandle extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(\Route::currentRouteName() == 'posts.update'){
            return  Post::find($this->id)->user_id == auth()->id();
        }else{
            return true;
        }
       
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'title' => 'required|max:100',
            'body' => 'required|max:1000',
        ];
    }
}
