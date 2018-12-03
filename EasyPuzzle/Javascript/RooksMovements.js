/*

CodinGame EasyPuzzle

ROOKS MOVEMENTS
By Cr3aHal0

Goal
In chess, the board is split in 8 rows and 8 columns. Considering the view of the game to be from the white side, the utmost top left cell is called a8 and the utmost top rightcell is called h8. Decreasing from top to bottom of the chessboard, the utmost down left cell is then called a1 and the utmost down right cell is called h1. 

A rook is a piece than can move as many cells as it want to vertically or horizontally. A rook can't go past an ally unit but can replace an opponent one.

Each position must be a valid chessboard-position notation (Algebraic notation) such that it is identified by a column identifier from a to h and a row identifier from 1 to 8.

Given a white rook and a set of chess pieces that can be yours (white) or not (black), print all available movements for the rook in the current configuration.
*/

const rookPosition = readline();
const nbPieces = parseInt(readline());

let pion = rookPosition;
let piecesCoord = [];
let board = [];
let trad = {"a" : 0, "b" : 1, "c" : 2, "d" : 3, "e" : 4, "f" : 5, "g" : 6, "h" : 7};
let tradY = {8 : 0, 7 : 1, 6 : 2, 5 : 3, 4 : 4, 3 : 5, 2 : 6, 1 : 7}

// Create the board game
for (let i = 0; i < 8; i ++) {
    board[i] = [];
    for (let j = 0; j < 8; j++) {
        board[i][j] = ".";
    }
}

// Function indexOf for associative table (object)
function indexMatch(arr, val) {
    for (let key in arr) {
        if (arr[key] === val) {
            return key;   
        }
    }
}

// Function to replace a8 coordinate into [x, y] understandable for the array
function remplaceur(correspondance, p1, p2) {
    let x = trad[p1];
    let y = Math.abs(p2 - 8);
    return [x, y];
}

// Replace the coordinate of the starting point
pion = pion.replace(/(\w)(\d)/, remplaceur);
board[pion[2]][pion[0]] = "R";

// Initialization of the board with the pion settled
for (let i = 0; i < nbPieces; i++) {
    var inputs = readline().split(' ');
    const colour = parseInt(inputs[0]);
    const onePiece = inputs[1];
    let pionI = onePiece;
    
    pionI = pionI.replace(/(\w)(\d)/, remplaceur);
    board[pionI[2]][pionI[0]] = colour;
}

// Check moving ability of rook
let moves = [];

for (let i = 0; i < 4; i++) {
    let x = 0;
    let y = 0;
    let bool = true;
    
    while (bool) {
        switch (i) {
            case 0:
                y--;
                break;
            case 1:
                x++;
                break;
            case 2:
                y++;
                break;
            case 3:
                x--;
                break;
        }
        let xR = Number(pion[0]) + x;
        let yR = Number(pion[2]) + y;

        let limX = (xR < 8 && xR >= 0);
        let limY = (yR < 8 && yR >= 0);

        if (limX && limY) {
            if (board[yR][xR] === ".") {
                moves.push(['-', xR, yR]);        
            } else if (board[yR][xR] === 0) {
                bool = false;
            } else if (board[yR][xR] === 1) {
                moves.push(['x', xR, yR]);
                bool = false;
            }
        } else {
            bool = false;
        }
    }
}

// Organizing, sorting, printing data
moves.forEach(function(move) {
    move[1] = indexMatch(trad,move[1]);
    move[2] = indexMatch(tradY,move[2]);
    })
let moveSort = [];
moves.forEach(move => moveSort.push("R" + rookPosition + move.join('')));
moveSort.sort();
moveSort.forEach(move => print(move));