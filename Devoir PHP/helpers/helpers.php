<?php 
# Fonction retournant une date aléatoire entre la date d'aujourd'hui, et la date d'aujourd'hui-la durée de vie du serpent
    function RandomDate($months) 
    {
        if (!is_int($months) || $months <= 0) 
        {
            return false;
        }

        date_default_timezone_set('Europe/Paris');

        $today = strtotime(date("Y-m-d H:i:s"));
        $start_date = strtotime("-$months seconds", $today);
        
        // Generate random number using above bounds
        $val = rand($start_date, $today);
        
        // Convert back to desired date format
        return date('Y-m-d H:i:s', $val);

    }

    function getRandomDate($lifespan) {
        return RandomDate($lifespan);
    }


    
?>