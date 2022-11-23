<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $coaches_id
 * @property integer $coaches_users_id
 * @property integer $coaches_academies_id
 * @property integer $teams_id
 * @property Team $team
 */
class CoachesHasTeam extends Model
{
    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo('App\Models\Team', 'teams_id');
    }
}
