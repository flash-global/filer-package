<?php
namespace ObjectivePHP\Package\Filer;

use Fei\ApiClient\Transport\BasicTransport;
use Fei\Service\Filer\Client\Filer;
use ObjectivePHP\Application\ApplicationInterface;
use ObjectivePHP\Package\Filer\Config\FilerEndpoint;
use ObjectivePHP\Package\Filer\Config\FilerTransportOptions;

/**
 * Class FilerPackage
 *
 * @package ObjectivePHP\Package\Filer
 */
class FilerPackage
{
    /**
     * @param ApplicationInterface $app
     */
    public function __invoke(ApplicationInterface $app)
    {
        $options = $app->getConfig()->get(FilerTransportOptions::class);
        $options = (is_array($options)) ? $options : [];

        $app->getServicesFactory()->registerService(
            [
                'id' =>'filer.client',
                'class' => Filer::class,
                'params' => [
                    [Filer::OPTION_BASEURL => $app->getConfig()->get(FilerEndpoint::class)]
                ],
                'setters' => [
                    'setTransport' => [new BasicTransport($options)]
                ]
            ]
        );
    }
}
