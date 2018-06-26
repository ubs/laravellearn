<?php
namespace Tests\Features\Bootstrap;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\MinkExtension\Context\MinkContext;
use App\Utils\Calculator;

use PHPUnit\Framework\Assert as PHPUnit;
use Behat\Mink\Exception\ResponseTextException;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements SnippetAcceptingContext
{
    
    /**
     * Private calculator variable
     * @var Calculator
     */
    private $calculator;
    
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
     * @Given the method :sum receives the numbers :arg1 and :arg2
     */
    public function theMethodReceivesTheNumbersAnd($sum, $arg1, $arg2)
    {
        $this->calculator = new Calculator();
        $this->calculator->$sum($arg1, $arg2);
    }

    /**
     * @Then it should output the calculated value of :result
     */
    public function itShouldOutputTheCalculatedValueOf($result)
    {
        PHPUnit::assertEquals($result, $this->calculator->getResult());
    }


    /**
     * @Then I can do something with Laravel
     */
    public function iCanDoSomethingWithLaravel()
    {
        #echo app()->environmentFile();
        PHPUnit::assertEquals('.env.behat', app()->environmentFile());
        PHPUnit::assertEquals('testenv', strtolower(env('APP_ENV')));
        PHPUnit::assertTrue(config('app.debug'));
    }

    /**
     * @Given the method :sum receives the number :arg2
     */
    public function theMethodReceivesTheNumber($sum, $arg2)
    {
        $this->calculator = new Calculator();
        $this->calculator->$sum($arg2);
    }


    /**
     * @Then when I pass the number :arg2 to :arg1
     */
    public function whenIPassTheNumberTo($sum, $arg2)
    {
        $this->calculator->$sum($arg2);
    }

    /**
     * @Then when I pass the numbers :arg2 and :arg3 and :arg4 and :arg5 and :arg6 to :sum
     */
    public function whenIPassTheNumbersAndAndAndAndTo($sum, $arg2, $arg3, $arg4, $arg5, $arg6)
    {
        $this->calculator->$sum($arg2)->$sum($arg3)->$sum($arg4)->$sum($arg5)->$sum($arg6);
    }

    /**
     * @Then page should contain the URL :pattern
     */
    public function pageShouldContainTheUrl($pattern)
    {
        $pattern = sprintf('/%s/ui', $pattern);
        $currentActiveSession = $this->getSession();
        $actualPageHTML = $currentActiveSession->getPage()->getHtml();
        //var_dump($actualPageHTML);
        
        $message = sprintf('The URL pattern "%s" was not found anywhere in the HTML response of the current page.', $pattern);

        $condition = (bool) preg_match($pattern, $actualPageHTML);

        if ($condition) { return;}
        throw new ResponseTextException($message, $currentActiveSession->getDriver());

        //For the three lines above, I could simply use the one-liner below, except I can't change the message returned
        //$this->assertSession()->responseMatches($pattern);
    }
}
