<?php

class Cloud {
	function word_cloud($words, $div_size = 400) {

    $cloud = "<div style='width:{$div_size}px' id='cloud'>";
    $colors = array('#00FFFF', '#0000FF', '#7FFF00', '#6495ED', '#DC143C', '#8B008B', '#B22222', '#FFD700', '#008000');

    /* This word cloud generation algorithm was taken from the Wikipedia page on "word cloud"
       with some minor modifications to the implementation */
    
    /* Initialize some variables */
    $fmax = 96; /* Maximum font size */
    $fmin = 8; /* Minimum font size */
    $tmin = min($words); /* Frequency lower-bound */
    $tmax = max($words); /* Frequency upper-bound */

    foreach ($words as $word => $frequency) {
    
        if ($frequency > $tmin) {
            $font_size = floor(  ( $fmax * ($frequency - $tmin) ) / ( $tmax - $tmin )  );
            $color = $colors[mt_rand(0,8)];
        }
        else {
            $font_size = 0;
        }
        
        if ($font_size >= $fmin) {
        	$cloud .= "<a href='http://localhost:3000/songs/{$word}' style=\"font-size: {$font_size}px; color: $color;\">$word &nbsp;</a>";
        }
        
    }
    
    $cloud .= "</div>";
    
    return $cloud;
    
}
}

?>