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
            'name'=>'React Native',
            'slug'=>Str::slug('React Native')
        ]);
        Channel::create([
            'name'=>'Nodejs',
            'slug'=>Str::slug('Nodejs')
        ]);
        Channel::create([
            'name'=>'React Js',
            'slug'=>Str::slug('React Js')
        ]);
        Channel::create([
            'name'=>'Angular Js',
            'slug'=>Str::slug('Angular Js')
        ]);
    }
}
