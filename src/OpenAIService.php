<?php

namespace App;
use OpenAI;
use GuzzleHttp\Client;


class OpenAIService
{
    protected $cliente;

    public function __construct()
    {
        $httpClient = new Client([
            'verify' => 'C:/wamp64/bin/php/cacert.pem',
        ]);

        $this->cliente = OpenAI::factory()
            ->withApiKey($_ENV['OPENAI_API_KEY'])
            ->withHttpClient($httpClient)
            ->make();
    }

    public function generateResponse(string $input): string
    {
        $resultado = $this->cliente->chat()->create([
            'model' => 'gpt-4o-mini',
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
        return $resultado->choices[0]->message->content;
    }
}