<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Category;

class CategoryParent implements ValidationRule
{
    private $category;

    public function __construct(Category $category) {
        $this->category = $category;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$this->category->validParent($value)){
            $fail('validation.custom.parent_id.invalid')->translate();
        }
    }
}
