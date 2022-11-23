<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $users_id
 * @property integer $academies_id
 * @property string $date_of_birth
 * @property string $blood_type
 * @property string $gender
 * @property string $created_at
 * @property string $updated_at
 * @property Academy $academy
 * @property User $user
 */
class Coach extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['date_of_birth', 'blood_type', 'gender', 'created_at', 'updated_at'];

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
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users_id');
    }
}
