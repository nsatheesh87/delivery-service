<?php

use Illuminate\Database\Seeder;

class PigeonTableSeeder extends Seeder
{
    /**
     * @var array
     */
    protected $data = [
        [
            'name'     => 'Antonio',
            'speed'    => 70,
            'range'    => 600,
            'cost'     => 2,
            'downtime' => 2
        ],
        [
            'name'     => 'Bonito',
            'speed'    => 80,
            'range'    => 500,
            'cost'     => 2,
            'downtime' => 3
        ],
        [
            'name'     => 'Carillo',
            'speed'    => 65,
            'range'    => 1000,
            'cost'     => 2,
            'downtime' => 3
        ],
        [
            'name'     => 'Alejandro',
            'speed'    => 70,
            'range'    => 800,
            'cost'     => 2,
            'downtime' => 2
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        foreach ($this->data as $dKey => $datum) {
            DB::table('pigeons')->insert($datum);
        }

    }
}
