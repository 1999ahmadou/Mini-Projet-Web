<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'id_course',
    ];

    public $incrementing = false;

    public function questions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Question::class);
    }
    /**
     * @var mixed
     */
    private $id;
    /**
     * @var mixed
     */
    private $title;
    /**
     * @var mixed
     */
    private $id_course;
}
