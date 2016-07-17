<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use Steller\Blog\Blog\Model\Blog;
use Steller\Blog\Blog\Model\Post;
use Steller\Blog\User;
use PHPUnit_Framework_Assert as PHPUnit;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{
    /** @var  User */
    protected $user;

    /**
     * Initializes context.
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given /^I am testing laravel$/
     */
    public function iAmTestingLaravel()
    {
        PHPUnit::assertEquals('.env.behat', app()->environmentFile());
    }

    /**
     * @Given /^"([^"]*)" user exists$/
     */
    public function userExists($username)
    {
        $this->user = User::create(
            [
                'name' => $username,
                'email' => $username . '@example.com',
                'password' => bcrypt('password'),
            ]
        );

        $this->user->save();
    }

    /**
     * @Given /^I reset the database$/
     */
    public function iResetTheDatabase()
    {
        Artisan::call('migrate:refresh');
    }

    /**
     * @Given /^the following blogs exist:$/
     */
    public function theFollowingBlogsExist(TableNode $table)
    {
        foreach ($table->getHash() as $data) {
            $blog = Blog::create(
                [
                    'name' => $data['name'],
                    'owner_id' => $data['owner'],
                ]
            );

            $blog->save();
        }
    }

    /**
     * @Given /^The following posts exist:$/
     */
    public function theFollowingPostsExist(TableNode $table)
    {
        foreach ($table->getHash() as $data) {
            $post = Post::create(
                [
                    'title' => $data['title'],
                    'body' => $data['body'],
                    'blog_id' => $data['blog'],
                    'owner_id' => $data['author'],
                ]
            );

            $post->save();
        }
    }
}
