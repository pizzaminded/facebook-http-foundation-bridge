# pizzaminded/facebook-http-foundation-bridge

If your app uses symfony/http-foundation and facebook/php-graph-sdk, this one is for you! This Library integrates these two packages.

## What are a benefits of using this package?
- Facebook SDK by default tries to extract everything from superglobals, using this bridge it will use your ``Request`` and ``Session`` classes. Easier to debug.
- Facebook SDK  stores everything in ``$_SESSION``, but it breaks when session is not started and you have to start it manually. ``Session`` class  automatically when used. This is also a good solution when you e.g. use some more fancy session handlers like Redis or PDO. 
- Persisted Data stored in session are prefixed, so there is no chance that something will override your values.



# Installation

```
composer require pizzaminded/facebook-http-foundation-bridge
```

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
