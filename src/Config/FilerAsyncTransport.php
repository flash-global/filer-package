<?php
namespace Fei\Service\Filer\Package\Config;

use ObjectivePHP\Config\SingleValueDirective;
use Pheanstalk\PheanstalkInterface;

class FilerAsyncTransport extends SingleValueDirective
{
    public function __construct(string $host = '127.0.0.1', int $port = PheanstalkInterface::DEFAULT_PORT)
    {
        parent::__construct([
            'host' => $host,
            'port' => $port
        ]);
    }

    /**
     * Set the host of the async transport
     *
     * @param string $host
     *
     * @return FilerAsyncTransport
     */
    public function setHost(string $host) : FilerAsyncTransport
    {
        $this->value['host'] = $host;

        return $this;
    }

    /**
     * Set the port of the async transport
     *
     * @param integer $port
     *
     * @return FilerAsyncTransport
     */
    public function setPort(int $port) : FilerAsyncTransport
    {
        $this->value['port'] = $port;

        return $this;
    }
}
