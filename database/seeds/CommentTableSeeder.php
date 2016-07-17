<?php

use Illuminate\Database\Seeder;
use Steller\Blog\Blog\Model\Comment;

/**
 * Class CommentTableSeeder
 */
class CommentTableSeeder extends Seeder
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

        while ($i < 1000) {
            $comment          = new Comment();
            $comment->user_id = $this->faker->numberBetween(1, 5);
            $comment->post_id = $this->faker->numberBetween(1, 500);
            $comment->content = $this->faker->paragraphs(15, true);

            $comment->save();
            $i++;
        }
    }
}
