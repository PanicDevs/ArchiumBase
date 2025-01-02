<?php

declare(strict_types=1);

namespace Modules\Base\Http\Controllers\V1\BaseAPIController;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Modules\Support\Traits\V1\ApiResponse\ApiResponse;

class BaseAPIController extends Controller
{
    use ApiResponse;
    use AuthorizesRequests;
    use ValidatesRequests;
}
