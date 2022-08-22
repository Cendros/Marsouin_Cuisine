<?php

namespace App\DataFixtures;

use App\Entity\Etape;
use App\Entity\Ingredient;
use App\Entity\Quantite;
use App\Entity\Recette;
use App\Entity\Unite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RecetteFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $ingredients = ['sucre', 'lait', 'eau', 'farine', 'oeuf', 'sel'];
        $ingredientsObjects = [];

        $gramme = new Unite();
        $gramme->setLabel('gramme');
        $gramme->setSymbole('g');
        $manager->persist($gramme);

        $centilitre = new Unite();
        $centilitre->setLabel('centilitre');
        $centilitre->setSymbole('cl');
        $manager->persist($centilitre);

        foreach ($ingredients as $key => $value) {
            $ingredient = new Ingredient();
            $ingredient->setLabel($value);
            $manager->persist($ingredient);

            $ingredientsObjects[$value] = $ingredient;
        }
        $etape = new Etape();
        $etape->setDescription('Ajouter la farine, les oeufs et le sucre dans un saladier et mélanger.');

        $quantite = new Quantite();
        $quantite->setIngredient($ingredientsObjects['farine']);
        $quantite->setUnite($gramme);
        $quantite->setValeur(500);
        $manager->persist($quantite);
        $etape->addIngredient($quantite);

        $quantite = new Quantite();
        $quantite->setIngredient($ingredientsObjects['oeuf']);
        $quantite->setValeur(2);
        $manager->persist($quantite);
        $etape->addIngredient($quantite);

        $quantite = new Quantite();
        $quantite->setIngredient($ingredientsObjects['sucre']);
        $quantite->setUnite($gramme);
        $quantite->setValeur(25);
        $manager->persist($quantite);
        $etape->addIngredient($quantite);

        $manager->persist($etape);

        $etape2 = new Etape();
        $etape2->setDescription('Cuire à 180°C pendant 20 minutes.');
        $manager->persist($etape2);

        $recette = new Recette();
        $recette->setLabel('Bretzel');
        $recette->setImgPath('bretzel.jpg');
        $recette->setVideo('https://www.youtube.com/embed/BW0Z_u9o53s');
        $recette->addEtape($etape);
        $recette->addEtape($etape2);
        $manager->persist($recette);

        $manager->flush();
    }
}
