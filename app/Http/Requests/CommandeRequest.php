<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommandeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "nom" => ['required', 'string','min:2'],
            "prenom" => ['required', 'string', 'min:2'],
            'tel' => ['required', 'string', 'max:15'],
            'adresse' => ['required', 'string'],
            'zone_liv' => ['required', 'string'],
            'email' => ['required', 'string','email'],
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Votre nom est requis',
            'prenom.required' => 'Votre prénom est requis',
            'prenom.min' => 'Entrez un prénom valide',
            'adresse.required' => 'Votre adresse est requise',
            'zone_liv.required' => 'Sélectionnez une zone de livraison',
            'email' => 'Votre email est requis'
        ];
    }
}
