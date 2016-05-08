<?php

# checking the $_POST variables for required
  # fields that have been left blank. Strip any default code inserted by your editor,
  
  # Förum í allar name breytur í forminu ($_POST array)
  foreach ($_POST as $key => $value) {
  
  // Trim-ar temp value-in
  $temp = is_array($value) ? $value : trim($value);


 	// ---  VALIDATION KEMUR HÉR  ----

  	// Tekur name value-in úr forminu
  	// og býr til breytu úr því
   ${$key} = $temp;
  }


echo "$fornafn";
echo "<br>";
echo "$eftirnafn";
echo "<br>";
echo "$simi";

