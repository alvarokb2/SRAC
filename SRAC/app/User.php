<?php

namespace SRAC;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function reservas(){
        return $this->hasMany('SRAC\Reserva');
    }

    public function delete(){
        foreach($this->reservas as $reserva){
            $reserva->delete();
        }
        return parent::delete();
    }

    public function getDias(){
        switch($this->role){
            case 'cliente':
                return 3;
                break;
            case 'socio':
                return 6;
                break;
            default:
                return 15;
                break;

        }

    }

    public function disponibilidad($fecha, $hora){
        $pendiente = $this->reservas()->where('estado' , 'pendiente')->count();

        if($pendiente > 0){
            $response = $this->reservas()->where('fecha', '=', $fecha)->where('hora','=', $hora)->where('estado', '=', 'pendiente')->count();
            if($response > 0){
                return 0;
            }
            else{
                return 1;
            }
        }
        else{
            return 2;
        }
    }
}
