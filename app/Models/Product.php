<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'image',
        'category_id',
        'publisher',
        'publish_year'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Tambahkan relasi komentar
    public function comments()
    {
        return $this->hasMany(Comment::class)->where('is_approved', true)->latest();
    }

    // Semua komentar (termasuk yang belum approve)
    public function allComments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    // Rata-rata rating
    public function averageRating()
    {
        return $this->comments()->avg('rating') ?? 0;
    }

    // Total komentar
    public function totalComments()
    {
        return $this->comments()->count();
    }
}