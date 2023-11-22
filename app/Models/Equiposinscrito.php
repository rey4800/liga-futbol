<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Equiposinscrito
 *
 * @property $id
 * @property $torneo_id
 * @property $equipo_id
 * @property $partidos_ganados
 * @property $partidos_empatados
 * @property $partidos_perdidos
 * @property $goles_favor
 * @property $goles_contra
 * @property $diferencia
 * @property $puntos
 * @property $created_at
 * @property $updated_at
 *
 * @property Equipo $equipo
 * @property Torneo $torneo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Equiposinscrito extends Model
{
    
    static $rules = [
		'torneo_id' => 'required',
        'equipo_id' => 'required|unique:equiposinscritos,equipo_id',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['torneo_id','equipo_id','partidos_ganados','partidos_empatados','partidos_perdidos','goles_favor','goles_contra','diferencia','puntos'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function equipo()
    {
        return $this->hasOne('App\Models\Equipo', 'id', 'equipo_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function torneo()
    {
        return $this->hasOne('App\Models\Torneo', 'id', 'torneo_id');
    }
    

}
