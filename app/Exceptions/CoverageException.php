<?php

namespace App\Exceptions;

use Exception;

class CoverageException extends Exception
{
    private const MSG = 'Code coverage is lower than expected threshold of {threshold}';

    public final function getCoverageMessage(string $threshold): string
    {
        return str_replace('{threshold}', $threshold, self::MSG);
    }
}
