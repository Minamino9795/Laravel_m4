<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Product;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => ['required'],
            'slug' => ['required'],
            'price' => ['required'],
            'decscription' => ['required'],
            'quantity' => ['required'],
            'image' => ['required'],
        ];
        // if($this->product){
        //     $product = Product::find($this->product);
        //     if($product->image){
        //         unset($rules['image']);
        //     }
        // }

        if($this->old_image){
            unset($rules['image']);
        }

        return $rules;
    }
    public function messages()
    {
        return [
            'name.required' => 'Can not be empty!',
            'slug.required' => 'Can not be empty!',
            'price.required' => 'Can not be empty!',
            'decscription.required' => 'Can not be empty!',
            'quantity.required' => 'Can not be empty!',
            'image.required' => 'Can not be empty!',
        ];
    }
}
