<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory;
    use Notifiable;

    const GENDER_MEN = 1;
    const GENDER_WOMEN = 2;

    const ROLE_USER = 0;
    const ROLE_ADMIN = 1;

    public $table = 'users';
    public $guarded = false;

    static function getGenders() {
        return [
            self::GENDER_MEN => 'Men',
            self::GENDER_WOMEN => 'Women',
        ];
    }

    static function getRoles() {
        return [
            self::ROLE_USER => 'User',
            self::ROLE_ADMIN => 'Admin',
        ];
    }

    public function getGenderAsTextAttribute() {
        if ($this->gender) {
            return self::getGenders()[$this->gender];
        }
        else {
            return null;
        }
    }

    public function getRoleAsTextAttribute() {
        return self::getRoles()[$this->role];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'surname',
        'patronymic',
        'gender',
        'address',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
