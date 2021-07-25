<?php

    namespace App\Models;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use App\Models\admin\role;
    use App\Models\admin\permission;
    use App\Permissions\HasPermissionsTrait;
    class Admin extends Authenticatable
    {
        use Notifiable,HasPermissionsTrait;

        protected $guard = 'admin';

        protected $fillable = [
            'name', 'email', 'password','role_id',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
        
        public function roles()
        {
            return $this->belongsToMany(role::class,'admin_roles');
        }

        public function permissions()
        {
            return $this->belongsToMany(permission::class,'admins_permissions');
        }
    }