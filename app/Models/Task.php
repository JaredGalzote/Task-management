<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'due_date',
        'status',
        'user_id'
        
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    protected $dates = ['due_date'];

    public function __construct(array $attributes = [])
    {
        $this->due_date = now();

        parent::__construct($attributes);
    }
}
