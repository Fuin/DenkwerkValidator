<?php


class ValidateCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    /**
     * @param AcceptanceTester $I
     * @param \Codeception\Example $example
     * @dataprovider pageProvider
     */
    public function testMarkup(AcceptanceTester $I, \Codeception\Example $example)
    {

        $I->amOnPage($example['url']);
        $I->validateMarkup();
    }

    protected function pageProvider()
    {
        $content = file_get_contents('.\tests\_data\url.php');
        $array = unserialize($content);
        return $array;
    }

}
