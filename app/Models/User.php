<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function tasks(){
        return $this->hasMany(Task::class);
    }
    
    public function taskComments(){
        return $this->hasMany(TaskComment::class);
    }
    
    public function makeTask(Task $task){
        return $this->tasks()->save($task);
    }
    
    public function getFullname(){
        return $this->name;
    }
}
