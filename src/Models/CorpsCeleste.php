<?php

namespace App\Models;

class CorpsCeleste {
    protected float $masse;
    protected int $diametre;
    protected int $demiGrandAxe;
    protected float $vitesse;
    protected string $nom;

    public function __construct(string $nom, float $masse, int $diametre, int $demiGrandAxe, float $vitesse) {
        $this->nom = $nom;
        $this->masse = $masse;
        $this->diametre = $diametre;
        $this->demiGrandAxe = $demiGrandAxe;
        $this->vitesse = $vitesse;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getDemiGrandAxe(): int {
        return $this->demiGrandAxe;
    }

    public function getVitesse(): float {
        return $this->vitesse;
    }

    public function calculerAvancement(float $duree): float {
        return ($this->vitesse * $duree) / ($this->demiGrandAxe * 2 * pi());
    }
}
