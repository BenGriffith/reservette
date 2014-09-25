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
		$this->call('RoomTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
    {
        DB::table('users')->delete();

        $user = new User();
        $user->first_name = 'Omar';
        $user->last_name = 'Quimbaya';
        $user->email = 'omar@codeup.com';
        $user->role = '1';
        $user->password = 'omar.password123';
        $user->save();

        $user = new User();
        $user->first_name = 'Ben';
        $user->last_name = 'Griffith';
        $user->email = 'ben@codeup.com';
        $user->role = '1';
        $user->password = 'boomGoestheDynamite123!';
        $user->save();
    }

}

class RoomTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
    {
        DB::table('rooms')->delete();

        $room = new Room();
        $room->name = 'Berners Lee';
        $room->sq_ft = '250';
        $room->max_capacity = '12';
        $room->has_AV = '1';
        $room->has_table = '1';
        $room->has_projector = '1';
        $room->privacy = 'closed';
        $room->floor = '11';
        $room->save();

        $room = new Room();
        $room->name = 'Linklider';
        $room->sq_ft = '325';
        $room->max_capacity = '15';
        $room->has_AV = '1';
        $room->has_table = '1';
        $room->has_projector = '1';
        $room->privacy = 'closed';
        $room->floor = '11';
        $room->save();

        $room = new Room();
        $room->name = 'Metcalfe';
        $room->sq_ft = '150';
        $room->max_capacity = '7';
        $room->has_AV = '1';
        $room->has_table = '1';
        $room->has_projector = '1';
        $room->privacy = 'closed';
        $room->floor = '10';
        $room->save();

        $room = new Room();
        $room->name = 'Tomlinson';
        $room->sq_ft = '175';
        $room->max_capacity = '8';
        $room->has_AV = '0';
        $room->has_table = '1';
        $room->has_projector = '0';
        $room->privacy = 'closed';
        $room->floor = '10';
        $room->save();

        $room = new Room();
        $room->name = 'Library';
        $room->sq_ft = '250';
        $room->max_capacity = '10';
        $room->has_AV = '0';
        $room->has_table = '1';
        $room->has_projector = '0';
        $room->privacy = 'half';
        $room->floor = '11';
        $room->save();

        $room = new Room();
        $room->name = 'Lindner';
        $room->sq_ft = '200';
        $room->max_capacity = '9';
        $room->has_AV = '0';
        $room->has_table = '1';
        $room->has_projector = '1';
        $room->privacy = 'closed';
        $room->floor = '10';
        $room->save();
    }

}
