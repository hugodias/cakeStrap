<?php
namespace Aura\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

/**
 * 
 * Really, we do nothing here, other than recognize `"type" : "aura-package".
 * It installs like any other library package for Composer.
 * 
 */
class DefaultInstaller extends LibraryInstaller
{
    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return $packageType == 'aura-package';
    }
}
