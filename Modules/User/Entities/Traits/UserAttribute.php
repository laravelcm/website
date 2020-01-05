<?php

namespace Modules\User\Entities\Traits;

use Illuminate\Support\Facades\Hash;

trait UserAttribute
{
    /**
     * @param $password
     */
    public function setPasswordAttribute($password) : void
    {
        // If password was accidentally passed in already hashed, try not to double hash it
        if (
            (\strlen($password) === 60 && preg_match('/^\$2y\$/', $password)) ||
            (\strlen($password) === 95 && preg_match('/^\$argon2i\$/', $password))
        ) {
            $hash = $password;
        } else {
            $hash = Hash::make($password);
        }

        // Note: Password Histories are logged from the \App\Observer\User\UserObserver class
        $this->attributes['password'] = $hash;
    }

    /**
     * @return string
     */
    public function getRolesLabelAttribute()
    {
        $roles = $this->getRoleNames()->toArray();

        if (\count($roles)) {
            return implode(', ', array_map(function ($item) {
                return ucwords($item);
            }, $roles));
        }

        return 'N/A';
    }

    /**
     * @return string
     */
    public function getPermissionsLabelAttribute()
    {
        $permissions = $this->getDirectPermissions()->toArray();

        if (\count($permissions)) {
            return implode(', ', array_map(function ($item) {
                return ucwords($item['name']);
            }, $permissions));
        }

        return 'N/A';
    }

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->last_name
            ? $this->first_name.' '.$this->last_name
            : $this->first_name;
    }

    /**
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->full_name;
    }

    /**
     * @return mixed
     */
    public function getPictureAttribute()
    {
        return $this->getPicture();
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute()
    {
        return '<a href="' . route('admin.auth.user.delete-permanently', $this) . '"name="confirm_item" class="btn btn-danger">
                '. __('buttons.backend.access.users.delete_permanently') . '
                </a>';
    }

    /**
     * @return string
     */
    public function getRestoreButtonAttribute()
    {
        return '<a href="' . route('admin.auth.user.restore', $this) . '" name="confirm_item" class="btn btn-info">
                ' . __('buttons.backend.access.users.restore_user') . '
                </a> ';
    }


    /**
     * Clear Session Button
     *
     * @return string
     */
    public function getClearSessionButtonAttribute()
    {
        return '<a href="' . route('admin.auth.user.clear-session', $this) . '"
			 	 data-trans-button-cancel="' . __('buttons.general.cancel') . '"
                 data-trans-button-confirm="' . __('buttons.general.continue') . '"
                 data-trans-title="' . __('strings.backend.general.are_you_sure') . '"
                 class="dropdown-item" name="confirm_item">' . __('buttons.backend.access.users.clear_session') . '</a> ';
    }

    /**
     * Impersonate Button
     *
     * @return string
     */
    public function getLoginAsButtonAttribute()
    {
        // If the admin is currently NOT spoofing a user
        if (! session()->has('admin_user_id') || ! session()->has('temp_user_id')) {
            //Won't break, but don't let them "Login As" themselves
            return '<a href="' . route('admin.auth.user.login-as', $this ) . '" class="kt-nav__link">
                        <i class="kt-nav__link-icon flaticon2-user-1"></i>
                        <span class="kt-nav__link-text">
                            ' . __('buttons.backend.access.users.login_as', ['user' => e($this->first_name)]) . '
                        </span>
                   </a> ';
        }

        return '';
    }

    /**
     * Display Status Button
     *
     * @return string
     */
    public function getStatusButtonAttribute()
    {
        switch ($this->active) {
            case 0:
                return '<a href="' . route('admin.auth.user.mark', [$this, 1]) . '" class="kt-nav__link">
                            <i class="kt-nav__link-icon flaticon2-user-1"></i>
                            <span class="kt-nav__link-text">
                                ' . __('buttons.backend.access.users.activate') . '
                            </span>
                       </a>';

            case 1:
                return '<a href="' . route('admin.auth.user.mark', [$this, 0]) . '" class="kt-nav__link">
                            <i class="kt-nav__link-icon flaticon2-user-1"></i>
                            <span class="kt-nav__link-text">
                                ' . __('buttons.backend.access.users.deactivate') . '
                            </span>
                        </a>';

            default:
                return '';
        }
    }

    /**
     * Display Confirm Button
     *
     * @return string
     */
    public function getConfirmedButtonAttribute()
    {
        if (! $this->isConfirmed() && ! config('access.users.requires_approval')) {
            return '<a href="' . route('admin.auth.user.account.confirm.resend', $this) . '" class="kt-nav__link">
                        <i class="kt-nav__link-icon flaticon2-user-1"></i>
                        <span class="kt-nav__link-text">
                            ' . __('buttons.backend.access.users.resend_email') . '
                        </span>
                    </a>';
        }

        return '';
    }

    /**
     * Display Show Button
     *
     * @return mixed
     */
    public function getShowButtonAttribute()
    {
        return '<a href="' . route('admin.auth.user.show', $this). '" class="kt-nav__link">
                    <i class="kt-nav__link-icon flaticon2-user-1"></i>
                    <span class="kt-nav__link-text">
                        ' . __('buttons.general.crud.view') . '
                    </span>
                </a>';
    }

    /**
     * Display Edit Button
     *
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="' . route('admin.auth.user.edit', $this) . '" class="kt-nav__link">
                    <i class="kt-nav__link-icon flaticon2-user-1"></i>
                    <span class="kt-nav__link-text">
                        ' . __('buttons.general.crud.edit') . '
                    </span>
               </a>';
    }

    /**
     * Change User Password
     *
     * @return string
     */
    public function getChangePasswordButtonAttribute()
    {
        return '<a href="' . route('admin.auth.user.change-password', $this) . '" class="kt-nav__link">
                    <i class="kt-nav__link-icon flaticon2-user-1"></i>
                    <span class="kt-nav__link-text">
                        ' . __('buttons.backend.access.users.change_password') . '
                    </span>
               </a>';
    }
}
