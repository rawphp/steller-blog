Feature: Create a new blog
  As a registered user
  In order to make posts
  I need to be able to create a blog

  Background:
    Given I reset the database
    And "admin" user exists

  Scenario: Create blog
    Given I am testing laravel
    And I am on the homepage
    And I follow "Login"
    And I fill in "email" with "admin@example.com"
    And I fill in "password" with "password"
    And I press "Login"
    When I follow "Blogs"
    And I follow "Create Blog"
    Then the url should match "/blogs/create"
    When I fill in "name" with "Test Blog"
    And I press "Create Blog"
    Then I should see "Test Blog"
