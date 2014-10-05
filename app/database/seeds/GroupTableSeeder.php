<?php
use english\Group;

class GroupTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('groups')->delete();
        Group::create(array(
            'name' => 'Megacities'
        ));
        Group::create(array(
            'name' => 'House, mouse ...'
        ));
        Group::create(array(
            'name' => 'Last year'
        ));

	}

}
