<?php

namespace App\Filament\Resources\BookResource\Pages;

use App\Filament\Resources\BookResource;
use App\Imports\BooksImport;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Columns\TextColumn;
use Maatwebsite\Excel\Facades\Excel;

class ListBooks extends ListRecords
{
    protected static string $resource = BookResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Action::make('Import books')
                ->modalSubheading('Make sure you started your queue worker!')
                ->action(function (array $data): void {
                    Excel::queueImport(new BooksImport(), public_path('storage\\' . $data['file']));
                    Notification::make()
                        ->title('Import job has started!')
                        ->success()
                        ->send();
                })
                ->form([
                    FileUpload::make('file')->acceptedFileTypes(['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'])
                ])
        ];
    }
}
