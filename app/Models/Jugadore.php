<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Jugadore
 *
 * @property $id
 * @property $nombre
 * @property $apellido
 * @property $edad
 * @property $genero_id
 * @property $dni
 * @property $equipo_id
 * @property $posicion_id
 * @property $numero_jugador
 * @property $telefono
 * @property $direccion
 * @property $imagen
 * @property $nombre_responsable
 * @property $dni_responsable
 * @property $created_at
 * @property $updated_at
 *
 * @property Equipo $equipo
 * @property Genero $genero
 * @property Posicione $posicione
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Jugadore extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'apellido' => 'required',
		'edad' => 'required',
		'genero_id' => 'required',
		'dni' => 'required',
		'equipo_id' => 'required',
		'posicion_id' => 'required',
		'numero_jugador' => 'required',
		'telefono' => 'required',
		'direccion' => 'required',
		'imagen' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','apellido','edad','genero_id','dni','equipo_id','posicion_id','numero_jugador','telefono','direccion','imagen','nombre_responsable','dni_responsable'];


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
    public function genero()
    {
        return $this->hasOne('App\Models\Genero', 'id', 'genero_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function posicione()
    {
        return $this->hasOne('App\Models\Posicione', 'id', 'posicion_id');
    }
    

}
