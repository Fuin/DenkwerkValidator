<?php

namespace Denkwerk\Crawler;

include 'cli/PHPCrawl_083/libs/PHPCrawler.class.php';

class SiteCrawler extends \PHPCrawler
{
    public $urls = array();

    public function handleDocumentInfo(\PHPCrawlerDocumentInfo $PageInfo)
    {
        if($PageInfo->http_status_code == 200){
            $this->urls[] = $PageInfo->url;
        }
        echo $PageInfo->url;
        flush();
    }
}
