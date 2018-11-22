<?php
/*
CodinGame Community EasyPuzzle :

JACK SILVER: THE CASINO
By informatics

Goal
Jack Silver is a spy from the international spy agency. 

In his current mission he observes his targets at a roulette table at the Great Grand Casino in Villan City. He needs to know how much money his targets have at the end of the game.

The target plays as follows:
- He always bets 1/4 of the cash he currently has. If it is a fractional value, he always rounds up.
- The target's calls, CALL, can be one of the three possibilities:
-- EVEN - He bets on an EVEN (non-zero) number
-- ODD - He bets on an ODD number
-- PLAIN - He bets on a specific number: NUMBER

NOTE: Since the odds of winning are much lower for PLAIN bets, the payout for a win is higher: 35 to 1. For EVEN and ODD, the payout is 1 to 1. As an example, if the ball comes up as 23, and the target bets 100, the payouts would be as follows:

- If he called EVEN, then he would lose his 100 bet.
- If he called ODD, then he would get his 100 bet back, plus an extra 100.
- If he called PLAIN and specified any number other than 23, he would lose his 100 bet.
- If he called PLAIN and specified 23 as his number, he would get back his 100 bet plus an extra 3500.
*/

fscanf(STDIN, "%d",
    $ROUNDS
);
fscanf(STDIN, "%d",
    $CASH
);
for ($i = 0; $i < $ROUNDS; $i++)
{
    $PLAY = stream_get_line(STDIN, 1024 + 1, "\n");
    $game[] = explode(" ", $PLAY);
}

foreach ($game as $round)
{
    if ($CASH > 0)
    {
        $bet = ceil($CASH / 4);
        switch ($round[1])
        {
            case "PLAIN":
                $win = ($round[0] == $round[2]) ? $bet*35 : -$bet;
                break;
            
            case "ODD":
                $win = ($round[0] % 2 != 0) ? $bet : -$bet;
                break;
            
            case "EVEN":
                $win = ($round[0] % 2 == 0 and $round[0] != 0) ? $bet : -$bet;
                break;            
        }
        $CASH += $win;
    }
}

echo $CASH."\n";

?>