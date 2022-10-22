<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'username',
        'email',
        'password',
        'status',
        'dni',
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
    ];

    /**
     * * filter by keyword
     * @param keyword
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterByKeyword($query, $keyword)
    {
        if (!empty($keyword)) {
            return $query->whereRaw('concat(name," ",last_name," ",username," ",email) like ?', "%$keyword%");
        }

    }
    /**
     * * filter by role
     * @param role
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterByRole($query, $role)
    {
        if (!empty($role)) {
            return $query->whereHas("roles", function ($query) use ($role) {
                $query->whereName($role);
            });
        }
    }

    public function setPasswordAttribute($value)
    {

        $this->attributes['password'] = bcrypt($value);

    }

}
