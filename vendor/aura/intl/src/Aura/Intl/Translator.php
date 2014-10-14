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
 * Translator to translate the message
 * 
 * @package Aura.Intl
 * 
 */
class Translator implements TranslatorInterface
{
    /**
     * 
     * A fallback translator.
     * 
     * @var TranslatorInterface
     * 
     */
    protected $fallback;

    /**
     * 
     * The formatter to use when translating messages.
     * 
     * @var FormatterInterface
     * 
     */
    protected $formatter;

    /**
     * 
     * The locale being used for translations.
     * 
     * @var string
     * 
     */
    protected $locale;

    /**
     * 
     * The message keys and translations.
     * 
     * @var array
     * 
     */
    protected $messages = [];

    /**
     * 
     * Constructor
     * 
     * @param string $locale The locale being used.
     * 
     * @param array $messages The message keys and translations.
     * 
     * @param FormatterInterface $formatter A message formatter.
     * 
     * @param TranslatorInterface $fallback A fallback translator.
     * 
     */
    public function __construct(
        $locale,
        array $messages,
        FormatterInterface $formatter,
        TranslatorInterface $fallback = null
    ) {
        $this->locale    = $locale;
        $this->messages  = $messages;
        $this->formatter = $formatter;
        $this->fallback  = $fallback;
    }

    /**
     * 
     * Gets the message translation by its key.
     * 
     * @param string $key The message key.
     * 
     * @return mixed The message translation string, or false if not found.
     * 
     */
    protected function getMessage($key)
    {
        if (isset($this->messages[$key])) {
            return $this->messages[$key];
        }

        if ($this->fallback) {
            // get the message from the fallback translator
            $message = $this->fallback->getMessage($key);
            // speed optimization: retain locally
            $this->messages[$key] = $message;
            // done!
            return $message;
        }

        // no local message, no fallback
        return false;
    }

    /**
     * 
     * Translates the message indicated by they key, replacing token values
     * along the way.
     * 
     * @param string $key The message key.
     * 
     * @param array $tokens_values Token values to interpolate into the
     * message.
     * 
     * @return string The translated message with tokens replaced.
     * 
     */
    public function translate($key, array $tokens_values = [])
    {
        // get the message string
        $message = $this->getMessage($key);

        // do we have a message string?
        if (! $message) {
            // no, return the message key as-is
            $message = $key;
        }

        // are there token replacement values?
        if (! $tokens_values) {
            // no, return the message string as-is
            return $message;
        }

        // run message string through formatter to replace tokens with values
        return $this->formatter->format($this->locale, $message, $tokens_values);
    }
}
