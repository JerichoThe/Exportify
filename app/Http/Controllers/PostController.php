<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $adsCount = Ads::count();
        
        if ($adsCount > 0) {
            // Jika ada, ambil post_id dari entri acak
            $RandomPostId = Ads::all()->random()->post_id;
        } else {
            // Jika tidak ada, berikan nilai default atau lakukan tindakan lain sesuai kebutuhan aplikasi Anda
            $RandomPostId = null; // Nilai default jika tidak ada entri tersedia
        }

        $title = '';

        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('community', [
            "title" => "All Posts" . $title,
            "name" => "Posts",
            "active" => 'community',
            "random" => $RandomPostId - 1,
            "ads" => Post::all(),
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(12)->withQueryString()

        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "Post",
            "active" => 'community',
            "post" => $post
        ]);
    }
}
