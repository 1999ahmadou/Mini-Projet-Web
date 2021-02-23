<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswers extends Model
{
    use HasFactory;

    protected $fillable = [
        'userAnswer'
        ];

    protected $hidden = ['created_at', 'updated_at'];
    protected $primaryKey = 'id';
    /**
     * @var mixed
     */
    private $userAnswer;

}
