<?php
    require_once 'classes/api.class.php';
    require_once 'classes/list-options.class.php';
    use Montania\Api;
    use Montania\List_options;

    $products = new Api('https://dev14.ageraehandel.se/sv/api/product');
    $products->get_all_results($products->url);
    $array_of_products = $products->decoded_object->products;
    
    //List_options::list_all($array_of_products);
    
    List_options::lowest_price($array_of_products);
    List_options::highest_price($array_of_products);
    List_options::number_of_products($array_of_products);

    //List_options::filter_by_categories($array_of_products,["LJUS"]);
    //--- if you wish to filter for more than one category, just add more items to the array, for example ["LJUS","SERVETT"] will sort the array by both LJUS and SERVETT.

?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <div class="accordion" id="accordionExample">
  <div class="card z-depth-0 bordered">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
          aria-expanded="true" aria-controls="collapseOne">
          <h2>Alla Produkter</h2>
        </button>
      </h5>
    </div>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
      data-parent="#accordionExample">
      <div class="card-body">
        <?php List_options::list_all($array_of_products); ?>
      </div>
    </div>
  </div>
  <div class="card z-depth-0 bordered">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
          data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <?php echo '<h2>' . 'Ljus' . '</h2>' //could be more dynamic in future version ?> 
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        <?php List_options::filter_by_categories($array_of_products,["LJUS"]); ?>
      </div>
    </div>
  </div>
  <div class="card z-depth-0 bordered">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
          data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <?php echo '<h2>' . 'Porslin' . '</h2>' //could be more dynamic in future version ?>
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
       <?php List_options::filter_by_categories($array_of_products,["PORSLIN"]); ?>
      </div>
    </div>
  </div>
</div>
<div class="card z-depth-0 bordered">
    <div class="card-header" id="headingFour">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
          data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          <?php echo '<h2>' . 'Lyktor' . '</h2>' //could be more dynamic in future version ?>
        </button>
      </h5>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
      <div class="card-body">
       <?php List_options::filter_by_categories($array_of_products,["LYKTOR"]); ?>
      </div>
    </div>
  </div>
</div>
<div class="card z-depth-0 bordered">
    <div class="card-header" id="headingFive">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
          data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
          <?php echo '<h2>' . 'Servett' . '</h2>' //could be more dynamic in future version ?>
        </button>
      </h5>
    </div>
    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
      <div class="card-body">
       <?php List_options::filter_by_categories($array_of_products,["SERVETT"]); ?>
      </div>
    </div>
  </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>