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
 * Formats a value into the IBAN (International Bank Account Number) format.
 */
class IbanFormatter implements TextFormatterInterface
{

    /**
     *
     * {@inheritDoc}
     *
     * @see \Nia\Formatting\FormatterInterface::format($value)
     */
    public function format(string $value): string
    {
        $parts = str_split(preg_replace('/[^0-9A-Z]/', '', strtoupper($value)), 4);

        return implode(' ', $parts);
    }
}
