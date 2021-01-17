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

    protected $primaryKey = 'id';
    protected $hidden = ['created_at', 'updated_at','id_questionnaire'];

    public $incrementing = false;

    public function questionnaire(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Questionnaire::class,'id_question');
    }

    public function propositions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Proposition::class,'id_question','id');
    }

    public function answer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Answer::class);
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
