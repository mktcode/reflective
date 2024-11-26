<?php

use App\Models\User;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Tests\TestCase;

/**
 * Defines application features from the specific context.
 */
class ProfileContext extends TestCase implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->setUp();
        $this->withoutExceptionHandling();
    }

    /**
     * @BeforeScenario
     */
    public function before()
    {
        $this->artisan('migrate:fresh');
    }

    /**
     * @Given I am logged in
     */
    public function iAmLoggedIn(): void
    {
        $this->actingAs(User::factory()->create());
    }

    /**
     * @When I visit the profile page
     */
    public function iVisitTheProfilePage(): void
    {
        throw new PendingException();
    }

    /**
     * @Then I should see the update profile information form
     */
    public function iShouldSeeTheUpdateProfileInformationForm(): void
    {
        throw new PendingException();
    }

    /**
     * @Then I should see the update password form
     */
    public function iShouldSeeTheUpdatePasswordForm(): void
    {
        throw new PendingException();
    }

    /**
     * @Then I should see the delete user form
     */
    public function iShouldSeeTheDeleteUserForm(): void
    {
        throw new PendingException();
    }

    /**
     * @When I update my profile information
     */
    public function iUpdateMyProfileInformation(): void
    {
        throw new PendingException();
    }

    /**
     * @Then my name and email should be updated
     */
    public function myNameAndEmailShouldBeUpdated(): void
    {
        throw new PendingException();
    }

    /**
     * @Then my email should be unverified
     */
    public function myEmailShouldBeUnverified(): void
    {
        throw new PendingException();
    }

    /**
     * @When I update my profile information with the same email address
     */
    public function iUpdateMyProfileInformationWithTheSameEmailAddress(): void
    {
        throw new PendingException();
    }

    /**
     * @Then my email should remain verified
     */
    public function myEmailShouldRemainVerified(): void
    {
        throw new PendingException();
    }

    /**
     * @When I delete my account
     */
    public function iDeleteMyAccount(): void
    {
        throw new PendingException();
    }

    /**
     * @Then I should be logged out
     */
    public function iShouldBeLoggedOut(): void
    {
        throw new PendingException();
    }

    /**
     * @Then my account should be deleted
     */
    public function myAccountShouldBeDeleted(): void
    {
        throw new PendingException();
    }

    /**
     * @When I delete my account with the wrong password
     */
    public function iDeleteMyAccountWithTheWrongPassword(): void
    {
        throw new PendingException();
    }

    /**
     * @Then I should see an error
     */
    public function iShouldSeeAnError(): void
    {
        throw new PendingException();
    }

    /**
     * @Then my account should not be deleted
     */
    public function myAccountShouldNotBeDeleted(): void
    {
        throw new PendingException();
    }
}
