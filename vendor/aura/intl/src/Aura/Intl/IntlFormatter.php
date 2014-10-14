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

use MessageFormatter;

/**
 * 
 * Uses php intl extension to format messages
 * 
 * @package Aura.Intl
 * 
 */
class IntlFormatter implements FormatterInterface
{
    /**
     * 
     * Constructor.
     *
     * @param string $icu_version The current ICU version; mostly used for 
     * testing.
     * 
     * @throws Exception\IcuVersionTooLow when the Version of ICU installed 
     * is too low for Aura.Intl to work properly.
     *
     */
    public function __construct($icu_version = INTL_ICU_VERSION)
    {
        if (version_compare($icu_version, '4.8') < 0) {
            throw new Exception\IcuVersionTooLow('ICU Version 4.8 or higher required.');
        }
    }

    /**
     * 
     * Format the message with the help of php intl extension
     * 
     * @param string $locale
     * @param string $string
     * @param array $tokens_values
     * @return string
     * @throws Exception
     */
    public function format($locale, $string, array $tokens_values)
    {
        // extract tokens and retain sequential positions
        $tokens = [];
        $i = 0;

        // opening brace, followed by the token word characters,
        // followed by any non-token word character
        $regex = '/(\{)([A-Za-z0-9_]+)([\,\}])/m';
        preg_match_all($regex, $string, $matches, PREG_SET_ORDER);
        
        foreach ($matches as $match) {
        
            // the token name
            $key = $match[2];
            if (! isset($tokens[$key])) {
                $tokens[$key] = $i;
                $num = $i;
                $i++;
            } else {
                $num = $tokens[$key];
            }
            
            // replace just the first occurence;
            // other occurrences will get replaced later.
            $string = preg_replace(
                "/$match[0]/",
                '{' . $num . $match[3],
                $string,
                1
            );
        }
        
        $values = [];
        foreach ($tokens as $token => $i) {
            if (! isset($tokens_values[$token])) {
                continue;
            }
            
            $value = $tokens_values[$token];
            
            // convert an array to a CSV string
            if (is_array($value)) {
                $value = '"' . implode('", "', $value) . '"';
            }
            
            $values[$i] = $value;
        }

        $formatter = new MessageFormatter($locale, $string);
        if (! $formatter) {
            throw new Exception\CannotInstantiateFormatter(
                intl_get_error_message(),
                intl_get_error_code()
            );
        }

        $result = $formatter->format($values);
        if ($result === false) {
            throw new Exception\CannotFormat(
                $formatter->getErrorMessage(),
                $formatter->getErrorCode()
            );
        }

        return $result;
    }
}
