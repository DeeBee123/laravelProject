<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    public $fillable = ['task_name', 'task_description', 'status_id', 'add_date', 'completed_date'];

    public function status(){
        return $this->belongsTo('App\Models\Status');
    }
}
