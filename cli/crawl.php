<?php

set_time_limit(1000);

require ('cli/Crawler/SiteCrawler.php');

$crawler = new \Denkwerk\Crawler\SiteCrawler();

$crawler->setURL('www.denkwerk.com/de/');
$crawler->setFollowMode(3);
//set to not follow dates
$crawler->addURLFilterRule('#.(jpg|jpeg|gif|png|js|css|phar|svg|xml|ogg|mp4|webm)$# i');
$crawler->addURLFilterRule('#\/(p\+|\(|\$[a-z]+)$# i');
$crawler->addContentTypeReceiveRule('#text/html#');
$crawler->go();

$urlArray = $crawler->urls;

$asArray = array();
$arrkey = 'url';

for($i=0; $i<count($urlArray); $i++){
    $asArray[$i] = array($arrkey => $urlArray[$i]);
}

file_put_contents('.\tests\_data\url.php', serialize($asArray));

echo 'finished crawling';

