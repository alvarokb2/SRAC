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

    /**
     * @param
     * @response : Reservas[]
     * devuelve las reservas del usuario
     */
    public function reservas(){
        return $this->hasMany('SRAC\Reserva');
    }

    /**
     * @param $name : string, $email : string, $password : string
     * @response : User
     * devuelve un usuario con los parametros indicados
     */

    public static function createUser($name, $email, $password){
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;

        return $user;
    }

    /**
     * @param
     * @response : void
     * elimina el usuario
     */
    public function deleteUser(){
        $this->reservas()->delete();
        return parent::delete();
    }

    /**
     * @param
     * @response : bool
     * true si el usuario puede reservar
     */
    public function available(){
        return !($this->isSanctioned(5) or $this->hasPending());
    }

    /**
     * @param
     * @response : int
     * numero de dias visibles para el usuario
     */
    public function visibleDays(){
        switch($this->role){
            case 'cliente':
                return 3;
            break;
            case 'socio':
                return 6;
            break;
            default:
                return 10;
            break;
        }
    }

    public function getStatus(){
        if($this->isSanctioned(5)){
            return 2;
        }
        elseif($this->hasPending()){
            return 1;
        }
        else{
            return 0;
        }

    }

    /**
     * @param $days : int
     * @response : bool
     * true si el usuario esta tiene reservas perdidas en $days dias anteriores
     */
    public function isSanctioned($days){
        $this->setLosses();
        $reservas = $this->reservas()->where('fecha_fin', '<=', date('d m Y H:i:s'))
            ->where('fecha_inicio', '>' , date('d m Y H:i:s', time()- (86400*$days)))
            ->where('estado', '=' , 'perdida')->count();
        return $reservas > 0;
    }

    /**
     * @param $fecha : date
     * @response : void
     * modifica las reservas con estado pendiente anteriores a $fecha
     */
    public function setLosses($fecha = null ){
        if($fecha == null) {
            $fecha = date('d m Y H:i:s');
        }
        $reservas = $this->reservas()->where('fecha_inicio' , '<' , $fecha);
        foreach($reservas as $reserva){
            if($reserva->estado == 'pendiente'){
                $reserva->estado = 'perdida';
                $reserva->save();
            }
        }
    }

    /**
     * @param
     * @response : bool
     * true si el usuario tiene reservas pendientes
     */
    public function hasPending(){
        $reservas = $this->reservas()->where('estado' , '=', 'pendiente')
            ->count();
        return $reservas > 0;
    }
}
