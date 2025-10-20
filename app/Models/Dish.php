<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $table = 'dish';

    protected $fillable = [
        // все поля, которые нужно заполнять массово
        'category_id',
        'name',
        'preparation_method',
        'preparation_time',
        'user_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'dish_ingredient')
        ->withPivot('quantity');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
