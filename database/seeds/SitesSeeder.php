<?php

use App\Site;
use Illuminate\Database\Seeder;

class SitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $site = [
            [
                'name'              => 'PVJ',
                'code'              => 'pvj',
                'note'              => 'bandung',
            ],
            [
                'name'              => 'TUNJANGAN',
                'code'              => 'tp',
                'note'              => 'medan',
            ],

        ];
        foreach($site as $key => $value){
            Site::create($value);
        }
    }
}
