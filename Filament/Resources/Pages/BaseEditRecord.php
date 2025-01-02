<?php

declare(strict_types=1);

namespace Modules\Base\Filament\Resources\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Modules\Support\Filament\Resources\Pages\Concerns\ResourceFinder;

class BaseEditRecord extends EditRecord
{
    use ResourceFinder;

    /**
     * @inheritDoc
     */
    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
