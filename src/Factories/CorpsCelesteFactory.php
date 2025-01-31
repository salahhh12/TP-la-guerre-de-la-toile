<?php

namespace App\Factories;

use App\Models\{Planete, Asteroide, Comete, PlaneteNaine};

class CorpsCelesteFactory {
    public static function creer(string $type): object {
        $nom = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 8);
        $masse = mt_rand(0, 1000) / 1000;
        $diametre = mt_rand(1, 100000);
        $demiGrandAxe = mt_rand(1, 1000);
        $vitesse = mt_rand(10, 100);
        $typesPlanete = ['solide', 'liquide', 'gazeux'];

        return match ($type) {
            'Planete' => new Planete($nom, $masse, $diametre, $demiGrandAxe, $vitesse, $typesPlanete[array_rand($typesPlanete)]),
            'PlaneteNaine' => new PlaneteNaine($nom, $masse, $diametre, $demiGrandAxe, $vitesse, $typesPlanete[array_rand($typesPlanete)]),
            'Asteroide' => new Asteroide($nom, $masse, $diametre, $demiGrandAxe, $vitesse),
            'Comete' => new Comete($nom, $masse, $diametre, $demiGrandAxe, $vitesse),
            default => throw new \Exception("Type inconnu")
        };
    }
}
