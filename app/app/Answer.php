<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Answer
 * @package App
 */
class Answer extends Model
{
    /**
     * @return HasOne
     */
    public function question(): HasOne
    {
        return $this->hasOne(Question::class);
    }
}
