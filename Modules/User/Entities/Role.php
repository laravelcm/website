<?php

namespace Modules\User\Entities;

use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole implements AuditableContract
{
    use Auditable;

    /**
     * Attributes to exclude from the Audit.
     *
     * @var array
     */
    protected $auditExclude = [
        'id',
    ];

    /**
     * @return mixed
     */
    public function isAdmin()
    {
        return $this->name === config('access.users.admin_role');
    }
}
