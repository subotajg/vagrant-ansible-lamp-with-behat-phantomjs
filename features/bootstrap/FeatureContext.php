<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\MinkExtension\Context\MinkContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
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
    }




    /**
     * @Then menu contains only :arg1 and :arg2
     */
    public function menuContainsOnlyAnd($arg1, $arg2)
    {
        //$this->
    }

    /**
     * All staff have password "12345"
     * @Given I am logged in as :username
     */
    public function iAmLoggedInAs($username)
    {
        $this->visitPath('/auth/login');
        $this->fillField('StaffUsername', $username);
        $this->fillField('StaffPassword', '12345');
        $this->pressButton('Sign in');
    }

    /**
     * @When I play with datepicker
     */
    public function iPlayWithDatepicker()
    {
        $this->getSession()->getPage()->find('css','#datepick')->click();
        $this->getSession()->getPage()->find('css','.ui-datepicker-year')->setValue('2017');
        $this->getSession()->getPage()->clickLink('14');

        //throw new PendingException();
    }



}
