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
use Nia\Formatting\Text\SlugFormatter;

/**
 * Unit test for \Nia\Formatting\Text\SlugFormatter.
 */
class SlugFormatterTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers \Nia\Formatting\Text\SlugFormatter::format
     *
     * @dataProvider formatProvider
     */
    public function testFormat($locale, $value, $expected)
    {
        $formatter = new SlugFormatter($locale);

        $this->assertSame($expected, $formatter->format($value));
    }

    public function formatProvider()
    {
        $content = <<<EOL
de_DE;foobar;foobar
de_DE;foo bar;foo-bar
de_DE;foo  bar;foo-bar
de_DE; foobar;foobar
de_DE;1234;1234
de_DE;12 34;12-34
de_DE; 1234;1234
de_DE;1234.567;1234-567
de_DE;April 14, 1971 AD;april-14-1971-ad
de_DE;3:33:41am UTC;3-33-41am-utc
de_DE;DE19-1234-1234-1234-1234/--/12;de19-1234-1234-1234-1234-12
de_DE;°¹²³⁴⁵⁶⁷⁸⁹@₀₁₂₃₄₅₆₇₈₉;o123456789at0123456789
de_DE;Ä ä Ö ö Ü ü ß;ae-ae-oe-oe-ue-ue-ss
de_AT;Ä ä Ö ö Ü ü ß;ae-ae-oe-oe-ue-ue-sz
de_AT;Æ Ø Å æ ø å;ae-oe-aa-ae-oe-aa
de_DE;Ą;
pl_PL;Ą;a
de_DE; -foo;foo
en_US;Ä ä Ö ö Ü ü ß;
sv_SV;Ä ä Ö ö Ü ü ß;a-a-o
tr_TR;Ä ä Ö ö Ü ü ß ç;o-o-u-u-c
EOL;

        // convert CSV to result set
        $result = [];
        foreach (explode("\n", $content) as $line) {
            $result[] = explode(';', $line);
        }

        return $result;
    }
}
