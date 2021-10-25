<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['user_id', 'category_id', 'title', 'slug', 'desc', 'content', 'image'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function uploadImage(Request $request, $img = null)
    {
        if ($img) {
            Storage::delete($img);
        }
        $folder = date('Y-m-d');
        return $request->file('image')->store($folder);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImage()
    {
        if ($this->image) {
            return asset("uploads/{$this->image}");
        }
        return null;
    }

    public function getCatName($catId)
    {
        $category = Category::find($catId);
        return $category->title;
    }
}
