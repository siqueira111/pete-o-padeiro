<?php
function check_if_associative($array){
    if(array_keys($array) !== range(0, count($array) - 1)) 
        return true;
    else
        return false;
}

function cakes($recipe, $ingredients){
    $minimum_cakes = null;
    // Verifica se receita e ingrediente são do tipo lista
    if(!is_array($recipe) || !is_array($ingredients))
        return -1;
    
    // Verifica se o array é do tipo associative
    if(!check_if_associative($recipe) || !check_if_associative($ingredients))
        return -1;

    // Percorre ingredientes do bolo
    foreach ($recipe as $key => $key_value) {
        // Verifica se ingrediente existe
        if(array_key_exists($key, $ingredients)){
            // Verifica se a quantidade necessaria de ingrediente é maior que zero
            if($key_value <= 0)
                return -1;
                
            // Verifica se a quantidade de bolo tem um valor
            if(is_null($minimum_cakes))
                $minimum_cakes = intval($ingredients[$key] / $key_value);
                
            // Calcula quantidade de bolo por ingrediente
            $tmp = intval($ingredients[$key] / $key_value);
            
            // Se a quantidade for menor, atualiza a variável com o minimo possível
            if($tmp <= $minimum_cakes)
                $minimum_cakes = $tmp;
        } else {
            $minimum_cakes = 0;
            break;
        }
    }
    
    return $minimum_cakes;
}

// Abaixo estão os casos de uso:
var_dump(cakes(
  57, 
  ['flour' => 1200, 'sugar' => 1200, 'eggs' => 5, 'milk' => 200]) 
  === 2);

var_dump(cakes(
  ['flour' => 500, 'sugar' => 200, 'eggs' => 1], 
  57) 
  === 2);

var_dump(cakes(1, 2) 
  === 2);

var_dump(cakes(
  ['flout', 'sugar', 'eggs'], 
  ['flour', 'sugar', 'eggs', 'milk']) 
  === 2);

var_dump(cakes(
  ['flour' => 0, 'sugar' => 200, 'eggs' => 1], 
  ['flour' => 1200, 'sugar' => 1200, 'eggs' => 5, 'milk' => 200]) 
  === 2);

var_dump(cakes(
  ['flour' => 500, 'sugar' => 200, 'eggs' => 1], 
  ['flour' => 0, 'sugar' => 1200, 'eggs' => 5, 'milk' => 200]) 
  === 2);

var_dump(cakes(
  ['flour' => 500, 'sugar' => 200, 'eggs' => 1], 
  ['flour' => 1200, 'sugar' => 1200, 'eggs' => 5, 'milk' => 200]) 
  === 2);

var_dump(cakes(
  ['apples' => 3, 'flour' => 300, 'sugar' => 150, 'milk' => 100, 'oil' => 100],
  ['sugar' => 500, 'flour' => 2000, 'milk' => 2000]) 
  === 0);

var_dump(cakes(
  ['flour' => 500, 'sugar' => 200, 'eggs' => 1], 
  ['flour' => 1500, 'sugar' => 1200, 'eggs' => 5, 'milk' => 200]) 
  === 3);
 
?>
