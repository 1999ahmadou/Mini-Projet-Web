<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'grade',
        'email',
    ];
    /**
     * @var mixed
     */
    private $name;
    /**
     * @var mixed
     */
    private $grade;
    /**
     * @var mixed
     */
    private $email;

}
