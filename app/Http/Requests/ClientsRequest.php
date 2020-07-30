<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientsRequest extends FormRequest
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

  public function rules()
  {
    return [
      'name' => 'required',
      'phone' => 'required',
      'email' => 'required|unique:clients',
    ];
  }

  public function messages()
  {
    return [
      'name.required' => 'Este campo en Obligatorio',
      'phone.required' => 'Este campo en Obligatorio',
      'email.required' => 'Este campo en Obligatorio',
      'email.unique' => 'Este correo ya existe en nuesta base de datos, prueba otro',
    ];
  }
}
