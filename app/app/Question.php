<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Question
 * @package App
 */
class Question extends Model
{
    /**
     * @return HasOne
     */
    public function parent(): HasOne
    {
        return $this->hasOne(Question::class,'id','parent_id');
    }

    public function child()
    {
        return $this->hasMany(Question::class,'parent_id','id');
    }
}
