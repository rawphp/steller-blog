Feature: Register
  As a new user
  In order to create a blog
  I need to be able to register for an account

  Background:
    Given I reset the database

  Scenario: Register
    Given I am testing laravel
    And I am on the homepage
    When I follow "Register"
    And I fill in "name" with "Tom"
    And I fill in "email" with "admin@example.com"
    And I fill in "password" with "password"
    And I fill in "password-confirm" with "password"
    And I press "Register"
    Then the url should match "/blogs"

