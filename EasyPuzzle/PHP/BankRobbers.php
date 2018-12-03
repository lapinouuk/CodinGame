<?php
/*
CodinGame EasyPuzzle

Bank Robbers
By Shotokan

Goal
A gang of R foolish robbers decides to heist a bank. In the bank there are V vaults (indexed from 0 to V - 1). The robbers have managed to extract some information from the bank's director:
- The combination of a vault is composed of C characters (digits/vowels).
- The first N characters consist of digits from 0 to 9.
- The remaining characters consist of vowels (A, E, I, O, U).
- C and N may be the same or different for different vaults.

All the robbers work at the same time. A robber can work on one vault at a time, and a vault can be worked on by only one robber. Robbers deal with the different vaults in increasing order.

A robber tries the combinations at the speed of 1 combination per second. He tries all the possible combinations, i.e. he continues to try the untried combinations even after he has found the correct combination. Once he finishes one vault, he moves on to the next available vault, that is the vault with the smallest index among all the vaults that have not been worked on yet. The heist is finished when the robbers have worked on all the vaults.

Assume it takes no time to move from one vault to another.

You have to output the total time the heist takes.
*/

// Return index entry with the lowest value
function miniTable(array $t)
{
    $min = $t[0];
    $minKey = 0;
        
    for ($i = 1; $i < count($t); $i++)
    {
        if ($min > $t[$i])
        {
            $minKey = $i;
            $min = $t[$i];
        }
    }
    return $minKey;
}

fscanf(STDIN, "%d",
    $R
);
fscanf(STDIN, "%d",
    $V
);

for ($i = 0; $i < $V; $i++)
{
    fscanf(STDIN, "%d %d",
        $C,
        $N
    );
    $listPass [] = [$N, $C-$N];
}

foreach($listPass as $pass)
{
    $listTime[] = pow(10, $pass[0])*pow(5, $pass[1]);
}

for ($i = 0; $i < $R; $i++)
{
    $Robber[] = $listTime[$i];
}

$indice = $R;
while ($indice < $V)
{
    $Robber[miniTable($Robber)] += $listTime[$indice];
    $indice += 1;
}

echo max($Robber);

?>