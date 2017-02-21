<?php

namespace Concursos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConcursoCadastroRequest extends FormRequest
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
            "descricao" => "required",
            "edital" => "required",
            "data_inicio_inscricoes" => "required|date_format:d/m/Y",
            "data_termino_inscricoes" => "required|date_format:d/m/Y"
        ];
    }
    
    public function messages() {
        return [
           "descricao.required" => "O campo descrição é obrigatório;" ,
           "edital.required" => "O campo edital é obrigatório;",
           "data_inicio_inscricoes.required" => "O campo Data de Início das Inscrições é obrigatório;" ,
           "data_inicio_inscricoes.date_format" => "O campo Data de Início das Inscrições deve ser uma data válida;" ,
           "data_termino_inscricoes.required" => "O campo Data de Término das Inscrições é obrigatório;" ,
           "data_termino_inscricoes.date_format" => "O campo Data de Término das Inscrições deve ser uma data válida;" 
        ];
    }
    
}
