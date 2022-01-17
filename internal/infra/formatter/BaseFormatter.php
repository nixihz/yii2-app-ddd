<?php

namespace internal\infra\formatter;

use s9e\TextFormatter\Configurator;
use s9e\TextFormatter\Parser;
use s9e\TextFormatter\Renderer;
use s9e\TextFormatter\Unparser;

class BaseFormatter
{
    protected static $autoloadRegistered = false;
    public $formatter = null;
    /**
     * @var array
     */
    protected $allowHtmlElements = [
        'summary' => [],
        'details' => [],
        'center' => [],
        'small' => [],
        'sub' => [],
        'sup' => [],
        'br' => [],
        'p' => [],
        'font' => [],
        'audio' => ['src', 'controls', 'width', 'height', 'loop'],
        'video' => ['src', 'controls', 'width', 'height'],
        'span' => ['class'],
        'blockquote' => ['class'],
    ];

    public function __construct()
    {
        $this->registerAutoload();
    }

    protected function registerAutoload()
    {
        if (static::$autoloadRegistered) {
            return;
        }

        static::$autoloadRegistered = true;
    }

    /**
     * Parse text.
     *
     * @param string $text
     * @param mixed $context
     * @return string
     */
    public function parse($text, $context = null)
    {
        $parser = $this->getParser($context);

        return $parser->parse($text);
    }

    /**
     * Get the parser.
     *
     * @param mixed $context
     * @return Parser
     */
    protected function getParser($context = null)
    {
        if (!$this->formatter) {
            $this->formatter = $this->getConfigurator()->finalize();
        }
        $parser = $this->formatter["parser"];
        $parser->registeredVars['context'] = $context;

        return $parser;
    }

    /**
     * @return Configurator
     */
    protected function getConfigurator()
    {
        $configurator = new Configurator;

        $configurator->rootRules->enableAutoLineBreaks();

        $configurator->rendering->engine = 'PHP';

        $configurator->plugins->load('Escaper');
        $configurator->tags->onDuplicate('replace');

        return $configurator;
    }

    /**
     * Render parsed XML.
     *
     * @param string $xml
     * @return string
     */
    public function render($xml)
    {
        $renderer = $this->getRenderer();

        return $renderer->render($xml);
    }

    /**
     * Get the renderer.
     *
     * @return Renderer
     */
    protected function getRenderer()
    {
        if (!$this->formatter) {
            $this->formatter = $this->getConfigurator()->finalize();
        }
        $renderer = $this->formatter["renderer"];

        return $renderer;
    }

    /**
     * Unparse XML.
     *
     * @param string $xml
     * @return string
     */
    public function unparse($xml)
    {
        return Unparser::unparse($xml);
    }

    protected function confHtml($configurator)
    {
        foreach ($this->allowHtmlElements as $element => $attrs) {
            $configurator->HTMLElements->allowElement($element);
            foreach ($attrs as $attr) {
                $configurator->HTMLElements->allowAttribute($element, $attr);
            }
        }
    }
}
