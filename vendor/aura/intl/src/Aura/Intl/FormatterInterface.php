<?php
/**
 * 
 * This file is part of the Aura Project for PHP.
 * 
 * @package Aura.Intl
 * 
 * @license http://opensource.org/licenses/bsd-license.php BSD
 * 
 */
namespace Aura\Intl;

/**
 * 
 * Formatter Interface
 * 
 * @package Aura.Intl
 * 
 */
interface FormatterInterface
{
    /**
     * 
     * Format message
     * 
     * @param string $locale
     * 
     * @param string $string
     * 
     * @param array $tokens_values
     * 
     */
    public function format($locale, $string, array $tokens_values);
}
