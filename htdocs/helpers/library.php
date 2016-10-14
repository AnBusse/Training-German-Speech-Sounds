<?php
  // library.php
  // Contains support functions
  
  /* Prints the string ' error-highlight' (the
     name of the class for marking errors) if
     there is an error for $my_field_name: */
  function my_highlight($my_field_name) {
     global $errors, $error_msgs;
     if ($errors && !empty($error_msgs[$my_field_name])) { 
        echo ' error-highlight';
     }
  }
  
  /* Prints the notification for $my_field_name,
     if there is one: */
  function my_print_notification($my_field_name) {
     global $notice, $notice_msgs;
     if ($notice && !empty($notice_msgs[$my_field_name])) { 
        echo '<p class="notice-highlight"><strong>', $notice_msgs[$my_field_name], "</strong></p>\n";
     }
  }

  /* Prints the notice message for $my_field_name,
     if there is one: */
  function my_print_error_message($my_field_name) {
     global $errors, $error_msgs;
     if ($errors && !empty($error_msgs[$my_field_name])) { 
        echo '<p class="error-highlight"><strong>', $error_msgs[$my_field_name], "</strong></p>\n";
     }
  }
  
    /* Cleans up $my_string by 
     - replacing line-breaks with the PHP_EOL (end-of-line) character,
     - removing whitespace at the beginning and at the end,
     - removing backward slashes,
     - removing HTML tags: */
  function my_clean_up($my_string) {
     return strip_tags(stripslashes(trim(str_replace(array('\r\n', '\n', '\r'), PHP_EOL, $my_string))));
  }
  
  // Prints a 'value' attribute with the value $my_value:
  function my_print_value_attribute($my_value) {
     if (!empty($my_value)) {
        echo ' value="', my_clean_up($my_value), '"'; 
     }
     elseif ($my_value === 0) {
        echo ' value="0"';
     }
  }
  
  
	
function convert_word_stuff($string) { 
 $search = [     // www.fileformat.info/info/unicode/<NUM>/ <NUM> = 2018
                "\xC2\xAB",     // « (U+00AB) in UTF-8
                "\xC2\xBB",     // » (U+00BB) in UTF-8
                "\xE2\x80\x98", // ‘ (U+2018) in UTF-8
                "\xE2\x80\x99", // ’ (U+2019) in UTF-8
                "\xE2\x80\x9A", // ‚ (U+201A) in UTF-8
                "\xE2\x80\x9B", // ‛ (U+201B) in UTF-8
                "\xE2\x80\x9C", // “ (U+201C) in UTF-8
                "\xE2\x80\x9D", // ” (U+201D) in UTF-8
                "\xE2\x80\x9E", // „ (U+201E) in UTF-8
                "\xE2\x80\x9F", // ‟ (U+201F) in UTF-8
                "\xE2\x80\xB9", // ‹ (U+2039) in UTF-8
                "\xE2\x80\xBA", // › (U+203A) in UTF-8
                "\xE2\x80\x93", // – (U+2013) in UTF-8
                "\xE2\x80\x94", // — (U+2014) in UTF-8
                "\xE2\x80\xA6"  // … (U+2026) in UTF-8
    ];

    $replace = [
                "<<", 
                ">>",
                "'",
                "'",
                "'",
                "'",
                '"',
                '"',
                '"',
                '"',
                "<",
                ">",
                "-",
                "-",
                "..."
    ];

    return str_replace($search, $replace, $string); 
}
  
  
  
?>