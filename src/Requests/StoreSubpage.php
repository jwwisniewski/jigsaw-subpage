<?php

namespace jwwisniewski\Jigsaw\Subpage\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubpage extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|min:3',
            'url' => 'nullable|min:3',
            'keywords' => 'nullable|min:3',
            'description' => 'nullable|min:3',
            'contents' => 'required',
        ];
    }
}
