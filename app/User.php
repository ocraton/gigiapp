<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', '
        password',
        'ragione_sociale',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function role()
    {
        return $this->hasOne('App\Role', 'id', 'role_id');
    }

    public function hasRole($roles)
    {
        $this->have_role = $this->getUserRole();

        // Check if the user is a root account
        if($this->have_role->name == 'Root') {
            return true;
        }

        if(is_array($roles)){
            foreach($roles as $need_role){
                if($this->checkIfUserHasRole($need_role)) {
                    return true;
                }
            }
        } else{
            return $this->checkIfUserHasRole($roles);
        }
        return false;
    }

    private function getUserRole()
    {
        return $this->role()->getResults();
    }

    private function checkIfUserHasRole($need_role)
    {
        return (strtolower(trim($need_role))==strtolower(trim($this->have_role->name))) ? true : false;
    }

    /**
     * This mutator automatically hashes the password.
     *
     * @var string
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Hash::make($value);
    }

    public function risposte()
    {
        return $this->hasMany('App\Risposte');
    }
}
