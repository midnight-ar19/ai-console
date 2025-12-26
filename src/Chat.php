<?php

namespace App;

class Chat
{

    public function __construct(
        private OpenAIService $openAIService,
        private OllamaService $ollamaService
    ) {
    }

    public function start()
    {
        $running = true;

        while ($running) {

            echo $this->menu() . PHP_EOL;
            $choice = $this->prom();

            if ($this->shouldExit($choice)) {
                $running = false;
                continue;
            }

            if ($choice === '1') {
                $this->aiService($this->ollamaService, 'Ollama');

            } elseif ($choice === '2') {
                $this->aiService($this->openAIService, 'OpenAI');

            } else {
                echo 'Opción no válida. Por favor, elige 1 o 2.' . PHP_EOL;
            }
        }
    }
    public function menu(): string
    {
        $menu = <<<'MENU'
                Elige el servicio de IA:
                1. Ollama
                2. OpenAI
                (escribe "exit" para salir)
                MENU;
        return $menu;
    }

    public function prom(): string
    {
        return trim(readline('> '));
    }

    private function shouldExit(string $input): bool
    {
        return $input === '' || strtolower($input) === 'exit';
    }

    public function aiService($service, $label): void
    {
        $running = true;
        while ($running) {
            echo 'Haz una pregunta (exit para volver al menú) (' . $label . ')' . PHP_EOL;
            $input = $this->prom();
            if ($this->shouldExit($input)) {
                $running = false;
                continue;
            }
            echo $service->generateResponse($input) . PHP_EOL;
        }
    }

}