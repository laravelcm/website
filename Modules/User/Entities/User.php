<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\User\Entities\Traits\SendUserPasswordReset;
use Modules\User\Entities\Traits\UserAttribute;
use Modules\User\Entities\Traits\UserMethod;
use Modules\User\Entities\Traits\UserRelationship;
use Modules\User\Entities\Traits\UserScope;
use Modules\User\Entities\Traits\Uuid;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableInterface;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements AuditableInterface
{
    use Auditable,
        HasRoles,
        Notifiable,
        SendUserPasswordReset,
        SoftDeletes,
        Uuid,
        UserAttribute,
        UserMethod,
        UserRelationship,
        UserScope;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'avatar_type',
        'avatar_location',
        'password',
        'password_changed_at',
        'active',
        'confirmation_code',
        'confirmed',
        'timezone',
        'last_login_at',
        'last_login_ip',
        'to_be_logged_out',
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
     * Attributes to exclude from the Audit.
     *
     * @var array
     */
    protected $auditExclude = [
        'id',
        'password',
        'remember_token',
        'confirmation_code',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
        'confirmed' => 'boolean',
        'to_be_logged_out' => 'boolean',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'last_login_at',
        'password_changed_at',
    ];

    /**
     * The dynamic attributes from mutators that should be returned with the user object.
     * @var array
     */
    protected $appends = [
        'full_name',
        'picture',
        'roles_label',
        'login_as_button',
        'status_button',
        'show_button',
        'edit_button',
        'change_password_button',
    ];
}
