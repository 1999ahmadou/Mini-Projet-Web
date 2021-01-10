<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposition extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'value',
        'id_question',
    ];

    public $incrementing = false;

    public function questions(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Question::class,'id_question');
    }

    /**
     * @var mixed
     */
    private $id_question;
    /**
     * @var mixed
     */
    private $value;
    /**
     * @var mixed
     */
    private $id;
}
