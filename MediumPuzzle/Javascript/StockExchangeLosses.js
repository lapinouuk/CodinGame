/*
CodinGame MediumPuzzle

STOCK EXCHANGE LOSSES

Goal
A finance company is carrying out a study on the worst stock investments and would like to acquire a program to do so. The program must be able to analyze a chronological series of stock values in order to show the largest loss that it is possible to make by buying a share at a given time t0 and by selling it at a later date t1. The loss will be expressed as the difference in value between t0 and t1. If there is no loss, the loss will be worth 0.
 	Game Input
Input
Line 1: the number n of stock values available.

Line 2: the stock values arranged in order, from the date of their introduction on the stock market v1 until the last known value vn. The values are integers.

Output
The maximal loss p, expressed negatively if there is a loss, otherwise 0.
Constraints
0 < n < 100000
0 < v < 231
*/

const n = parseInt(readline());
var inputs = readline().split(' ');

let data = [];
let dataS = [];
let test = true;

for (let i = 0; i < n; i++) {
    const v = parseInt(inputs[i]);
    data.push(v);    
}
let i = 0;
while (i < n) {
    max = data[i];
    min = data[i+1];
    test = true;
    while ((max >= min) && (test === true) && (i < n)) {
        i++;
        if (data[i+1] <= min) {
            min = data[i+1];
        } else if (data[i+1] <= max) {
        
        } else if (data[i+1] > max) {
            test = false;
        }      
    }
    if (max > min) {
        let diff = max - min;
        dataS.push(diff);
    } else {
        i++;    
    }
}
if (dataS.length > 0) {
    print(-1*(Math.max(...dataS)));
} else {
    print(0);
}