<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Связь «один ко многим» таблицы `categories` с таблицей `products`
     */
    public function products() {
        return $this->hasMany(Product::class);
    }

    /**
     * Возвращает список корневых категорий каталога товаров
     */
//    public static function roots() {
//        return self::where('parent_id', 0)->get();
//    }

    /**
     * Связь «один ко многим» таблицы `categories` с таблицей `categories`
     */
    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * Возвращает список корневых категорий каталога товаров
     *
     */
//    public static function roots() {
//        return self::where('parent_id', 0)->get();
//    }

    /**
     * Возвращает список корневых категорий каталога товаров
     */
    public static function roots() {
        return self::where('parent_id', 0)->with('children')->get();
    }
}
