<?php

declare(strict_types=1);

namespace Modules\Base\Filament\Resources\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Support\Filament\Resources\Pages\Concerns\ResourceFinder;

class BaseCreateRecord extends CreateRecord
{
    use ResourceFinder;
}
