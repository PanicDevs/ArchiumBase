<?php

declare(strict_types=1);

namespace Modules\Base\Entities\V1;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Support\Traits\V1\HasFieldsEnum\HasFieldsEnum;

class BaseAuthenticatableModel extends Authenticatable
{
    use HasFieldsEnum;
    use Notifiable;
}
