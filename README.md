# pizzaminded/facebook-http-foundation-bridge

If your app uses symfony/http-foundation and facebook/php-graph-sdk, this one is for you! This Library integrates these two packages.


# Usage:

```php
<?php 

$urlDetectionHandler = Pizzaminded\FacebookHttpFoundationBridge\UrlDetectionHandler::fromRequest($request);
$persistentDataHandler = new Pizzaminded\FacebookHttpFoundationBridge\SessionDataHandler($session);

$facebook = new Facebook\Facebook([
    //things
    'url_detection_handler' => $urlDetectionHandler,
    'persistent_data_handler' => $persistentDataHandler
]);

```
## If you are using Symfony 4+:

(Maybe it works on 3.4+, havent checked yet)

Add this lines to your `services.yaml`:

```php
Pizzaminded\FacebookHttpFoundationBridge\UrlDetectionHandler: ~
Pizzaminded\FacebookHttpFoundationBridge\SessionDataHandler: ~

Facebook\Facebook:
        arguments:
            -
                app_id: '%facebook_app_id%'
                app_secret: '%facebook_app_secret%'
                default_graph_version: 'v4.0'
                url_detection_handler: '@Pizzaminded\FacebookHttpFoundationBridge\UrlDetectionHandler'
                persistent_data_handler: '@Pizzaminded\FacebookHttpFoundationBridge\SessionDataHandler'


```


# License:

MIT