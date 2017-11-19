<?php
$filePath = "resources/recipes.xml";
$xml = simplexml_load_file($filePath) or die("Couldn't load file");

/*
 * $index is used to determine which recipe is to be fetched.
 * 0 - Meatballs
 * 1 - Pancakes
 */

function getTitle($index) {
    echo $GLOBALS['xml']->recipe[$index]->title;
}

function getDescription($index) {
    echo $GLOBALS['xml']->recipe[0]->description->li;
}

function getIngredients($index) {
    foreach ($GLOBALS['xml']->recipe[0]->ingredient->children() as $ingredient) {
        echo "<li>$ingredient</li>";
    }
}

function getInstructions($index) {
    foreach ($GLOBALS['xml']->recipe[0]->recipetext->children() as $instruction) {
        echo "<li>$instruction</li>";
    }
}
