<?php
namespace Main;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class DataRenderer
{
    private $twig;

    public function __construct($templateDirectory)
    {
        $loader = new FilesystemLoader($templateDirectory);
        $this->twig = new Environment($loader);
    }

    public function render($template, $data)
    {
        try {
            echo $this->twig->render($template, $data);
        } catch (LoaderError | RuntimeError | SyntaxError $e) {
            echo "Template render failed: " . $e->getMessage();
        }
    }
}
