<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'task_desc'
    ];
    
    //public static function store(Request $request) {
    public static function store() {
        $newTask = new self();
        $newTask->user_id = auth()->user()->id;
        $newTask->title = request('title');
        $newTask->task_desc = request('description');
        
        return ($newTask->saveOrFail()) ? $newTask : null;
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function taskComments() {
        return $this->hasMany(TaskComment::class);
    }
    
    public function addComment($comment){
        /**
        TaskComment::create([
            'task_id' => $this->id,
            'comment_owner_id' => 1,
            'comment' => $comment
        ]);
        **/
        
        //Alternatively, based on the hasMany relationship above, we can do this
        $this->taskComments()->create([
            'comment_owner_id' => auth()->user()->id ?? 1,
            'comment' => $comment
        ]);
    }
    
    public static function getTaskArchives(){
        return self::selectRaw(
            'year(created_at) as year_created,
            month(created_at) as month_number_created,
            monthname(created_at) as month_name_created,
            count(*) as total_per_month')
            ->groupBy('year_created', 'month_number_created', 'month_name_created')
            ->orderBy('month_number_created', 'DESC')
            ->get();
    }
}
