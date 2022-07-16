<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

   protected $fillable=['name',
                        'secondtask'
                    ];
  /** 
     * public id, public user_id, pulbic name
     * Get the user that owns the task.
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
