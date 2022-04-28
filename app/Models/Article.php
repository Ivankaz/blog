<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
      'published',
      'title',
      'slug',
      'description_short',
      'description',
      'image',
      'image_show',
      'meta_title',
      'meta_description',
      'meta_keywords',
      'views',
      'created_by',
      'modified_by',
    ];

    public function setSlugAttribute($value) {
      $this->attributes['slug'] = Str::slug(mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }

    // полиморфная связь с категориями
    public function categories() {
      return $this->morphToMany(Category::class, 'categoryable');
    }

    // получение определенного количества последних созданных статей
    public function scopeLastArticles($query, $count) {
      return $this->orderBy('created_at', 'desc')->take($count)->get();
    }
}
