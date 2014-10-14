<?php
namespace Aura\Intl\_Config;

use Aura\Di\Config;
use Aura\Di\Container;

class Common extends Config
{
    public function define(Container $di)
    {
        /**
         * Services
         */
        $di->set('intl_package_factory', $di->lazyNew('Aura\Intl\PackageFactory'));
        $di->set('intl_translator_locator', $di->lazyNew('Aura\Intl\TranslatorLocator'));

        /**
         * Aura\Intl\FormatterLocator
         */
        $di->params['Aura\Intl\FormatterLocator']['registry'] = [
            'basic' => $di->lazyNew('Aura\Intl\BasicFormatter'),
            'intl'  => $di->lazyNew('Aura\Intl\IntlFormatter'),
        ];

        /**
         * Aura\Intl\TranslatorLocator
         */
        $di->params['Aura\Intl\TranslatorLocator'] = [
             'locale' => 'en_US',
            'factory' => $di->lazyNew('Aura\Intl\TranslatorFactory'),
            'formatters' => $di->lazyNew('Aura\Intl\FormatterLocator'),
            'packages' => $di->lazyNew('Aura\Intl\PackageLocator'),
        ];
    }
    
    public function modify(Container $di)
    {
    }
}
