<?php

namespace App\Models;

use App\ValueObjects\TaskType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    public $timestamps = false;

    protected $fillable = [
        'time',
        'difficulty',
        'title',
        'type',
    ];

    public function getTime()
    {
        return $this->time;
    }

    public function getDifficulty()
    {
        return $this->difficulty;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function scopeOfType($query, TaskType $taskType)
    {
        return $query->where('type', $taskType->getValue());
    }
}
