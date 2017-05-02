<?php
class Taiyaki
{
    private $anko;

    public function __construct($anko)
    {
        $this->anko = $anko;
    }

    public function getAnko()
    {
        return $this->anko;
    }
}

$tsubuanTaiyaki = new Taiyaki('つぶあん');
$creamTaiyaki = new Taiyaki('クリーム');
$zundaTaiyaki = new Taiyaki('ずんだ');

echo $tsubuanTaiyaki->getAnko();
echo $creamTaiyaki->getAnko();
echo $zundaTaiyaki->getAnko();

 ?>
