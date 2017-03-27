# Filer Package

This package provide Filer Client integration for Objective PHP applications.

## Installation

Filer Package needs **PHP 7.0** or up to run correctly.

You will have to integrate it to your Objective PHP project with `composer require fei/filer-package`.


## Integration

As shown below, the Filer Package must be plugged in the application initialization method.
The Filer Package create a Filer Client service that will be consumed by the application's middlewares.

```php
<?php

use ObjectivePHP\Application\AbstractApplication;
use ObjectivePHP\Package\Filer\FilerPackage;

class Application extends AbstractApplication
{
    public function init()
    {
        // Define some application steps
        $this->addSteps('bootstrap', 'init', 'auth', 'route', 'rendering');
        
        // Initializations...

        // Plugging the Filer Package in the bootstrap step
        $this->getStep('bootstrap')
        ->plug(FilerPackage::class);

        // Another initializations...
    }
}
```
### Application configuration
``
Create a file in your configuration directory and put your Filer configuration as below:

```php
<?php
use ObjectivePHP\Package\Filer\Config\FilerEndpoint;
use ObjectivePHP\Package\Filer\Config\FilerTransportOptions;

return [
    new FilerEndpoint('http://filer.dev'),
    new FilerTransportOptions([])
];
```

In the previous example you need to set these configurations:

* `FilerEndpoint` : represent the URL where the API can be contacted in order to send and retrieve the files
* `FilerTransportOptions : represents the options for the transport of the request if you want to set specific options

Please check out `filer-client` documentation for more information about how to use this client.