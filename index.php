<!DOCTYPE html>
<html>
    
    <head>
        <link rel="stylesheet" href="styles.css" type="text/css" />
    </head>
    
    <body>
        
        <?php
        
        $person = array(
            "name" => "Link",
            "imgUrl" => "./img/l.jpg",
            "cards" => array(
                    array("suit" => "hearts",
                          "value" => "4"
                    ),
                    array("suit" => "clubs",
                          "value" => "2"
                    )
                )
            );
            
            function displayUser($person){
                echo "Name: ".$person["name"]."<br>";
                echo '<img src="'.$person["imgUrl"].'"></img>';
            
            // construct card path from array info
            
                 for($i =0; $i < count($person["cards"]); $i++)
                {
                 $card = $person["cards"][$i];
                
                $imgUrl = "./img/cards/".$card["suit"]."/".$card["value"].".png";
                echo '<img src="'.$imgUrl.'"></img>';
                
                 }
                 
                 echo calculateHandValue($person["cards"]);
                
            }
            
            function calculateHandValue($cards){
                $sum = 0;
                for($i =0; $i < count($cards); $i++)
                {
                    $sum+= intval($cards[$i]["value"], 10);
                }
                
                return $sum;
                
            }
            
            
            displayUser($person);
            
            
        
        // person object, card object
        // calc card value function
        // find winner
        
        
        
        
        
        ?>
        
    </body>
    
</html>