<?php

namespace App\Imports;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class BooksImport implements ToModel, WithChunkReading, ShouldQueue
{
    /**
     * @param array $row
     *
     * @return Model|Book|null
     */
    public function model(array $row): Model|Book|null
    {
        $slug = Str::slug($row[0]);

        return new Book([
            'title' => $row[0],
            'slug' => $slug,
            'author' => $row[1],
            'category_id' => Category::query()->firstOrCreate([
                'title' => $row[3],
                'slug' => Str::slug($row[3])
            ])->getKey(),
            'description' => '',
            'cover' => "https://picsum.photos/seed/{$slug}/200/300"
        ]);
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
