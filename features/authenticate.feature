Feature: Login and logout
  As a registered user
  In order to make posts
  I need to be able to login and logout

  Background:
    Given I reset the database
    And "admin" user exists

  Scenario: Homepage
    Given I am on the homepage
    Then I should see "Steller Blogs"

  Scenario: Login and logout
    Given I am testing laravel
    And I am on the homepage
    When I follow "Login"
    And I fill in "email" with "admin@example.com"
    And I fill in "password" with "password"
    And I press "Login"
    Then the url should match "/blogs"
    When I follow "account-link"
    And I follow "logout-link"
    Then the url should match "/"
