<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Answer
 * @property mixed answer
 * @package App
 * @method static create(array $input)
 * @method static where(string $string, \Ramsey\Uuid\Uuid $user_id)
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
