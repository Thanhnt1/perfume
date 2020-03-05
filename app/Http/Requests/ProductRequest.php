<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductRequest extends FormRequest
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
    public function rules(Request $request)
    {
        // $id = $request->input('id', null);
        return [
            'name' => "required",
            'supplier_id' => 'required',
            'import_price' =>'required',
            'quantity' => 'required',
            'status' => 'required',
            'category_id' => 'required',
            'selling_price' => 'required',
            'unit_id' => 'required',
            'avatar' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'supplier_id.required' => trans('product.supplierRequired'),
            'import_price.required' => trans('product.importPriceRequired'),
            'category_id.required' => trans('product.categoryRequired'),
            'selling_price.required' => trans('product.sellingPriceRequired'),
            'unit_id.required' => trans('product.unitRequired'),
        ];
    }
}
