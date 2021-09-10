<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Administrator extends Authenticatable
    {
        use HasFactory;
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $table = 'admisnistrator';
        protected $fillable = [
            'username',
            'password',
            'first_name',
            'last_name',
            'last_login'
        ];

        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
            'password', 'remember_token',
        ];
    }
