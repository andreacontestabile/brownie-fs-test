<?php

use App\BlankShirt;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class BlankShirtsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blank_shirts = [
            [
                "name" => "White",
                "image_path" => Storage::url("images/blank_shirts/white-t-shirt-template.png")
            ],
            [
                "name" => "Black",
                "image_path" => Storage::url("images/blank_shirts/black-t-shirt-template.png")
            ],
            [
                "name" => "Blue",
                "image_path" => Storage::url("images/blank_shirts/blue-t-shirt-template.png")
            ],
            [
                "name" => "Green",
                "image_path" => Storage::url("images/blank_shirts/green-t-shirt-template.png")
            ],
            [
                "name" => "Red",
                "image_path" => Storage::url("images/blank_shirts/red-t-shirt-template.png")
            ]
        ];

        foreach ($blank_shirts as $blank_shirt) {
            $newBlankShirt = new BlankShirt;
            $newBlankShirt->name = $blank_shirt["name"];
            $newBlankShirt->image_path = $blank_shirt["image_path"];
            $newBlankShirt->save();
        }


    }
}
