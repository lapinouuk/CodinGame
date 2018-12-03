/*
PIRATE'S TREASURE
By T0nda

Goal of this puzzle is to found pirate's treasure.
Input
Line 1: Width W of treasure map.
Line 2: Height H of treasure map.
Next H lines: W symbols (0 or 1) indicating free space (0) or obstacle (1). 

Treasure is placed on free space surrounded by only obstacles.

There are three possibilities how can be the treasure surrounded:
By 3 obstacles when the treasure is in the corner of the map.
By 5 obstacles when the treasure is on the edge of the map.
By 8 obstacles when the treasure is inside the map.
Output
Coordinates of treasure in map represented by indexes separated by space. For example: "12 5"

Position "0 0" is in the top left corner, so maximum index x is W-1 and maximum index y is H-1.
Constraints
* 2 <= W <= 25
* 2 <= H <= 25
* Only 1 treasure in map.

*/

const W = parseInt(readline());
const H = parseInt(readline());


let map = [];
let delim = [];

for(let i = 0; i < W + 2; i++) {
    delim.push(1);    
}
for (let i = 0; i < H; i++) {
    map[i] = [];
    var inputs = readline().split(' ');
    for (let j = 0; j < W; j++) {
        const v = parseInt(inputs[j]);
        map[i].push(v);
    }
    map[i].unshift(1);
    map[i].push(1);
}
map.unshift(delim);
map.push(delim);

for (let i = 1; i < H + 1; i++) {
    for (let j = 1; j < W + 1; j++) {
        if ((map[i][j] === 0))
        {
            let sum = map[i-1][j-1] + map[i-1][j] + map[i-1][j+1] +
                        map[i][j-1] + map[i][j] + map[i][j+1] +
                        map[i+1][j-1] + map[i+1][j] + map[i+1][j+1];
            if (sum === 8)
            {
                print(j-1,i-1);
            }
        }
    }
}