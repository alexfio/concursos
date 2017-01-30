<?php

namespace Concursos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidatoRequest extends FormRequest
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
     * @return array 32232416
     */
    public function rules()
    {
        return [
            "nome" => "required|string",
            "nascimento" => "required|date_format:d/m/Y",
            "cpf" => "required|regex:/^[0-9]{3}.[0-9]{3}.[0-9]{3}\-[0-9]{2}$/",
            "telefone_residencial" => "required|regex:/^\([0-9]{2}\)[0-9]{4}\-[0-9]{4}$/",
            "telefone_celular" => "required|regex:/^\([0-9]{2}\)[0-9]{5}\-[0-9]{4}$/",
            "rg" => "required|alpha_num",
            "rg_org_exp" => "required|alpha_num",
            "rg_uf" => "required|numeric",
            "rg_data_expedicao" => "required|date_format:d/m/Y",
            "estado" => "required|numeric",
            "cidade" => "required|numeric",
            "cep" => "required|regex:/^[0-9]{5}\-[0-9]{3}$/",
            "bairro" => "required|string",
            "tipo_logradouro" => "required|numeric",
            "logradouro" => "required|string",
            "numero" => "required|alpha_num",
            "email" => "required|email",
            "senha1" => "required|same:senha2",
            "senha2" => "required"
            
        ];
    }
}
