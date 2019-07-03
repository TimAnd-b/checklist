<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ListItem extends Model
{
    protected $table = 'list_items';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'checklist_id', 'body', 'done',
    ];


    public function checklists() {
        return  $this->belongsTo('App\Model\Checklists');
    }

    public function change_done($request) {
        if ((int)$request->done == 0)
            $this->done = true ;
        else
            $this->done = false;
        return $this->save();
    }


}
