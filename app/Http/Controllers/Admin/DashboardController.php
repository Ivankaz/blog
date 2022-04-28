<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class DashboardController extends Controller
{
    //Dashboard
    public function dashboard() {
      return view('admin.dashboard', [
        'categories' => Category::lastCategories(5),
      ]);
    }
}
