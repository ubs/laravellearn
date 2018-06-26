<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskComment extends Model
{
    protected $guarded = ['id'];
    
    public function task() {
        return $this->belongsTo(Task::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
        //return $this->belongsTo(User::class, 'comment_owner_id');
    }
}
