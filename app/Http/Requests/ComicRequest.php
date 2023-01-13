<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // deve essere true
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
            'title'=>'required|max:200|min:5',
            'description'=>'max:1000',
            'thumb'=>'required|max:255|min:10',
            'price'=>'required|decimal:0,2',
            'series'=>'required|max:100|min:5',
            'sale_date'=>'required',
            'type'=>'max:100'
        ];
    }

    public function messages(){
        return [
            'title.required'=>'Il titolo è un campo obbligatorio',
            'title.max'=>'Il titolo può essere lungo massimo :max caratteri',
            'title.min'=>'Il titolo deve essere di almeno :min caratteri',
            'description.max'=>'La decrizione può essere lunga massimo :max caratteri',
            'thumb.required'=>'La URL dell\'immagine è un campo obbligatorio',
            'thumb.max'=>'La URL dell\'immagine può essere lunga massimo :max caratteri',
            'thumb.min'=>'La URL dell\'immagine deve essere di almeno :min caratteri',
            'price.required'=>'Il prezzo è un campo obbligatorio',
            'price.decimal'=>'Il prezzo può avere massimo 2 decimali',
            'series.required'=>'La serie è un campo obbligatorio',
            'series.max'=>'La serie può essere lunga massimo :max caratteri',
            'series.min'=>'La serie deve essere di almeno :min caratteri',
            'sale_date.required'=>'La data d\'usita è un campo obbligatorio con questo formato yyyy-mm-dd',
            'type.max'=>'Il tipo può essere lungo massimo :max caratteri'
        ];
    }
}
