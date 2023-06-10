<?php

    $input_date = '24-02-2023';

    // Convert the date string to a Unix timestamp
    $timestamp = strtotime($input_date);

    // Get the day name from the Unix timestamp
    $day_name = date('l', $timestamp);

    // Print the day name
    echo "The day of the week for $input_date is $day_name.";

?>