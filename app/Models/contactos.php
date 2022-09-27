<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contactos extends Model
{

    protected $fillable = [

        'connombre' ,
        'contelefono' ,
        'condireccion' ,
        'concorreo' ,
        'conatendio' ,
        'conestado' ,
        'confecha' ,
        'connota' ,
        'confecultimocont' ,
    
    ];

    protected $table = 'contactos';
    protected $primaryKey = 'con_id';
    public $timestamps = false;
}