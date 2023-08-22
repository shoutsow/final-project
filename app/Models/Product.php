<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'slug',
        'content',
        'image',
        'price',
        'new',
        'hit',
        'sale',
    ];

    /**
     * Связь «товар принадлежит» таблицы `products` с таблицей `categories`
     */
    public function category() {
        return $this->belongsTo(Category::class);
    }

    /**
     * Связь «товар принадлежит» таблицы `products` с таблицей `brands`
     */
    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Связь «многие ко многим» таблицы `products` с таблицей `baskets`
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function baskets() {
        return $this->belongsToMany(Basket::class)->withPivot('quantity');
    }

    /**
     * Позволяет выбирать товары категории и всех ее потомков
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param integer $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCategoryProducts($builder, $id) {
        $descendants = Category::getAllChildren($id);
        $descendants[] = $id;
        return $builder->whereIn('category_id', $descendants);
    }

    /**
     * Позволяет фильтровать товары по нескольким условиям
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param \App\Helpers\ProductFilter $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterProducts($builder, $filters) {
        return $filters->apply($builder);
    }
}
