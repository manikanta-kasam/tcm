<?php

use Illuminate\Database\Seeder;

class ModuleSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('public.modules')->insert([
            'name' =>'Root',
            'level'=>0,
            'parent_id'=>0
        ]);
    }
}
