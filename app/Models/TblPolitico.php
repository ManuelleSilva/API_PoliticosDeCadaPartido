<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblPolitico extends Model
{
    use HasFactory;

    protected $table = 'tblpolitico';
    protected $primaryKey = 'idpolitico'; 
    public $incrementing = true;
    protected $keyType = 'int'; 

    protected $fillable = [
        'nomepolitico',
        'cargopolitico',
        'idpartidofk',
    ];

    public function partido()
    {
        return $this->belongsTo(TblPartido::class, 'idpartidofk', 'idpartido');
    }
}
