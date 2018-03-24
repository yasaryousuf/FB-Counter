<?php

use Illuminate\Database\Seeder;
use App\Adpage;

class AdpageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adPage = new Adpage();
        $adPage->user_id = 2;
        $adPage->media = 'facebook';
        $adPage->advertise_name = 'Yasar Yousuf Official';
        $adPage->advertise_name_slug = 'yasar-yousuf-official';
        $adPage->advertise_id = '1397701093818068';
        $adPage->type = 'page';
        $adPage->save();
    }
}
