<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $categories_id
 * @property integer $academies_id
 * @property Academy $academy
 * @property Category $category
 */
class CategoriesHasAcademy extends Model
{
    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function academy()
    {
        return $this->belongsTo('App\Models\Academy', 'academies_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'categories_id');
    }
}
