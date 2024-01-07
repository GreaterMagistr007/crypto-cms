<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Текущий авторизованный пользователь в системе
    private static User|null $current = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * @return integer
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdminData(): ?Admin
    {
        if ($this->adminData === null) {
            $this->adminData = Admin::getAdminUserByUserId($this->id);
        }

        return $this->adminData;
    }

    public function resetAdminAuthData()
    {
        $this->getAdminData()?->resetAdminAuthData();
    }

    /**
     * Текущий авторизованный пользователь в системе
     * @return static|null
     */
    public static function getCurrentUser(): self|null
    {
        if (!self::$current) {
            self::$current = Auth::user();
        }

        return self::$current;
    }

    public static function setCurrentUser($user)
    {
        self::$current = $user;
    }
}
