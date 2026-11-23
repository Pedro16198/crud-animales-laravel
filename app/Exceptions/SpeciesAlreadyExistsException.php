<?php

namespace App\Exceptions;

use Exception;

class SpeciesAlreadyExistsException extends Exception
{
    public static function forName(string $name): self
    {
        return new self(
            "La especie \"{$name}\" ya existe."
        );
    }
}
