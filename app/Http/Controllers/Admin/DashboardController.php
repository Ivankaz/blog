<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;

class DashboardController extends Controller
{
    //Dashboard
    public function dashboard() {
      return view('admin.dashboard', [
        'categories' => Category::lastCategories(5),
        'articles' => Article::lastArticles(5),
        'countCategories' => Category::count(),
        'countArticles' => Article::count(),
      ]);
    }
}
