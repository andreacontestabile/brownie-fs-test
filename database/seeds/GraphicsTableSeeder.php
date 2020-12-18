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
                "image_path" => Storage::url("images/aztec.png")
            ],
            [
                "name" => "Budgie",
                "image_path" => Storage::url("images/budgie.png")
            ],
            [
                "name" => "Death",
                "image_path" => Storage::url("images/Death.png")
            ],
            [
                "name" => "Dragon",
                "image_path" => Storage::url("images/dragon.png")
            ],
            [
                "name" => "Elysium",
                "image_path" => Storage::url("images/elysium.png")
            ],
            [
                "name" => "Pirate",
                "image_path" => Storage::url("images/pirate.png")
            ],
            [
                "name" => "Wolf",
                "image_path" => Storage::url("images/wolf.png")
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
