<?php

namespace App;
use ArdaGnsrn\Ollama\Ollama;

class OllamaService
{
    protected $cliente;

    public function __construct()
    {
        $this->cliente = Ollama::client();
    }

    public function generateResponse(string $input): string
    {
        $resultado = $this->cliente->chat()->create([
            'model' => 'deepseek-r1:1.5b',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'Eres un asistente de programación para principiantes.
                        Responde de forma simple y directa.
                        Usa ejemplos cortos.
                        No des explicaciones largas.
                        Muestra solo lo necesario.
                        Cuando muestres código, que sea claro y funcional.
                        Si te preguntan algo que no esté relacionado directamente con programacion, responde "No puedo ayudarte con eso".
                        Responde en máximo 5 líneas.
                        Si no sabes la respuesta, di que no lo sabes.'
                ],
                [
                    'role' => 'user',
                    'content' => $input,
                ],
            ],
        ]);
        return $resultado->message->content;
    }
}