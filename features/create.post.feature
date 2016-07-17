Feature: Create a new post
  As a registered user
  In order to have posts
  I need to be able to create a post

  Background:
    Given I reset the database
    And "admin" user exists
    And I am testing laravel
    And I am on the homepage
    And I follow "Login"
    And I fill in "email" with "admin@example.com"
    And I fill in "password" with "password"
    And I press "Login"

  Scenario: Create a post
    Given the following blogs exist:
      | name      | owner |
      | Test Blog | 1     |
    And I am on "/blogs/1"
    And the url should match "/blogs/1"
    And I follow "create-post-link"
    And I fill in "title" with "Test Post"
    And I fill in "body" with "Test post body. What's next?"
    And I press "Publish Post"
    Then I should see "Test Post"
    And I should see "Test post body. What's next?"
    And I should see "This post has no comments"
    And I should see "Leave a Comment"

