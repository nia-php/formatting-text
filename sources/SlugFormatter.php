<?php
/*
 * This file is part of the nia framework architecture.
 *
 * (c) Patrick Ullmann <patrick.ullmann@nat-software.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types = 1);
namespace Nia\Formatting\Text;

/**
 * Formats a value into a slug.
 */
class SlugFormatter implements TextFormatterInterface
{

    /**
     * The used locale.
     *
     * @var string
     */
    private $locale = null;

    /**
     * Constructor.
     *
     * @param string $locale
     *            The used locale.
     */
    public function __construct(string $locale)
    {
        $this->locale = $locale;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Nia\Formatting\FormatterInterface::format($value)
     */
    public function format(string $value): string
    {
        $rules = $this->getRules($this->locale);

        $value = strtr($value, $rules);
        $value = mb_strtolower($value);
        $value = preg_replace('/([^a-z0-9]|-)+/', '-', $value);

        return trim($value, '-');
    }

    /**
     * Returns the replacement rules of a locale as a map to slugify a value.
     *
     * @param string $locale
     *            The used locale.
     * @return string[] The replacement rules as a map.
     */
    private function getRules(string $locale)
    {
        $rules = [
            // default
            'default' => [
                '°' => 'o',
                '¹' => '1',
                '²' => '2',
                '³' => '3',
                '⁴' => '4',
                '⁵' => '5',
                '⁶' => '6',
                '⁷' => '7',
                '⁸' => '8',
                '⁹' => '9',
                '₀' => '0',
                '₁' => '1',
                '₂' => '2',
                '₃' => '3',
                '₄' => '4',
                '₅' => '5',
                '₆' => '6',
                '₇' => '7',
                '₈' => '8',
                '₉' => '9',
                'æ' => 'ae',
                'ǽ' => 'ae',
                'À' => 'A',
                'Á' => 'A',
                'Â' => 'A',
                'Ã' => 'A',
                'Å' => 'AA',
                'Ǻ' => 'A',
                'Ă' => 'A',
                'Ǎ' => 'A',
                'Æ' => 'AE',
                'Ǽ' => 'AE',
                'à' => 'a',
                'á' => 'a',
                'â' => 'a',
                'ã' => 'a',
                'å' => 'aa',
                'ǻ' => 'a',
                'ă' => 'a',
                'ǎ' => 'a',
                'ª' => 'a',
                '@' => 'at',
                'Ĉ' => 'C',
                'Ċ' => 'C',
                'ĉ' => 'c',
                'ċ' => 'c',
                '©' => 'c',
                'Ð' => 'Dj',
                'Đ' => 'D',
                'ð' => 'dj',
                'đ' => 'd',
                'È' => 'E',
                'É' => 'E',
                'Ê' => 'E',
                'Ë' => 'E',
                'Ĕ' => 'E',
                'Ė' => 'E',
                'è' => 'e',
                'é' => 'e',
                'ê' => 'e',
                'ë' => 'e',
                'ĕ' => 'e',
                'ė' => 'e',
                'ƒ' => 'f',
                'Ĝ' => 'G',
                'Ġ' => 'G',
                'ĝ' => 'g',
                'ġ' => 'g',
                'Ĥ' => 'H',
                'Ħ' => 'H',
                'ĥ' => 'h',
                'ħ' => 'h',
                'Ì' => 'I',
                'Í' => 'I',
                'Î' => 'I',
                'Ï' => 'I',
                'Ĩ' => 'I',
                'Ĭ' => 'I',
                'Ǐ' => 'I',
                'Į' => 'I',
                'Ĳ' => 'IJ',
                'ì' => 'i',
                'í' => 'i',
                'î' => 'i',
                'ï' => 'i',
                'ĩ' => 'i',
                'ĭ' => 'i',
                'ǐ' => 'i',
                'į' => 'i',
                'ĳ' => 'ij',
                'Ĵ' => 'J',
                'ĵ' => 'j',
                'Ĺ' => 'L',
                'Ľ' => 'L',
                'Ŀ' => 'L',
                'ĺ' => 'l',
                'ľ' => 'l',
                'ŀ' => 'l',
                'Ñ' => 'N',
                'ñ' => 'n',
                'ŉ' => 'n',
                'Ò' => 'O',
                'Ô' => 'O',
                'Õ' => 'O',
                'Ō' => 'O',
                'Ŏ' => 'O',
                'Ǒ' => 'O',
                'Ő' => 'O',
                'Ơ' => 'O',
                'Ø' => 'OE',
                'Ǿ' => 'O',
                'Œ' => 'OE',
                'ò' => 'o',
                'ô' => 'o',
                'õ' => 'o',
                'ō' => 'o',
                'ŏ' => 'o',
                'ǒ' => 'o',
                'ő' => 'o',
                'ơ' => 'o',
                'ø' => 'oe',
                'ǿ' => 'o',
                'º' => 'o',
                'œ' => 'oe',
                'Ŕ' => 'R',
                'Ŗ' => 'R',
                'ŕ' => 'r',
                'ŗ' => 'r',
                'Ŝ' => 'S',
                'Ș' => 'S',
                'ŝ' => 's',
                'ș' => 's',
                'ſ' => 's',
                'Ţ' => 'T',
                'Ț' => 'T',
                'Ŧ' => 'T',
                'Þ' => 'TH',
                'ţ' => 't',
                'ț' => 't',
                'ŧ' => 't',
                'þ' => 'th',
                'Ù' => 'U',
                'Ú' => 'U',
                'Û' => 'U',
                'Ũ' => 'U',
                'Ŭ' => 'U',
                'Ű' => 'U',
                'Ų' => 'U',
                'Ư' => 'U',
                'Ǔ' => 'U',
                'Ǖ' => 'U',
                'Ǘ' => 'U',
                'Ǚ' => 'U',
                'Ǜ' => 'U',
                'ù' => 'u',
                'ú' => 'u',
                'û' => 'u',
                'ũ' => 'u',
                'ŭ' => 'u',
                'ű' => 'u',
                'ų' => 'u',
                'ư' => 'u',
                'ǔ' => 'u',
                'ǖ' => 'u',
                'ǘ' => 'u',
                'ǚ' => 'u',
                'ǜ' => 'u',
                'Ŵ' => 'W',
                'ŵ' => 'w',
                'Ý' => 'Y',
                'Ÿ' => 'Y',
                'Ŷ' => 'Y',
                'ý' => 'y',
                'ÿ' => 'y',
                'ŷ' => 'y'
            ],
            // German
            'de' => [
                'Ä' => 'AE',
                'Ö' => 'OE',
                'Ü' => 'UE',
                'ß' => 'ss',
                'ä' => 'ae',
                'ö' => 'oe',
                'ü' => 'ue'
            ],
            // German Austrian
            'de_AT' => [
                'Ä' => 'AE',
                'Ö' => 'OE',
                'Ü' => 'UE',
                'ß' => 'sz',
                'ä' => 'ae',
                'ö' => 'oe',
                'ü' => 'ue'
            ],
            // Polish
            'pl' => [
                'Ą' => 'A',
                'Ć' => 'C',
                'Ę' => 'E',
                'Ł' => 'L',
                'Ń' => 'N',
                'Ó' => 'O',
                'Ś' => 'S',
                'Ź' => 'Z',
                'Ż' => 'Z',
                'ą' => 'a',
                'ć' => 'c',
                'ę' => 'e',
                'ł' => 'l',
                'ń' => 'n',
                'ó' => 'o',
                'ś' => 's',
                'ź' => 'z',
                'ż' => 'z'
            ],
            // Swedish
            'sv' => [
                'Ä' => 'A',
                'Ö' => 'O',
                'ä' => 'a',
                'ö' => 'ö'
            ],
            // Turkish
            'tr' => [
                'Ç' => 'C',
                'Ğ' => 'G',
                'İ' => 'I',
                'Ş' => 'S',
                'Ö' => 'O',
                'Ü' => 'U',
                'ç' => 'c',
                'ğ' => 'g',
                'ı' => 'i',
                'ş' => 's',
                'ö' => 'o',
                'ü' => 'u'
            ]
        ];

        // add default set.
        $result = $rules['default'];

        // add general language rules.
        $language = substr($locale, 0, 2);
        if (array_key_exists($language, $rules)) {
            $result = array_merge($result, $rules[$language]);
        }

        // add the region specifc rules.
        if (array_key_exists($locale, $rules)) {
            $result = array_merge($result, $rules[$locale]);
        }

        return $result;
    }
}
