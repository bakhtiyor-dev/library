<?php

namespace App\Filament\Resources\StaffResource\Pages;

use App\Filament\Resources\StaffResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateStaff extends CreateRecord
{
    protected static string $resource = StaffResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $staff = static::getModel()::create($data);
        $staff->assignRole('staff');
        return $staff;
    }

}
