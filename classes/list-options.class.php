<?php

namespace Montania;
require_once('classes/api.class.php');

use Montania\Api\get_all_results;

class List_options {

    public static function list_all($product_array){

        //Use this to sort the array by artiklar_benamning
        function cmp($a, $b) {
            if(isset($a->artiklar_benamning, $b->artiklar_benamning)){
                return strcmp($a->artiklar_benamning, $b->artiklar_benamning);
            }
        }
        usort($product_array, "Montania\cmp");
        
        echo '<ul>';
        //Loop out sorted array
        foreach ($product_array as $product) {
            if(isset($product->artiklar_benamning) && $product->pris >= 1){
                
                echo '<li>' . $product->artiklar_benamning . ' pris: ' . $product->pris * 1.25 . ':- </li>';
                if ($product->lagersaldo <= 0){
                    echo '<p>Finns ej i lager</p>';
                }
                else{
                    echo '<p>Finns i lager</p>';
                }
            }
        }
        echo '</ul>';
    }

    public static function filter_by_categories($product_array, $categories){

        foreach ($product_array as $product) {
            if(isset($product->artiklar_benamning) && isset($product->artikelkategorier_id)){
                foreach($categories as $category){
                    if($product->artikelkategorier_id == $category){
                        echo '<p>' . $product->artiklar_benamning . ' kategori: ' . $product->artikelkategorier_id . '</p>';
                    }
                }
            }
        }
    }



    public static function lowest_price($product_array){

        //Sort by price, don't allow the price to be 0 or less!
        usort($product_array, function($a, $b) {
            if($a->pris && $b->pris > 0){
                return ($a->pris - $b->pris) ;
            }
        });

        //Grab the first value, since it's already sorted by value the first price in the array will be the cheapest!
        echo '<p>Lägsta priset på en artikel är ' . round($product_array[0]->pris * 1.25) . ':- </p>';
    }

    public static function highest_price($product_array){
        //Sort by price, don't allow the price to be 0 or less!
        usort($product_array, function($a, $b) {
            if($a->pris && $b->pris > 0){
                return ($a->pris - $b->pris) ;
            }
        });

        //Grab the last value, since it's already sorted by value the last price in the array will be the most expensive!
        $most_expensive = end($product_array);
        echo '<p>Högsta priset på en artikel är ' . round($most_expensive->pris * 1.25) . ':- </p>';
    }

    public static function number_of_products($product_array){
        // counting ALL articles, even those with price set to zero or without names and so on
        echo '<p> antal artiklar i shopen ' . count($product_array) . 'st </p>';
    }
}