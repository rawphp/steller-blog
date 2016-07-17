Feature: Create a new comment
  As a registered user
  In order to have comments
  I need to be able to create a comment on a post

  Background:
    Given I reset the database
    And "admin" user exists
    And I am testing laravel
    And I am on the homepage
    And I follow "Login"
    And I fill in "email" with "admin@example.com"
    And I fill in "password" with "password"
    And I press "Login"

  Scenario: Create a comment
    Given the following blogs exist:
      | name      | owner |
      | Test Blog | 1     |
    And The following posts exist:
      | title     | blog | author | body                         |
      | Test Post | 1    | 1      | Test post body. What's next? |

    And I am on "/blogs/1/posts/1"
    When I fill in "content" with "This is my comment. Deal with it!"
    And I press "Publish Comment"
    Then I should see "Test Post"
    And I should see "Test post body. What's next?"
    And I should see "This is my comment. Deal with it!"
    And I should not see "This post has no comments"
    And I should see "Leave a Comment"

