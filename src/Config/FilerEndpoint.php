<?php
namespace Fei\Service\Filer\Package\Config;

use ObjectivePHP\Config\SingleValueDirective;

class FilerEndpoint extends SingleValueDirective
{
    public function __construct(string $value)
    {
        parent::__construct($value);
    }

    /**
     * Set the endpoint of the API
     *
     * @param string $endpoint
     *
     * @return FilerEndpoint
     */
    public function setEndpoint(string $endpoint) : FilerEndpoint
    {
        $this->value = $endpoint;

        return $this;
    }
}
