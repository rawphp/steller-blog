<?php

use Illuminate\Database\Seeder;
use Steller\Blog\Blog\Model\Post;

/**
 * Class PostTableSeeder
 */
class PostTableSeeder extends Seeder
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

        while ($i < 500) {
            $blog           = new Post();
            $blog->title    = $this->faker->name;
            $blog->owner_id = $this->faker->numberBetween(1, 5);
            $blog->blog_id  = $this->faker->numberBetween(1, 20);
            $blog->body     = $this->faker->paragraphs(15, true);

            $blog->save();
            $i++;
        }
    }
}
