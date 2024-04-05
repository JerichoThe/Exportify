<?php

namespace App\Models;

class Post
{
    private static $blog_posts = [
        [
            "title" => "Minyak Kelapa",
            "slug" => "minyak-kelapa",
            "type" => "export",
            "desc" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Non beatae odit deleniti dolorem perspiciatis ut placeat debitis, dolore reprehenderit architecto rerum a molestiae voluptas cumque nesciunt fugiat nulla eos tempora."
        ],
        [
            "title" => "Nikel",
            "slug" => "nikel",
            "type" => "import",
            "desc" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Non beatae odit deleniti dolorem perspiciatis ut placeat debitis, dolore reprehenderit architecto rerum a molestiae voluptas cumque nesciunt fugiat nulla eos tempora."
        ],
        [
            "title" => "Batu bara",
            "slug" => "batu-bara",
            "type" => "export",
            "desc" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Non beatae odit deleniti dolorem perspiciatis ut placeat debitis, dolore reprehenderit architecto rerum a molestiae voluptas cumque nesciunt fugiat nulla eos tempora."
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $post = static::all()->firstWhere("slug", $slug);

        return $post;
    }
}
