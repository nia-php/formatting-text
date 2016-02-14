# nia - Text Formatter

Component with several text formatter implementations such like IBAN and slug.

## Installation

Require this package with Composer.

```bash
	composer require nia/formatting-text
```

## Tests
To run the unit test use the following command:

    $ cd /path/to/nia/component/
    $ phpunit --bootstrap=vendor/autoload.php tests/

## Formatters
The component provides several formatters but you are able to write your own text formatter by implementing the `Nia\Formatting\Text\TextFormatterInterface` interface for a more specific use case.

| Formatter | Description |
| --- | --- |
| `Nia\Formatting\Text\IbanFormatter` | Formats a value into the IBAN (International Bank Account Number) format. |
| `Nia\Formatting\Text\SlugFormatter` | Formats a value into a slug. |

## How to use
The following sample shows you how to use the `Nia\Formatting\Text\IbanFormatter` and the `Nia\Formatting\Text\SlugFormatter`.

```php
	$formatter = new IbanFormatter();
	echo $formatter->format('DE19123412341234123412'); // DE19 1234 1234 1234 1234 12

	// [...]

    // de_DE locale replace ß with ss
	$formatter = new SlugFormatter('de_DE');
	echo $formatter->format('Ich grüße euch'); // ich-gruesse-euch

	// [...]

    // de_AT locale replace ß with sz
	$formatter = new SlugFormatter('de_AT');
	echo $formatter->format('Ich grüße euch'); // ich-gruesze-euch
```
