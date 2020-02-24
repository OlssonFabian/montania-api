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

        //Loop out sorted array
        foreach ($product_array as $product) {
            if(isset($product->artiklar_benamning)){
                var_dump($product->pris);
                echo '<p>' . $product->artiklar_benamning . '</p>';
                //echo '<p>' . $product->pris . '</p>';
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
        echo '<p>' . round($product_array[0]->pris * 1.25) . '</p>';
    }
}