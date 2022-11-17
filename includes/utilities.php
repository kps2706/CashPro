<?php

function check_empty_fields($required_fields_array)
{
    # code...
    //initialize an array to store error messages
    $form_errors = array();
    //loop through the required fields array snd popular the form error array
    foreach ($required_fields_array as $name_of_field) {
        if (!isset($_POST[$name_of_field]) || $_POST[$name_of_field] == NULL) {
            $form_errors[] = $name_of_field . " is a required field";
        }
    }
    return $form_errors;
}