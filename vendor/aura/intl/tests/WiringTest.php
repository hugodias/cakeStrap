<?php
namespace Aura\Intl;

use Aura\Framework\Test\WiringAssertionsTrait;

class WiringTest extends \PHPUnit_Framework_TestCase
{
    use WiringAssertionsTrait;
    
    protected function setUp()
    {
        $this->loadDi();
    }
    
    public function testServices()
    {
        $this->assertGet('intl_package_factory', 'Aura\Intl\PackageFactory');
        $this->assertGet('intl_translator_locator', 'Aura\Intl\TranslatorLocator');
    }
    
    public function testInstances()
    {
        $this->assertNewInstance('Aura\Intl\FormatterLocator');
        $this->assertNewInstance('Aura\Intl\TranslatorLocator');
    }
}
