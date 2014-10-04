<?php

class UserGroupTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('user_group')->delete();

        $lukas = User::where('username', '=', 'Lukas Bindreiter')->firstOrFail();
        $philipp = User::where('username', '=', 'Philipp Hofer')->firstOrFail();

        $megacities = Group::where('name', '=', 'Megacities')->firstOrFail()->id;
        $house = Group::where('name', '=', 'House, mouse ...')->firstOrFail()->id;
        $ly = Group::where('name', '=', 'Last year')->firstOrFail()->id;

        $lukas->groups()->sync(array($megacities, $house));
        $philipp->groups()->sync(array($megacities, $ly));


	}

}
