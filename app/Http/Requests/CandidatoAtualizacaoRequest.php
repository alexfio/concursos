<?php

namespace Concursos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidatoAtualizacaoRequest extends FormRequest
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
            "sexo" => "required",
            "cpf" => "required|regex:/^[0-9]{3}.[0-9]{3}.[0-9]{3}\-[0-9]{2}$/|cpf_valido",
            "telefone_residencial" => "required|regex:/^\([0-9]{2}\)[0-9]{4}\-[0-9]{4}$/",
            "telefone_celular" => "required|regex:/^\([0-9]{2}\)[0-9]{5}\-[0-9]{4}$/",
            "rg" => "required|alpha_num",
            "rg_org_exp" => "required|alpha_num",
            "rg_uf" => "required",
            "rg_data_expedicao" => "required|date_format:d/m/Y",
            "estado" => "required",
            "cidade" => "required",
            "cep" => "required|regex:/^[0-9]{5}\-[0-9]{3}$/",
            "bairro" => "required|string",
            "tipo_logradouro" => "required",
            "logradouro" => "required|string",
            "numero" => "required|alpha_num",
            "email" => "required|email",
        ];
    }
    
    public function messages()
{
    return [
        'nome.required' => 'O campo Nome é obrigatório;',
        'nascimento.required'  => 'O campo Nascimento é obrigatório;',
        'nascimento.date_format' 
        => 'O campo Nascimento deve obedecer ao padrão dd/mm/aaaa;',
        'sexo.required'  => 'O campo Sexo é obrigatório;',
        'cpf.required' => 'O campo CPF é obrigatório;',
        'cpf.regex' => 'O campo CPF deve obedecer ao padrão xxx.xxx.xxx-xx;',
        'cpf.cpf_valido' => 'CPF Inválido;',
        'telefone_residencial.required' => 'O campo Telefone Residencial é obrigatório;',
        'telefone_residencial.regex' 
        => 'O campo Telefone Residencial deve obedecer ao padrão (xx)xxxx-xxxx;',
        'telefone_celular.required' => 'O campo Telefone Celular é obrigatório;',
        'rg.required' => 'O campo RG é obrigatório;',
        'rg.alpha_num' => 'O campo RG deve conter apenas letras ou números;',
        'rg_org_exp.required' => 'O campo RG Org. Exp é obrigatório;',
        'rg_org_exp.alpha_num' 
        => 'O campo RG Org. Exp deve conter apenas letras ou números;',
        'rg_uf.required' => 'O campo RG-UF é obrigatório;',
        'rg_data_expedicao.required' => 'O campo RG Data de Expedição é obrigatório;',
        'rg_data_expedicao.date_format' 
        => 'O campo RG Data de Expedição deve obedecer ao padrão dd/mm/aaaa;',
        'estado.required' => 'O campo Estado é obrigatório;',
        'cidade.required' => 'O campo Cidade é obrigatório;',
        'cep.required' => 'O campo CEP é obrigatório;',
        'cep.regex' => 'O campo CEP deve obedecer ao padrão xxxxx-xxx',
        'bairro.required' => 'O campo Bairro é obrigatório',
        'tipo_logradouro.required' => 'O campo Tipo de Logradouro é obrigatório;',
        'logradouro.required' => 'O campo Logradouro é obrigatório;',
        'numero.required' => 'O campo Número é obrigatório;',
        'numero.alpha_num' => 'O campo Número deve conter apenas letras ou número;',
        'email.required' => 'O campo E-mail é obrigatório;',
        'email.email' => 'O campo E-mail deve receber um e-mail válido;',
        
    ];
}
}
