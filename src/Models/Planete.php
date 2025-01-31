<?php

namespace App\Models;

class Planete extends CorpsCeleste {
    protected string $type;

    public function __construct(string $nom, float $masse, int $diametre, int $demiGrandAxe, float $vitesse, string $type) {
        parent::__construct($nom, $masse, $diametre, $demiGrandAxe, $vitesse);
        $this->type = $type;
    }
}
