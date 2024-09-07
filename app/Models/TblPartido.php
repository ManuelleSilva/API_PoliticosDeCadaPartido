<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblPartido extends Model
{
    use HasFactory;

    protected $table = 'tblpartido';
    protected $primaryKey = 'idpartido';
    public $incrementing = true; 
 
    protected $fillable = [
        'nomepartido',
        'siglapartido',
        'dataFundacao',
    ];

    public function politicos()
    {
        return $this->hasMany(TblPolitico::class, 'idpartidofk', 'idpartido');
    }
}

