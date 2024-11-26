<?php

use App\Models\User;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Tests\TestCase;

/**
 * Defines application features from the specific context.
 */
class ProfileContext extends TestCase implements Context
{
    private $user;
    private $response;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        putenv('APP_ENV=testing');
        $this->setUp();
        $this->withoutExceptionHandling();
    }

    /**
     * @BeforeScenario
     */
    public function before()
    {
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');
        $this->user = User::factory()->create();
    }

    /**
     * @Given I am logged in
     */
    public function iAmLoggedIn(): void
    {
        $this->actingAs($this->user);
    }

    /**
     * @When I visit the profile page
     */
    public function iVisitTheProfilePage(): void
    {
        $this->response = $this->get('/profile');
    }

    /**
     * @Then I should see the update profile information form
     */
    public function iShouldSeeTheUpdateProfileInformationForm(): void
    {
        $this->response
            ->assertOk()
            ->assertSeeVolt('profile.update-profile-information-form');
    }

    /**
     * @Then I should see the update password form
     */
    public function iShouldSeeTheUpdatePasswordForm(): void
    {
        $this->response
            ->assertOk()
            ->assertSeeVolt('profile.update-password-form');
    }

    /**
     * @Then I should see the delete user form
     */
    public function iShouldSeeTheDeleteUserForm(): void
    {
        $this->response
            ->assertOk()
            ->assertSeeVolt('profile.delete-user-form');
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
