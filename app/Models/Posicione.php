<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Posicione
 *
 * @property $id
 * @property $posicion
 * @property $created_at
 * @property $updated_at
 *
 * @property Jugadore[] $jugadores
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Posicione extends Model
{
    
    static $rules = [
		'posicion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['posicion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jugadores()
    {
        return $this->hasMany('App\Models\Jugadore', 'posicion_id', 'id');
    }
    

}
