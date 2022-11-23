<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $id
 * @property integer $users_id
 * @property integer $academies_id
 * @property string $name
 * @property string $date_of_birth
 * @property string $blood_type
 * @property string $gender
 * @property string $photo
 * @property string $alias
 * @property string $created_at
 * @property string $updated_at
 * @property Academy $academy
 * @property User $user
 */
class Athlete extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'date_of_birth', 'blood_type', 'photo' ,'gender', 'alias', 'created_at', 'updated_at'];

    /**
     * @return BelongsTo
     */
    public function academy()
    {
        return $this->belongsTo('App\Models\Academy', 'academies_id');
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users_id');
    }
}
