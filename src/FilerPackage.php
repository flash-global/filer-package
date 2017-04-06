<?php
namespace Fei\Service\Filer\Package;

use Fei\ApiClient\Transport\BasicTransport;
use Fei\ApiClient\Transport\BeanstalkProxyTransport;
use Fei\Service\Filer\Client\Filer;
use Fei\Service\Filer\Package\Config\FilerAsyncTransport;
use Fei\Service\Filer\Package\Config\FilerEndpoint;
use Fei\Service\Filer\Package\Config\FilerTransportOptions;
use ObjectivePHP\Application\ApplicationInterface;
use Pheanstalk\Pheanstalk;
use Pheanstalk\PheanstalkInterface;

/**
 * Class FilerPackage
 *
 * @package Fei\Service\Filer\Package
 */
class FilerPackage
{
    protected $identifier = 'filer.client';

    /**
     * Construct the service with a specific name
     *
     * FilerPackage constructor
     *
     * @param string $serviceIdentifier
     */
    public function __construct(string $serviceIdentifier = 'filer.client')
    {
        $this->identifier = $serviceIdentifier;
    }

    /**
     * @param ApplicationInterface $app
     */
    public function __invoke(ApplicationInterface $app)
    {
        $config = $app->getConfig();

        $options = $config->get(FilerTransportOptions::class);
        $options = (is_array($options)) ? $options : [];

        $setters = [
            'setTransport' => [new BasicTransport($options)]
        ];

        // if a config for the async transport is set, we use it
        if ($config->has(FilerAsyncTransport::class)) {
            $asyncConfig = $config->get(FilerAsyncTransport::class);

            if (isset($asyncConfig['host'])) {
                $proxy = new BeanstalkProxyTransport();
                $proxy->setPheanstalk(
                    new Pheanstalk($asyncConfig['host'], $asyncConfig['port'] ?? PheanstalkInterface::DEFAULT_PORT)
                );

                $setters['setAsyncTransport'] = [$proxy];
            }
        }

        $app->getServicesFactory()->registerService(
            [
                'id' =>$this->identifier,
                'class' => Filer::class,
                'params' => [
                    [Filer::OPTION_BASEURL => $config->get(FilerEndpoint::class)]
                ],
                'setters' => $setters
            ]
        );
    }
}
