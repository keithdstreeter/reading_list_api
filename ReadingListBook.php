<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReadingListBook extends Model
{
    /**
     * Attributes that can be mass assigned
     *
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'author', 'comments', 'priority'];

    /**
     * A book is belongs to a user
     *
     * @return Illuminate\Database\Eloquent\Relations\Relation
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    
}
