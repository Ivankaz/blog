<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // вывожу страницу категории и статьи
    public function category($slug) {
        $category = Category::where('slug', $slug)->first();

        return view('blog.category', [
            'category' => $category,
            'articles' => $category->articles()->where('published', 1)->paginate(10),
        ]);
    }

    // вывожу страницу статьи
    public function article($slug) {
        $article = Article::where('slug', $slug)->first();

        return view('blog.article', [
            'article' => $article,
        ]);
    }
}
