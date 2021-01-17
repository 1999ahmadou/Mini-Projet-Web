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
    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $hidden = ['created_at', 'updated_at','id_course'];

    public function questions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Question::class,'id_questionnaire','id');
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
