<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'course_image',
        'cover_image',
        'prof_id',
        ];
    /**
     * @var mixed
     */
    private $title;
    /**
     * @var mixed
     */
    private $description;
    /**
     * @var mixed
     */
    private $document;
    /**
     * @var mixed|string
     */
    private $cover_image;
    /**
     * @var mixed|string
     */
    private $course_image;
    /**
     * @var mixed
     */
    private $prof_id;
}
