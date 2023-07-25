<?php
//solution for https://www.codewars.com/kata/550f22f4d758534c1100025a/php

function dirReduc($directions) : array {
    //map opposite directions for easy comparison
    $oppositesMap = [
        'NORTH' => 'SOUTH',
        'SOUTH' => 'NORTH',
        'EAST' => 'WEST',
        'WEST' => 'EAST'
    ];

    //for iterate through the directions. 
    //If the direction is the same as the next direction 
    //remove them both from the directions array
    for($i = 0; $i < count($directions); ++$i)
    {
        if(isset($directions[$i+1])) 
        {
            if($oppositesMap[$directions[$i]] == $directions[$i+1])
            {
                unset($directions[$i]);
                unset($directions[$i+1]);

                //reindex the array
                $directions = array_values($directions);

                //reset the iterator
                $i = -1;
            }
        } 
        else 
        {
          break;
        }
    }

    return $directions;
}

?>
