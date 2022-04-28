<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
      'published',
      'title',
      'slug',
      'parent_id',
      'created_by',
      'modified_by',
    ];

    public function setSlugAttribute($value) {
      $this->attributes['slug'] = Str::slug(mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }

    // получение вложенных категорий
    public function children() {
      return $this->hasMany(self::class, 'parent_id');
    }

    // обратная полиморфная связь со статьями
    public function articles() {
      return $this->morphedByMany(Article::class, 'categoryable');
    }

    // получение определенного количества последних созданных категорий
    public function scopeLastCategories($query, $count) {
      return $this->orderBy('created_at', 'desc')->take($count)->get();
    }
}
