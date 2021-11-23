<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\FrontMatter\Data\SymfonyYamlFrontMatterParser;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post extends Model
{
    use HasFactory;

    protected $guarded = []; //never perform mass assignments

    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters){
      $query->when($filters['search'] ?? false, fn($query, $search) =>
      $query->where(fn($query)=>
          $query->where('title', 'like', '%' . $search . '%')
          ->orWhere('title', 'like', '%' . $search . '%')
        )
        );

          $query->when($filters['author'] ?? false, fn($query, $author) =>
          $query->whereHas('author', fn($query) =>
              $query->where('username', $author)
            )
          );

    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author() //author?
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(){
      return $this->hasMany(Comment::class);
    }


}
