<?php

namespace Modules\Forum\Inspections;

use Exception;

class KeyHeldDown
{
    /**
     * Detect spam.
     *
     * @param  string $body
     * @throws \Exception
     */
    public function detect($body)
    {
        if (preg_match('/(.)\\1{4,}/', $body)) {
            throw new Exception('Votre réponse contient un spam.');
        }
    }
}
