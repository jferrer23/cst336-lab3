<!DOCTYPE html>
<html>
    
    <head>
        <link rel="stylesheet" href="styles.css" type="text/css" />
    </head>
    
    <body>
        
        <?php
        
        function mapNumberToCard($num) {
            $cardValue = $num % 13 + 1;
            $cardSuit = floor($num / 13);
            $suitStr = "";
            
            switch($cardSuit) {
                case 0: $suitStr = "clubs";
                        break;
                case 1: $suitStr = "diamonds";
                        break;
                case 2: $suitStr = "hearts";
                        break;
                case 3: $suitStr = "spades";
                        break;
            }
            
            $card = array (
                'num' => $cardValue,
                'suit' => $cardSuit,
                'imgUrl' => "./img/cards/".$suitStr."/".$cardValue.".png"
                );
            return $card;
            
        }
        
        function generateDeck() {
            $cards = array();
            for($i = 0; $i < 52; $i++) {
                array_push($cards, $i);
            }
            shuffle($cards);
            
            return $cards;
        }
        
        function generateHand(&$deck) {
            $hand = array();
                      
            for(;;) {
                if(count($deck) == 0)
                {
                    return;
                }
                $cardNum = array_pop($deck);
                $card = mapNumberToCard($cardNum);
                array_push($hand, $card);
                $sum = calculateHandValue($hand);
                if($sum > 42)
                {
                    array_pop($hand);
                    array_push($deck, $cardNum);
                    break;
                }
                
            }
            
            return $hand;
        }
        
        $deck = generateDeck();
        
        
        $person1 = array(
            "name" => "Link",
            "imgUrl" => "./img/l.jpg",
            "cards" => generateHand($deck)
            );
        $person2 = array(
            "name" => "Mario",
            "imgUrl" => "./img/m.png",
            "cards" => generateHand($deck)
            );
        $person3 = array(
            "name" => "Samus",
            "imgUrl" => "./img/s.png",
            "cards" => generateHand($deck)
            );
        $person4 = array(
            "name" => "Tony",
            "imgUrl" => "./img/t.gif",
            "cards" => generateHand($deck)
            );
        function displayUser($person){
            echo "Name: ".$person["name"]."<br>";
            echo '<img src="'.$person["imgUrl"].'"></img>';
            
            // construct card path from array info
            
            for($i =0; $i < count($person["cards"]); $i++) {
                $card = $person["cards"][$i];
            
                // $card = "./img/cards/",$card["suit"],"/",$card["value"],".png";
                echo '<img src="'.$card["imgUrl"].'"></img>';
                
            }
                
            // echo '<img src="', $person["cards"][1];
            echo calculateHandValue($person["cards"]);
                
        }
            
        function calculateHandValue($cards){
            $sum = 0;
            for($i =0; $i < count($cards); $i++) {
                $sum+= intval($cards[$i]["num"], 10);
            }
                
            return $sum;
                
        }
            
            
        displayUser($person1);
        displayUser($person2);
        displayUser($person3);
        displayUser($person4);
            
            
        
        // person object, card object
        // calc card value function
        // find winner
        
        
        
        
        
        ?>
        
    </body>
    
</html>