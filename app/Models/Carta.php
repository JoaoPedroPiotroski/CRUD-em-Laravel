<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function get_name($id) {

    }
    public $rules = [
        'name' => 'required|min:1|max:20',
        'class' => 'required|min:1|max:20',
        'desc' => 'required|min:1|max:100',
        'arquivo' => 'required'
    ];
    public $rulesalt = [
        'name' => 'required|min:1|max:20',
        'class' => 'required|min:1|max:20',
        'desc' => 'required|min:1|max:100'
    ];

    public $messages = [
        'nome.required' => 'O campo nome é obrigatório',
        'nome.min' => 'O campo nome deve ter no mínimo 1 caractere',
        'nome.max' => 'O campo nome deve ter no máximo 20 caracteres',
        'desc.required' => 'O campo descrição é obrigatório',
        'desc.min' => 'O campo descrição deve ter no mínimo 1 caractere',
        'desc.max' => 'O campo nome deve ter no máximo 100 caracteres',
        'class.required' => 'O campo class é obrigatório',
        'class.min' => 'O campo class deve ter no mínimo 1 caractere',
        'class.max' => 'O campo class deve ter no máximo 20 caracteres',
        'arquivo:required' => 'O campo arquivo é obrigatório'
        ];
}
