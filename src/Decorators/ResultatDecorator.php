<?php

namespace App\Decorators;

class ResultatsDecorator {
    public static function afficher($resultats) {
        $classement = array_keys($resultats);

        function getArticle($type) {
            $feminins = ['Comete', 'PlaneteNaine']; // Définir les classes féminines
            return in_array($type, $feminins) ? 'une' : 'un';
        }

        echo "<h2>🏆 Résultats de la Course 🏆</h2>";

        for ($i = 0; $i < 3; $i++) {
            $nom = $classement[$i];
            $type = str_replace('App\Models\\', '', $resultats[$nom]['type']); // Supprimer le namespace
            $article = getArticle($type);
            $tours = number_format($resultats[$nom]['tours'], 2); // Format nombre avec 2 décimales

            if ($i == 0) {
                echo "<p>🏆 Le vainqueur de la course est <strong>$article $type</strong>, le grand <strong>$nom</strong>, il a effectué <strong>$tours</strong> tours d'orbite.</p>";
            } elseif ($i == 1) {
                echo "<p>🥈 Le lauréat de la médaille d'argent est <strong>$article $type</strong>, le talentueux <strong>$nom</strong>, il a effectué <strong>$tours</strong> tours d'orbite.</p>";
            } elseif ($i == 2) {
                echo "<p>🥉 Le troisième candidat présent sur le podium est <strong>$article $type</strong>, le vénérable <strong>$nom</strong>, il a effectué <strong>$tours</strong> tours d'orbite.</p>";
            }
        }
    }
}
