<?php

use App\Graphic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class GraphicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $graphics = [
            [
                "name" => "Aztec",
                "image_path" => Storage::url("images/graphics/aztec.png")
            ],
            [
                "name" => "Budgie",
                "image_path" => Storage::url("images/graphics/budgie.png")
            ],
            [
                "name" => "Death",
                "image_path" => Storage::url("images/graphics/Death.png")
            ],
            [
                "name" => "Dragon",
                "image_path" => Storage::url("images/graphics/dragon.png")
            ],
            [
                "name" => "Elysium",
                "image_path" => Storage::url("images/graphics/elysium.png")
            ],
            [
                "name" => "Pirate",
                "image_path" => Storage::url("images/graphics/pirate.png")
            ],
            [
                "name" => "Wolf",
                "image_path" => Storage::url("images/graphics/wolf.png")
            ]
        ];

        foreach ($graphics as $graphic) {
            $newGraphic = new Graphic;
            $newGraphic->name = $graphic["name"];
            $newGraphic->image_path = $graphic["image_path"];
            $newGraphic->save();
        }
    }
}
