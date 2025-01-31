<?php

namespace App\Models;

use App\Factories\CorpsCelesteFactory; // ✅ Corrige l'import ici !

class Course {
    private array $participants = [];
    private int $duree;

    public function __construct(int $duree) {
        $this->duree = $duree;
        $this->genererParticipants();
    }

    private function genererParticipants() {
        $types = ['Comete', 'Planete', 'Asteroide', 'PlaneteNaine'];

        for ($i = 0; $i < 10; $i++) {
            $this->participants[] = CorpsCelesteFactory::creer($types[array_rand($types)]);
        }
    }

    public function simulerCourse() {
        $resultats = [];
        foreach ($this->participants as $participant) {
            $resultats[$participant->getNom()] = [
                'tours' => $participant->calculerAvancement($this->duree),
                'type' => get_class($participant)
            ];
        }

        uasort($resultats, fn($a, $b) => $b['tours'] <=> $a['tours']); // Trie par nombre de tours

        return $resultats;
    }
}
