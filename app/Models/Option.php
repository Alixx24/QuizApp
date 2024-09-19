<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = ['question_id', 'option_text', 'is_correct'];
    public function question()
    {
        return $this->belongsTo(Option::class);
    }

    public function tag()
    {
        return $this->morphOne('App\Models\Tag', 'taggable');
    }
}
