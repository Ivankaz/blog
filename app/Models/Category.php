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
}
