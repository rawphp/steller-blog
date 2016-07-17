<?php

use Illuminate\Database\Seeder;
use Steller\Blog\User;

/**
 * Class UsersTableSeeder
 */
class UsersTableSeeder extends Seeder
{
    /** @var  Faker\Generator */
    protected $faker;

    /**
     * UsersTableSeeder constructor.
     */
    public function __construct()
    {
        $this->faker = Faker\Factory::create();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 0;

        while ($i < 5) {
            $user                 = new User();
            $user->name           = $this->faker->name;
            $user->email          = $this->faker->safeEmail;
            $user->is_admin       = $this->faker->boolean(25);
            $user->password       = bcrypt('password');
            $user->remember_token = str_random(10);

            $user->save();
            $i++;
        }
    }
}
