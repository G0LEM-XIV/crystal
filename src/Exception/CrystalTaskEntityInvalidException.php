<?php

namespace Crystal\Exception;

use Throwable;
use Exception;

class CrystalTaskEntityInvalidException extends Exception
{
    public function __construct(string $message = '', int $code = 0, Throwable $previous = null, $entity = null)
    {
        parent::__construct($message, $code, $previous);
    }
}