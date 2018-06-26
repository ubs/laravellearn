<?php

use Illuminate\Database\Seeder;
use App\Models\Appsetting;

class AppsettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['DEFAULT_TIME_OUT' => '60', 'FORCE_HTTPS_ALL' => 'FALSE'] as $setting => $value){
            $appSetting = new Appsetting();
            $appSetting->setting = $setting;
            $appSetting->value = $value;
            $appSetting->saveOrFail();
        }
    }
}
