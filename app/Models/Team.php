<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $categories_has_academies_categories_id
 * @property integer $categories_has_academies_academies_id
 * @property string $name
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property CoachesHasTeam[] $coachesHasTeams
 * @property AthletesHasTeam[] $athletesHasTeams
 */
class Team extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function coachesHasTeams()
    {
        return $this->hasMany('App\Models\CoachesHasTeam', 'teams_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function athletesHasTeams()
    {
        return $this->hasMany('App\Models\AthletesHasTeam', 'teams_id');
    }
}
