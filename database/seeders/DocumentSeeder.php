<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $document = Document::create(
            [
                'name' => 'test name',
                'content' => 'test content',
            ]
        );

        $document->users()->attach(1);
        $document->users()->attach(2);
        $document->users()->attach(3);

        Document::create(
            [
                'name' => 'test name 2',
                'content' => 'test content 2',
            ]
        );
    }
}
