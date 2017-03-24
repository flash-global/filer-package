<?php
namespace ObjectivePHP\Package\Filer;

use Fei\Service\Filer\Client\Filer;

trait FilerAware
{
    /**
     * @var Filer
     */
    protected $filer;

    /**
     * Get Filer
     *
     * @return Filer
     */
    public function getFiler(): Filer
    {
        return $this->filer;
    }

    /**
     * Set Filer
     *
     * @param Filer $filer
     *
     * @return $this
     */
    public function setFiler(Filer $filer)
    {
        $this->filer = $filer;

        return $this;
    }
}
