<?php

use Illuminate\Database\Seeder;
use Steller\Blog\Blog\Model\Blog;

/**
 * Class BlogTableSeeder
 */
class BlogTableSeeder extends Seeder
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
     */
    public function run()
    {
        $i = 0;

        while ($i < 20) {
            $blog           = new Blog();
            $blog->name     = $this->faker->name;
            $blog->owner_id = $this->faker->numberBetween(1, 5);

            $blog->save();
            $i++;
        }
    }
}
