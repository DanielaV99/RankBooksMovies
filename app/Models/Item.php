<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'isApproved',
        'user_id',
        'category_id',
        'genre_id',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function userReviews()
    {
        return $this->belongsToMany(Item::class, 'user_reviews')
            ->withPivot('rank', 'comment');
    }
}
