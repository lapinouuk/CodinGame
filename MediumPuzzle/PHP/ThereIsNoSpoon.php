<?php
/**
CodinGame Medium Puzzle

THERE IS NO SPOON - EPISODE 1

The Goal
The game is played on a rectangular grid with a given size. Some cells contain power nodes. The rest of the cells are empty.

The goal is to find, when they exist, the horizontal and vertical neighbors of each node.
    Rules
To do this, you must find each (x1,y1) coordinates containing a node, and display the (x2,y2) coordinates of the next node to the right, and the (x3,y3) coordinates of the next node to the bottom within the grid.

If a neighbor does not exist, you must output the coordinates -1 -1 instead of (x2,y2) and/or (x3,y3). 
Don't let the machines win. You are humanity's last hope...

Game Input
The program must first read the initialization data from standard input. Then, provide to the standard output one line per instruction.
Initialization input
Line 1: one integer width for the number of cells along the x axis.

Line 2: one integer height for the number of cells along the y axis.

Next height lines: A string  line  containing  width  characters. A dot . represents an empty cell. A zero 0 represents a cell containing a node.

Output for one game turn
One line per node. Six integers on each line:   x1  y1  x2  y2  x3  y3

Where:
(x1,y1) the coordinates of a node
(x2,y2) the coordinates of the closest neighbor on the right of the node
(x3,y3) the coordinates of the closest bottom neighbor
If there is no neighbor, the coordinates should be -1 -1.
Constraints
0 < width ≤ 30
0 < height ≤ 30
0 ≤ x1 < width
0 ≤ y1 < height
-1 ≤ x2, x3 < width
-1 ≤ y2, y3 < height
Alloted response time to first output line ≤ 1s.
Response time between two output lines ≤ 100ms

 **/

function getNodeX($gr, $x , $y)
{
    if (isset($gr[$y][$x+1]) and $gr[$y][$x+1] != ".")
    {
        $x2 = $x+1;
        $y2 = $y;
        return " ".$x2." ".$y2;
    }
    else if (isset($gr[$y][$x+1]) and $gr[$y][$x+1] == ".")
    {
        $x++;
        return getNodeX($gr, $x, $y);
    }
    else
    {
        $x2 = -1;
        $y2 = -1;
        return " ".$x2." ".$y2;
    }
}

function getNodeY($gr, $x , $y)
{
    if (isset($gr[$y+1][$x]) and $gr[$y+1][$x] != ".")
    {
        $x3 = $x;
        $y3 = $y+1;
        return " ".$x3." ".$y3."\n";
    }
    else if (isset($gr[$y+1][$x]) and $gr[$y+1][$x] == ".")
    {
        $y++;
        return getNodeY($gr, $x, $y);
    }
    else
    {
        $x3 = -1;
        $y3 = -1;
        return " ".$x3." ".$y3."\n";
    }
}

fscanf(STDIN, "%d",
    $width // the number of cells on the X axis
);
fscanf(STDIN, "%d",
    $height // the number of cells on the Y axis
);
for ($i = 0; $i < $height; $i++)
{
    $line = stream_get_line(STDIN, 31 + 1, "\n"); // width characters, each either 0 or .
    $grid[$i] = str_split($line, 1);
}

for ($i = 0; $i < $height; $i++)
{
    for ($j = 0; $j < $width; $j++)
    {

        if ($grid[$i][$j] != ".")
        {
            $x1 = $j;
            $y1 = $i;
            
            // Checking if a node is on the right            
            $ansX = getNodeX($grid, $j, $i);
            // Checking if a node is on the bottom
            $ansY = getNodeY($grid, $j, $i);            
            
            echo $x1." ".$y1.$ansX.$ansY;
        }
    }
}

?>