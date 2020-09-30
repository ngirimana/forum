<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Channel;
class ChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
            'name'=>'Event',
            'slug'=>Str::slug('Event')
        ]);
        Channel::create([
            'name'=>'Training',
            'slug'=>Str::slug('Training')
        ]);
    }
}
