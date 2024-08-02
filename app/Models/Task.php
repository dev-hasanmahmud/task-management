<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TaskNotification;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'due_date', 'status', 'user_id', 'category_id'];
    
    protected static function booted()
    {
        static::created(function ($task) {
            Notification::send($task->user, new TaskNotification($task));
        });

        static::updated(function ($task) {
            if ($task->wasChanged('status')) {
                Notification::send($task->user, new TaskNotification($task));
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
