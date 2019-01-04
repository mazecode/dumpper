<?php namespace Dumpper;

use Symfony\Component\VarDumper\Dumper\HtmlDumper as SymfonyHtmlDumper;

class HtmlDumper extends SymfonyHtmlDumper
{
    public static $defaultOutput = 'php://output';
    protected $dumpHeader;
    protected $dumpId = 'sf-dump';
    protected $lastDepth = -1;
    private $extraDisplayOptions = array();

    protected $colors = true;
    protected $headerIsDumped = true;
    protected $dumpSuffix = '</pre><script>Sfdump(%s)</script><script>(function(){"use strict";var compacted=document.querySelectorAll(".sf-dump-compact");for(var i=;i<compacted.length;i++){compacted[i].className="sf-dump-expanded";}})();</script>';
    private $displayOptions = array(
        "maxDepth" => 5,
        "maxStringLength" => 200,
        "fileLinkFormat" => true,
    );
    protected $maxStringWidth = 200;
    protected $styles = array(
        'default' => 'background-color:#fff; color:#222; line-height:1em; font-weight:normal; font:12px "Fira Code", Monaco, Consolas, monospace; word-wrap: break-word; white-space: pre-wrap; position:relative; z-index:100000',
        'num' => 'color:#a71d5d',
        'const' => 'color:#795da3',
        'str' => 'color:#df5000',
        'cchr' => 'color:#222',
        'note' => 'color:#a71d5d',
        'ref' => 'color:#a0a0a0',
        'public' => 'color:#795da3',
        'protected' => 'color:#795da3',
        'private' => 'color:#795da3',
        'meta' => 'color:#b729d9',
        'key' => 'color:#df5000',
        'index' => 'color:#a71d5d',
    );
    protected static $themes = [
        'dark' => [
            'default' => 'background-color:#fff; color:#222; line-height:1em; font-weight:normal; font:12px "Fira Code", Monaco, Consolas, monospace; word-wrap: break-word; white-space: pre-wrap; position:relative; z-index:100000',
            'num' => 'color:#a71d5d',
            'const' => 'color:#795da3',
            'str' => 'color:#df5000',
            'cchr' => 'color:#222',
            'note' => 'color:#a71d5d',
            'ref' => 'color:#a0a0a0',
            'public' => 'color:#795da3',
            'protected' => 'color:#795da3',
            'private' => 'color:#795da3',
            'meta' => 'color:#b729d9',
            'key' => 'color:#df5000',
            'index' => 'color:#a71d5d',
        ]
    ];

    function __construct($output = null, string $charset = null, int $flags = 0)
    {
        parent::__construct($output, $charset, $flags);
        $this->setDisplayOptions($this->displayOptions);
    }
}
