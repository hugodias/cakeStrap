<?php
namespace Aura\Intl;

require dirname(__DIR__) . '/src.php';

return new TranslatorLocator(
    new PackageLocator,
    new FormatterLocator([
        'basic' => function() { return new Aura\Intl\BasicFormatter; },
        'intl'  => function() { return new Aura\Intl\IntlFormatter; },
    ]),
    new TranslatorFactory,
    'en_US'
);
