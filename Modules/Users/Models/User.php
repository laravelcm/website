<?php

namespace TypiCMS\Modules\Users\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laracasts\Presenter\PresentableTrait;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Traits\HasRoles;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\History\Traits\Historable;
use TypiCMS\Modules\Users\Notifications\ResetPassword;
use TypiCMS\Modules\Users\Presenters\ModulePresenter;

class User extends Base implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable;
    use Authorizable;
    use CanResetPassword;
    use HasRoles;
    use Historable;
    use Notifiable;
    use PresentableTrait;

    protected $presenter = ModulePresenter::class;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'activated',
        'superuser',
        'api_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'preferences' => 'array',
    ];

    /**
     * Get front office uri.
     *
     * @param string $locale
     *
     * @return string
     */
    public function uri($locale = null)
    {
        return '/';
    }

    /**
     * Confirm the user.
     *
     * @return null
     */
    public function activate()
    {
        $this->activated = true;
        $this->token = null;
        $this->save();
    }

    /**
     * Boot the model.
     *
     * @return null
     */
    public static function boot()
    {
        parent::boot();
        static::creating(function ($user) {
            $user->token = Str::random(30);
            $user->api_token = Str::uuid();
        });
    }

    /**
     * Check if the user is a superuser.
     *
     * @return bool
     */
    public function isSuperUser()
    {
        return (bool) $this->superuser;
    }

    /**
     * Sync roles.
     *
     * @param array $permissions
     *
     * @return null
     */
    public function syncRoles(array $roles)
    {
        $permissionIds = [];
        foreach ($permissions as $name) {
            $permissionIds[] = app(Permission::class)->firstOrCreate(['name' => $name])->id;
        }
        $this->permissions()->sync($permissionIds);
    }

    /**
     * Sync permissions.
     *
     * @param array $permissions
     *
     * @return null
     */
    public function syncPermissions(array $permissions)
    {
        $permissionIds = [];
        foreach ($permissions as $name) {
            $permissionIds[] = app(Permission::class)->firstOrCreate(['name' => $name])->id;
        }
        $this->permissions()->sync($permissionIds);
    }

    /**
     * Get the user full name.
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->last_name. ' '. $this->first_name;
    }

    /**
     * Send the password reset notification.
     *
     * @param string $token
     *
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
}
