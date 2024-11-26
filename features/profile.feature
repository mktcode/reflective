Feature: Profile
    As a user
    I want to update my profile information
    So that I can keep my account details up to date

    Scenario: Profile page is displayed
        Given I am logged in
        When I visit the profile page
        Then I should see the update profile information form
        And I should see the update password form
        And I should see the delete user form

    Scenario: Profile information can be updated
        Given I am logged in
        When I update my profile information
        Then my name and email should be updated
        And my email should be unverified

    Scenario: Email verification status is unchanged when the email address is unchanged
        Given I am logged in
        When I update my profile information with the same email address
        Then my email should remain verified

    Scenario: User can delete their account
        Given I am logged in
        When I delete my account
        Then I should be logged out
        And my account should be deleted

    Scenario: Correct password must be provided to delete account
        Given I am logged in
        When I delete my account with the wrong password
        Then I should see an error
        And my account should not be deleted
