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
                var_dump($product);
                echo '<p>' . $product->artiklar_benamning . '</p>';
            }
        }
    }
}