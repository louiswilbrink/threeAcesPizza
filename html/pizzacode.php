<HTML>
Choose your pizza

<?php

// www.w3schools.com/php/php_xml_simplexml.asp

$xml = simplexml_load_file("menu.xml");

echo $xml->getName() . "<br />";

foreach($xml->children() as $child){
  if ($child['name'] == "Pizza"){
    echo $child->getName() . ": " . $child['name'] . "<br />";
    foreach($child->children() as $data){
      echo $data->getName() . ": " . $data['name'] . "<br />";
      }
    }
  }

echo $xml->Category->Topping->Size->Small->Price;

//www.phpeveryday.com/articles/SimpleXML-Accessing-Element-P533.html


/*foreach($xml->xpath('//Category') as $category) {
  echo $category . "<br />";
}
*/

//echo $xml->Category['name'];

//print $xml->asXML();

// print_r($xml)

?>



</HTML>
