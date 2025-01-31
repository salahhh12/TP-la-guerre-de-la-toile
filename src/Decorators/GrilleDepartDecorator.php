<?php

namespace App\Decorators;

class GrilleDepartDecorator {
    public static function afficher($participants) {
        // Tri des participants
        usort($participants, function ($a, $b) {
            if ($a->getDemiGrandAxe() !== $b->getDemiGrandAxe()) {
                return $a->getDemiGrandAxe() <=> $b->getDemiGrandAxe();
            }
            if ($a->getVitesse() !== $b->getVitesse()) {
                return $b->getVitesse() <=> $a->getVitesse();
            }
            return strcmp($a->getNom(), $b->getNom());
        });

        // Affichage de la grille de départ
        echo "<h2>🚀 Grille de Départ de la Course 🚀</h2>";
        foreach ($participants as $index => $participant) {
            $type = property_exists($participant, 'type') ? $participant->type : 'Inconnu';
            $nomClasse = str_replace('App\Models\\', '', get_class($participant)); // Supprimer le namespace

            echo "Le " . ($index + 1) . "ᵉ participant <strong>{$participant->getNom()}</strong> est un/une <strong>$nomClasse</strong> de type <strong>$type</strong>.<br>";
        }
    }
}
