<?php

namespace App\Models;

use App\Models\Admin\QuizCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['question_text','category_id', 'tag_id'];
    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function category() {
        return $this->belongsTo(QuizCategory::class);
    }
    public function tag()
    {
        return $this->morphOne('App\Models\Tag', 'taggable');
    }
}
