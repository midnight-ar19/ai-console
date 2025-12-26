<?php

namespace App;

class FakeAiService
{
    public function generateResponse(string $input): string
    {
        sleep(2);
        if (str_contains(strtolower($input), 'hola')) {
            return "¡Hola! ¿En qué puedo ayudarte?";
        }
        return "No tengo una respuesta para eso.";
    }
}