<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $pool_size
 * @property string $phone
 * @property string $email
 * @property string $logo
 * @property string $address
 * @property string $created_at
 * @property string $updated_at
 * @property Coach[] $coaches
 * @property Category[] $categories
 * @property Athlete[] $athletes
 * @property User[] $users
 */
class Academy extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'pool_size', 'phone', 'email', 'logo', 'address', 'created_at', 'updated_at'];

    /**
     * @return HasMany
     */
    public function coaches()
    {
        return $this->hasMany('App\Models\Coach', 'academies_id');
    }

    /**
     * @return BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'categories_has_academies', 'academies_id', 'categories_id');
    }

    /**
     * @return HasMany
     */
    public function athletes()
    {
        return $this->hasMany('App\Models\Athlete', 'academies_id');
    }

    /**
     * @return HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User', 'academies_id');
    }
}
