<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->delete();

        User::create(array(
            'username' => 'Tobias Aigner',
            'password' => Hash::make('englisch')
        ));
        User::create(array(
            'username' => 'Lukas Bindreiter',
            'password' => Hash::make('admin'),
            'admin' => true
        ));
        User::create(array(
            'username' => 'Michael Hader',
            'password' => Hash::make('englisch')
        ));
        User::create(array(
            'username' => 'David Haunschmied',
            'password' => Hash::make('englisch')
        ));
        User::create(array(
            'username' => 'Philipp Hofer',
            'password' => Hash::make('admin'),
            'admin' => true
        ));
        User::create(array(
            'username' => 'Leo Jungmann',
            'password' => Hash::make('englisch')
        ));
        User::create(array(
            'username' => 'Felix Kastner',
            'password' => Hash::make('englisch')
        ));
        User::create(array(
            'username' => 'Martin Klinger',
            'password' => Hash::make('englisch')
        ));
        User::create(array(
            'username' => 'Daniel Lettner',
            'password' => Hash::make('englisch')
        ));
        User::create(array(
            'username' => 'Hannes Lumetzberger',
            'password' => Hash::make('englisch')
        ));
        User::create(array(
            'username' => 'Georg Mühlbachler',
            'password' => Hash::make('englisch')
        ));
        User::create(array(
            'username' => 'Philipp Neuhauser',
            'password' => Hash::make('englisch')
        ));
        User::create(array(
            'username' => 'Mathias Praher',
            'password' => Hash::make('englisch')
        ));
        User::create(array(
            'username' => 'David Raffetseder',
            'password' => Hash::make('englisch')
        ));
        User::create(array(
            'username' => 'Florian Schlöglhofer',
            'password' => Hash::make('englisch')
        ));
        User::create(array(
            'username' => 'Julian Schulner',
            'password' => Hash::make('englisch')
        ));
        User::create(array(
            'username' => 'Patrick Weiß',
            'password' => Hash::make('englisch')
        ));
	}

}
