<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    private static $blog, $image, $imageName, $directory, $imageUrl;

    private static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        if(self::$image)
        {
            self::$imageName = rand().'.'.self::$image->getClientOriginalName();
            self::$directory = 'uploads/blog-images/';
            self::$image->move(self::$directory, self::$imageName);
            self::$imageUrl = self::$directory . self::$imageName;
            return self::$imageUrl;
        }else
        {
            return '';
        }
    }

    public static function createBlog($request)
    {
        self::$blog = new Blog();
        self::$blog->category_id = $request->category_id;
        self::$blog->title           = $request->title;
        self::$blog->description    = $request->description;
        self::$blog->image          = self::getImageUrl($request);
        self::$blog->status         = $request->status;
        self::$blog->save();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
