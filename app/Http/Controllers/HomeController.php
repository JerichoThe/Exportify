<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
   {
      $adminId = 1; // Replace with the ID of the specific user you want to fetch posts from
      $news = Post::with('author')->where('user_id', $adminId)->paginate(4)->withQueryString();
      return view('home', [
         "title" => "Home",
         'active' => 'home',
         'news' => $news
      ]);
   }
}
