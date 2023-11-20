<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Torneo
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $categoria_id
 * @property $genero_id
 * @property $departamento_id
 * @property $rango_horas
 * @property $fecha_inicio
 * @property $fecha_fin
 * @property $estado_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @property Departamento $departamento
 * @property Estado $estado
 * @property Genero $genero
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Torneo extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'descripcion' => 'required',
		'categoria_id' => 'required',
		'genero_id' => 'required',
		'departamento_id' => 'required',
		'rango_horas' => 'required',
		'fecha_inicio' => 'required',
		'fecha_fin' => 'required',
		'estado_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion','categoria_id','genero_id','departamento_id','rango_horas','fecha_inicio','fecha_fin','estado_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'categoria_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function departamento()
    {
        return $this->hasOne('App\Models\Departamento', 'id', 'departamento_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estado()
    {
        return $this->hasOne('App\Models\Estado', 'id', 'estado_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function genero()
    {
        return $this->hasOne('App\Models\Genero', 'id', 'genero_id');
    }
    

}
