Feature: Authentication
  In order to gain access to the site management area
  As an admin
  I need to be able to login and logout
  Scenario: Logging in
    Given I am on "/"
    Then I should see "Login"