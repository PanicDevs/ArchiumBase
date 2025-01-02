<?php

declare(strict_types=1);

namespace Modules\Base\Filament\Resources\Pages;

use Filament\Resources\Pages\ViewRecord;
use Modules\Support\Filament\Resources\Pages\Concerns\ResourceFinder;

class BaseViewRecord extends ViewRecord
{
    use ResourceFinder;
}
