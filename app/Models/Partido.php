<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Partido
 *
 * @property $id
 * @property $torneo_id
 * @property $titular
 * @property $direccion
 * @property $equipo_local_id
 * @property $equipo_visitante_id
 * @property $fecha
 * @property $hora
 * @property $estado_id
 * @property $goles_local
 * @property $goles_visitante
 * @property $created_at
 * @property $updated_at
 *
 * @property Equipo $equipo
 * @property Equipo $equipo
 * @property Estado $estado
 * @property Torneo $torneo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Partido extends Model
{
    
    static $rules = [
		'torneo_id' => 'required',
		'titular' => 'required',
		'direccion' => 'required',
		'equipo_local_id' => 'required',
		'equipo_visitante_id' => 'required',
		'fecha' => 'required',
		'hora' => 'required',
		'estado_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['torneo_id','titular','direccion','equipo_local_id','equipo_visitante_id','fecha','hora','estado_id','goles_local','goles_visitante'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function equipo1()
    {
        return $this->hasOne('App\Models\Equipo', 'id', 'equipo_local_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function equipo2()
    {
        return $this->hasOne('App\Models\Equipo', 'id', 'equipo_visitante_id');
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
    public function torneo()
    {
        return $this->hasOne('App\Models\Torneo', 'id', 'torneo_id');
    }
    

}
