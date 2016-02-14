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
namespace Test\Nia\Formatting\Text;

use PHPUnit_Framework_TestCase;
use Nia\Formatting\Text\IbanFormatter;

/**
 * Unit test for \Nia\Formatting\Text\IbanFormatter.
 */
class IbanFormatterTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers \Nia\Formatting\Text\IbanFormatter::format
     *
     * @dataProvider formatProvider
     */
    public function testFormat($value, $expected)
    {
        $formatter = new IbanFormatter();

        $this->assertSame($expected, $formatter->format($value));
    }

    public function formatProvider()
    {
        $content = <<<EOL
foobar;FOOB AR
foo bar;FOOB AR
 foobar;FOOB AR
1234;1234
12 34;1234
 1234;1234
1234.567;1234 567
April 14, 1971 AD;APRI L141 971A D
3:33:41am UTC;3334 1AMU TC
DE19123412341234123412;DE19 1234 1234 1234 1234 12
DE19-1234-1234-1234-1234/12;DE19 1234 1234 1234 1234 12
EOL;
        // convert CSV to result set
        $result = [];
        foreach (explode("\n", $content) as $line) {
            $result[] = explode(';', $line);
        }

        return $result;
    }
}
