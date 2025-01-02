<?php

declare(strict_types=1);

namespace Modules\Base\Filament\Resources\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\Support\Filament\Resources\Pages\Concerns\ResourceFinder;

class BaseListRecords extends ListRecords
{
    use ResourceFinder;

    /**
     * @inheritDoc
     */
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
