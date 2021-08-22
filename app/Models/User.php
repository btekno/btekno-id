<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

use Rennokki\QueryCache\Traits\QueryCacheable;

use App\Jobs\VerifyEmailQueue;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    use QueryCacheable;

    public $cacheFor = 3600;
    public $cacheTags = ['users'];
    public $cachePrefix = 'users_';

    protected static $flushCacheOnUpdate = true;

    protected $fillable = [
        'uuid', 
        'image', 
        'cover', 
        'name', 
        'username', 
        'email', 
        'email_verified_at', 
        'password', 
        'plain', 
        'phone', 
        'gender', 
        'birthday', 
        'address', 
        'village', 
        'district', 
        'city', 
        'country', 
        'bio', 
        'website', 
        'facebook', 
        'twitter', 
        'instagram', 
        'linkedin', 
        'pinterest', 
        'dribbble', 
        'youtube', 
        'provider', 
        'provider_id', 
        'is_private', 
        'is_verified', 
        'is_staff', 
        'is_spam', 
        'is_suspended', 
        'notifications_email', 
        'notifications_web', 
        'status', 
        'status_emoji', 
        'timezone', 
        'dark_mode', 
        'last_ip', 
        'last_active', 
        'api_token', 
    ];

    protected $hidden = [
        'password',
        'plain',
        'remember_token',
        'api_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Uuid::uuid1()->toString();
        });
    }

    public function sendEmailVerificationNotification()
    {
        VerifyEmailQueue::dispatch($this);
    }
}
