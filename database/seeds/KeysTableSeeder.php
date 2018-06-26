<?php

use App\Models\Key;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class KeysTableSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        foreach ([1,2,3,4,5] as $counter){
            $key = new Key();
            $key->user_id = 1;
            $key->user_key = Str::random();
            $key->expiry_date = Carbon::now()->addWeek(random_int(1, 5));
            $key->saveOrFail();
        }
    }
}
