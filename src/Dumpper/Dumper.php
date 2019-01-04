<?php namespace Dumpper;

use Dumpper\HtmlDumper;
use Symfony\Component\VarDumper\Dumper\CliDumper;
use Symfony\Component\VarDumper\Cloner\VarCloner;

class Dumper
{
    /**
     * Dump a value with elegance.
     *
     * @param  mixed  $value
     * @return void
     */
    public function d($value)
    {
        if (class_exists(CliDumper::class)) {
            $dumper = 'cli' === PHP_SAPI ? new CliDumper : new HtmlDumper;
            $dumper->dump((new VarCloner)->cloneVar($value));
        } else {
            var_dump($value);
        }
    }

    function ddd($variable, $depth = -1, $stringLength = 20)
    {
        $cloner = new VarCloner();
        $cloner->setMaxString($stringLength);

        $dumper = 'cli' === PHP_SAPI ? new CliDumper() : new HtmlDumper();
        $dumper->dump($cloner->cloneVar($variable)->withMaxDepth($depth));

        die(1);
    }
}