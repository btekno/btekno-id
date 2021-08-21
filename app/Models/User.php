<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

use App\Jobs\VerifyEmailQueue;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
        'last_ip', 
        'last_active', 
        'api_token', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'plain',
        'remember_token',
        'api_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Generate UUID automatically
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Uuid::uuid1()->toString();
        });
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        VerifyEmailQueue::dispatch($this);
    }
}
