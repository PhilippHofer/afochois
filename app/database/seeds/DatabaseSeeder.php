<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->call('UserTableSeeder');
        $this->command->info('User table seeded!');

        $this->call('GroupTableSeeder');
        $this->command->info('Group table seeded!');

        $this->call('WordTableSeeder');
        $this->command->info('Word table seeded!');

        $this->call('UserGroupTableSeeder');
        $this->command->info('User-Group relations seeded!');
	}

}
