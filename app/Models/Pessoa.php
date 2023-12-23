<?php

namespace Models;
use Core\Model;

class Pessoa extends Model{
    protected $table = 'pessoas';
    protected $columns =    ['id',
                            'nome',
                            'telefone',
                            'cpf',
                            'rg',
                            'rg_expedidor',
                            'email'];
    protected $__protected_delete = true;
    protected $__audit_date = true;
}

