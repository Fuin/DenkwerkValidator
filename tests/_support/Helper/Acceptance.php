<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use Denkwerk\Crawler\SiteCrawler;
use Symfony\Component\Yaml\Yaml;

class Acceptance extends \Codeception\Module
{

    public function _beforeSuite()
    {
        //$this->copyToYml();
    }

    public function crawl()
    {
        $crawler = new SiteCrawler();

        $crawler->setURL($this->getModule('PhpBrowser')->_getConfig('url'));
        $crawler->addURLFilterRule('#.(jpg|jpeg|gif|png|js|css|phar|svg|xml)$# i');
        $crawler->addURLFilterRule('#\/(p\+|\(|\$[a-z]+)$# i');
        $crawler->addContentTypeReceiveRule('#text/html#');
        $crawler->go();

        return $crawler->urls;
    }

    public function copyToYml()
    {
        $array = $this->crawl();

        $yaml = Yaml::dump($array);
        file_put_contents('.\tests\_data\url.yml', $yaml);
    }
}
