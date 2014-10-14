<?php
namespace Cake\Test\TestCase\Composer\Installer;

use Cake\Composer\Installer\PluginInstaller;
use Composer\Composer;
use Composer\Config;
use Composer\Package\Package;
use Composer\Package\RootPackage;
use Composer\Repository\RepositoryManager;

class PluginInstallerTest extends \PHPUnit_Framework_TestCase {

	public $package;

	public $installer;

/**
 * setUp
 *
 * @return void
 */
	public function setUp() {
		$this->package = new Package('CamelCased', '1.0', '1.0');
		$this->package->setType('cakephp-plugin');

		$composer = new Composer();
		$config = $this->getMock('Composer\Config');
		$composer->setConfig($config);

		$io = $this->getMock('Composer\IO\IOInterface');
		$rm = new RepositoryManager(
			$io,
			$config
		);
		$composer->setRepositoryManager($rm);

		$this->installer = new PluginInstaller($io, $composer);
	}

/**
 * Test install path
 *
 * @return void
 */
	public function testGetInstallPath() {
		$autoload = array(
			'psr-4' => array(
				'FOC\\Authenticate' => ''
			)
		);
		$this->package->setAutoload($autoload);

		$path = $this->installer->getInstallPath($this->package);
		$this->assertEquals('plugins/FOC/Authenticate', $path);

		$autoload = array(
			'psr-4' => array(
				'FOC\Acl\Test' => './tests',
				'FOC\Acl' => ''
			)
		);
		$this->package->setAutoload($autoload);
		$path = $this->installer->getInstallPath($this->package);
		$this->assertEquals('plugins/FOC/Acl', $path);

		$autoload = array(
			'psr-4' => array(
				'Foo\Bar' => 'foo',
				'Acme\Plugin' => './src'
			)
		);
		$this->package->setAutoload($autoload);
		$path = $this->installer->getInstallPath($this->package);
		$this->assertEquals('plugins/Acme/Plugin', $path);

		$autoload = array(
			'psr-4' => array(
				'Foo\Bar' => 'bar',
				'Foo' => ''
			)
		);
		$this->package->setAutoload($autoload);
		$path = $this->installer->getInstallPath($this->package);
		$this->assertEquals('plugins/Foo', $path);

		$autoload = array(
			'psr-4' => array(
				'Foo\Bar' => 'bar',
				'Foo' => '.'
			)
		);
		$this->package->setAutoload($autoload);
		$path = $this->installer->getInstallPath($this->package);
		$this->assertEquals('plugins/Foo', $path);

		$autoload = array(
			'psr-4' => array(
				'Acme\Foo\Bar' => 'bar',
				'Acme\Foo' => ''
			)
		);
		$this->package->setAutoload($autoload);
		$path = $this->installer->getInstallPath($this->package);
		$this->assertEquals('plugins/Acme/Foo', $path);

		$autoload = array(
			'psr-4' => array(
				'Acme\Foo\Bar' => '',
				'Acme\Foo' => 'src'
			)
		);
		$this->package->setAutoload($autoload);
		$path = $this->installer->getInstallPath($this->package);
		$this->assertEquals('plugins/Acme/Foo', $path);

		$this->package->setExtra(array('installer-name' => 'Baz'));
		$path = $this->installer->getInstallPath($this->package);
		$this->assertEquals('plugins/Baz', $path);
	}

}
