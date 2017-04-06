<?php
namespace Fei\Service\Filer\Package\Config;

use ObjectivePHP\Config\SingleValueDirective;

class FilerTransportOptions extends SingleValueDirective
{
    public function __construct(array $value = [])
    {
        parent::__construct($value);
    }

    /**
     * Set the options for the basic transport
     *
     * @param array $options
     *
     * @return FilerTransportOptions
     */
    public function setOptions(array $options) : FilerTransportOptions
    {
        $this->value = $options;

        return $this;
    }
}
