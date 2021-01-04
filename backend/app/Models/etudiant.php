<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\Passport;
use Laravel\Passport\HasApiTokens;

class etudiant extends Model
{
    use HasFactory, HasApiTokens;

		protected $fillable = [
		    'nom',
            'prenom',
            'email',
            'password'
        ];
    /**
     * @var mixed
     */
    private $nom;
    /**
     * @var mixed
     */
    private $prenom;
    /**
     * @var mixed
     */
    private $email;
    /**
     * @var mixed
     */
    private $password;
}
