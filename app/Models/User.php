<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// ==========================================
// ACARA 19 - POIN 4a: SOFT DELETES
// ==========================================
use Illuminate\Database\Eloquent\SoftDeletes;

// Import Model untuk Relasi (Poin 2)
use App\Models\Profile;
use App\Models\Post;
use App\Models\Role;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    // ==========================================
    // ACARA 19 - POIN 5: MASS ASSIGNMENT PROTECTION
    // ==========================================
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // ==========================================
    // ACARA 19 - POIN 4a: PROPERTI $dates
    // ==========================================
    protected $dates = ['deleted_at'];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // ==========================================
    // ACARA 19 - POIN 2: RELASI ANTAR MODEL
    // ==========================================
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    // ==========================================
    // ACARA 19 - POIN 3: MUTATORS & ACCESSORS
    // ==========================================
    protected function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getFullNameAttribute(): string
    {
        return ($this->first_name ?? '') . ' ' . ($this->last_name ?? '');
    }

    // ==========================================
    // ACARA 19 - POIN 6: QUERY SCOPES
    // ==========================================
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}