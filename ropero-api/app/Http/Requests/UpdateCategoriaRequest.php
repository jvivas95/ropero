<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class UpdateCategoriaRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'nombre' => [
                'sometimes', 'required', 'string', 'max:50',
                Rule::unique('categorias', 'nombre')->ignore($this->route('categoria')),
            ],
            'activo' => ['sometimes', 'required', 'boolean']
        ];
    }

    public function after(): array
    {
        // Function to block 'activo' of 'categoria' when content 'prendas'
        return [
            function (Validator $validator) {
                // Categori loaded from the URL
                $categoria = $this->route('categoria');

                // Only block when the request is trying to set activo = false
                if ($this->has('activo') && !$this->boolean('activo') && $categoria->prendas()->where('activo', true)->exists()) {
                    $validator->errors()->add(
                        'activo',
                        'No se puede desactivar una categoría con prendas activas.'
                    );
                }
            }
        ];
    }
}
