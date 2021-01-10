<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'content',
        'id_questionnaire',
    ];

    public $incrementing = false;

    public function questionnaire(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Questionnaire::class,'id_questionnaire');
    }

    public function propositions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Proposition::class);
    }

    /**
     * @var mixed
     */
    private $id;
    /**
     * @var mixed
     */
    private $content;
    /**
     * @var mixed
     */
    private $id_questionnaire;
}
