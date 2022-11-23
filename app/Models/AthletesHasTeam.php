<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $athletes_id
 * @property integer $athletes_users_id
 * @property integer $athletes_academies_id
 * @property integer $teams_id
 * @property Team $team
 */
class AthletesHasTeam extends Model
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
