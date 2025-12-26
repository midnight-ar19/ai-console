<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\OllamaService;
use App\OpenAIService;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$aiServiceOllama = new OllamaService();
$aiServiceOpenAI = new OpenAIService();

return new App\Chat($aiServiceOpenAI, $aiServiceOllama);