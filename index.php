<!DOCTYPE html>
<html>
    
    <head>
        <link rel="stylesheet" href="styles.css" type="text/css" />
    </head>
    
    <body>
        
        <div id="wrapper">
        
        <table>
            <tr>
                <td><span id="title-text">SilverJack</span></td>
            </tr>
        </table>
        
        <table>
        
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
            
            
        $playerlist = array();
        
        array_push($playerlist, $person1);
        array_push($playerlist, $person2);
        array_push($playerlist, $person3);
        array_push($playerlist, $person4);
        
            
        function displayUser($person){
            echo "<tr>";
            echo "<td>";
            echo '<span class="profile-name">Name: '.$person["name"]."</span><br>";
            echo '<img src="'.$person["imgUrl"].'" class="profile-img"></img>';
            
            // construct card path from array info
            echo "</td>";
            
            echo "<td>";
            for($i =0; $i < count($person["cards"]); $i++) {
                $card = $person["cards"][$i];
            
                // $card = "./img/cards/",$card["suit"],"/",$card["value"],".png";
                echo '<img src="'.$card["imgUrl"].'"></img>';
                
            }
            echo "</td>";
            
            echo "<td>";
            // echo '<img src="', $person["cards"][1];
            echo '<span class="card-val">'.calculateHandValue($person["cards"]).'</span>';
             echo "</td>";
                
            echo "</tr>";
        }
            
        function calculateHandValue($cards){
            $sum = 0;
            for($i =0; $i < count($cards); $i++) {
                $sum+= intval($cards[$i]["num"], 10);
            }
                
            return $sum;
                
        }
            
        shuffle($playerlist);
            
        foreach($playerlist as $player){
            
            displayUser($player);
            
        }
            
            
        echo "</table>";
        
        // person object, card object
        // calc card value function
        // find winner
        $peoplearray= [$person1, $person2, $person3, $person4];
        $scores= [];
        for($i=0; $i<4; $i++)
        {
           $personcards = calculateHandValue($playerlist[$i]["cards"]);
           $scores[]=$personcards;
        }
       $maxV = max($scores);
        $value= array_search($maxV, $scores);
        
        echo "<table><tr><td>";
        
        echo '<span id="winner-text">The Winner is '.$playerlist[$value]["name"].' with '.calculateHandValue($playerlist[$value]["cards"]).' total.</span>';
        
        echo "</td></tr></table>";
        ?>
        
        
        </div>
        
    </body>
    
    
</html>