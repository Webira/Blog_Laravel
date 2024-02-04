<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
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
        //return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        /////// different////
        if (request()->routeIs('posts.store')) {
            $imageRule = 'required|file|mimes:jpg,jpeg,png,gif';
            //$imageRule = 'required|image|mimes:jpg,jpeg,png,gif|max:1024';
        } elseif (request()->routeIs('posts.update')) {
            $imageRule = 'sometimes|image';
        }

        return [
            'title' => 'required',
            'content' => 'required',
            //'image' => 'image|required',
            'image' => $imageRule,
            'category' => 'required',
            //'user_id' => [Auth::user()->id],
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->image == null) {
            $this->request->remove('image');
        }
    }
}
