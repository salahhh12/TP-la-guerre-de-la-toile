<?php

require __DIR__ . '/vendor/autoload.php';

use App\Models\Course;

// Fonction pour accorder "un" ou "une" selon le type du corps céleste
function getArticle($type) {
    $feminins = ['Comete', 'PlaneteNaine']; // Liste des corps célestes féminins
    return in_array($type, $feminins) ? 'une' : 'un';
}

// Démarrer la course avec une durée aléatoire entre 1 et 100 ans
$course = new Course(mt_rand(1, 100));
$resultats = $course->simulerCourse();

// Récupérer les 3 premiers gagnants
$classement = array_keys($resultats);
$top3 = array_slice($classement, 0, 3);

// Définition des médailles pour les 3 premiers
$places = ["🥇 1er", "🥈 2ème", "🥉 3ème"];

echo "<h1>🏆 Résultats de la Course Galactique 🏆</h1>";
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr><th>🏅 Position</th><th>🌌 Nom</th><th>🌍 Type</th><th>🌀 Tours d'Orbite</th></tr>";

// Vérifier qu'on a bien au moins 3 gagnants avant d'afficher les médailles
foreach ($top3 as $index => $nom) {
    $type = str_replace('App\Models\\', '', $resultats[$nom]['type']); // Enlever "App\Models\"
    $article = getArticle($type); // Trouver "un" ou "une"
    echo "<tr style='font-weight: bold; color: gold;'>
        <td>{$places[$index]}</td>
        <td>$nom</td>
        <td>$type</td>
        <td>{$resultats[$nom]['tours']} tours</td>
    </tr>";
}

// Affichage du reste des résultats
$position = 4;
foreach ($resultats as $nom => $data) {
    if (in_array($nom, $top3)) continue; // Ignorer ceux déjà affichés
    $type = str_replace('App\Models\\', '', $data['type']);
    echo "<tr>
        <td>#{$position}</td>
        <td>$nom</td>
        <td>$type</td>
        <td>{$data['tours']} tours</td>
    </tr>";
    $position++;
}

echo "</table>";

// Affichage du message des 3 premiers gagnants
echo "<h2>🎉 Annonce des Gagnants ! 🎉</h2>";

$vainqueur = $classement[0];
$typeVainqueur = str_replace('App\Models\\', '', $resultats[$vainqueur]['type']);
$article = getArticle($typeVainqueur);
echo "<p>🏆 Le vainqueur est $article $typeVainqueur, le grand $vainqueur, il a effectué {$resultats[$vainqueur]['tours']} tours d'orbite.</p>";

$deuxieme = $classement[1];
$typeDeuxieme = str_replace('App\Models\\', '', $resultats[$deuxieme]['type']);
$article2 = getArticle($typeDeuxieme);
echo "<p>🥈 Le second est $article2 $typeDeuxieme, la talentueuse $deuxieme, il a effectué {$resultats[$deuxieme]['tours']} tours d'orbite.</p>";

$troisieme = $classement[2];
$typeTroisieme = str_replace('App\Models\\', '', $resultats[$troisieme]['type']);
$article3 = getArticle($typeTroisieme);
echo "<p>🥉 Le troisième est $article3 $typeTroisieme, le vénérable $troisieme, il a effectué {$resultats[$troisieme]['tours']} tours d'orbite.</p>";

?>
