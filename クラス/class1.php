<?php

$hito = new Human();
$hito->setHuman();

class Human {
    public $name = '北川';
    public $age = 28;

    public function setHuman() {

      echo $this->name."です。"."年齢は".$this->age."歳です。";
}

}
