<?php

declare(strict_types=1);

namespace Modules\Base\Entities\V1;

use Illuminate\Database\Eloquent\Model;
use Modules\Support\Traits\V1\HasFieldsEnum\HasFieldsEnum;

class BaseModel extends Model
{
    use HasFieldsEnum;
}
