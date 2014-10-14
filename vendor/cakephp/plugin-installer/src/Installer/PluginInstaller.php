<?php
namespace Cake\Composer\Installer;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;

class PluginInstaller extends LibraryInstaller {

/**
 * {@inheritDoc}
 */
	public function supports($packageType) {
		return 'cakephp-plugin' === $packageType;
	}

/**
 * {@inheritDoc}
 *
 * @throws \RuntimeException
 */
	public function getPackageBasePath(PackageInterface $package) {
		$extra = $package->getExtra();
		if (!empty($extra['installer-name'])) {
			return 'plugins/' . $extra['installer-name'];
		}

		$primaryNS = null;
		$autoLoad = $package->getAutoload();
		foreach ($autoLoad as $type => $pathMap) {
			if ($type !== 'psr-4') {
				continue;
			}
			$count = count($pathMap);

			if ($count === 1) {
				$primaryNS = key($pathMap);
				break;
			}

			$matches = preg_grep('#^(\./)?src/?$#', $pathMap);
			if ($matches) {
				$primaryNS = key($matches);
				break;
			}

			foreach (['', '.'] as $path) {
				$key = array_search($path, $pathMap, true);
				if ($key !== false) {
					$primaryNS = $key;
				}
			}
			break;
		}

		if (!$primaryNS) {
			throw new \RuntimeException('Unable to get CakePHP plugin name.');
		}

		return 'plugins/' . trim(str_replace('\\', '/', $primaryNS), '/');
	}

}