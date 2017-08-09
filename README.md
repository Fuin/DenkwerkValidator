
# Requirements
 
## PHP Extensions
* openssl

# PHPCrawl_083

PHPCrawlerHTTPRequest.class.php

line 471: Replace 'SNI_server_name' with 'peer_name'
          SNI_server_name is not supported by PHP > 5.6.0.

## Console Commands

# Installation

    composer install

# Tests

## Crawler
Windows:

    php .\cli\cleanup.php

Mac:

    php .\cli\cleanup.php

## Acceptance-Tests
Windows:

    vendor\bin\codecept run acceptance

Mac:

    vendor/bin/codecept run acceptance
