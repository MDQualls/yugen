<?php

namespace App\Http\Requests\gallery;

use Illuminate\Foundation\Http\FormRequest;

class CreateGalleryImageRequest extends FormRequest
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
            'image' => 'required',
            'gallery_id' => 'required',
            'cover_image' => 'required',
        ];
    }
}
