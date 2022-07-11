<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        // if( isset($filters['search']) ? $filters['search'] : false ) {
        //     return $query->where('title', 'like', '%' . $filters['search'] . '%')
        //           ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        // }

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('body', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use($category) {
                $query->where('slug', $category);
            });
        });

        // $query->when($filters['author'] ?? false, function($query, $author) {
        //     return $query->whereHas('author', function($query) use($author) {
        //         $query->where('author', $author);
        //     });
        // });

        $query->when($filters['user'] ?? false, fn($query, $user) =>
            $query->whereHas('user', fn($query) => 
                $query->where('username', $user)
            )
        );
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
