<?php

namespace App\Models\admin;

 

    

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class Author extends Authenticatable
    {
        use Notifiable;

        protected $guard = 'author';

        protected $fillable = [
            'name', 'email', 'password',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
    }