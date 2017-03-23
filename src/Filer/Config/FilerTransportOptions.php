<?php
namespace ObjectivePHP\Package\Filer\Config;

use ObjectivePHP\Config\SingleValueDirective;

class FilerTransportOptions extends SingleValueDirective
{
    public function __construct(array $value = [])
    {
        parent::__construct($value);
    }
}
