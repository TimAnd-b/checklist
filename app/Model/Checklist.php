<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $table = 'checklists';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title',
    ];

    public function user() {
        return $this->belongsTo('App\Model\User', 'foreign_key');
    }

    public function list_items(){
        return $this->hasMany("App\Model\ListItem");
    }
}
