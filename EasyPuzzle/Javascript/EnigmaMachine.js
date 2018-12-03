/*
CodinGame EasyPuzzle

ENCRYPTION/DECRYPTION OF ENIGMA MACHINE
By SudeepMukherjee

Goal
During World War II, the Germans were using an encryption code called Enigma – which was basically an encryption machine that encrypted messages for transmission. The Enigma code went many years unbroken. Here How Basic Machine works:

First Caesar shift is applied using an incrementing number.
If AAA and starting number is 4 then output will be EFG. 
A + 4 = E
A + 4 + 1 = F
A + 4 + 1+ 1 = G
Now EFG from 1st Motor such as "ABCDEFGHIJKLMNOPQRSTUVWXYZ" --> "BDFHJLCPRTXVZNYEIWGAKMUSQO"
so EFG become "JLC". Then it is passed through 2 more rotors to get final value.
If the second ROTOR is "AJDKSIRUXBLHWTMCQGZNPYFVOE", we apply the substitution step again thus:
ABCDEFGHIJKLMNOPQRSTUVWXYZ
AJDKSIRUXBLHWTMCQGZNPYFVOE
So "JLC" becomes "BHD".

If the third ROTOR is "EKMFLGDQVZNTOWYHXUSPAIBRCJ", then the final substitution is "BHD" becoming "KQF".
Final Output is sent via Radio Transmitter.
*/

const operation = readline();
const pseudoRandomNumber = parseInt(readline());
const alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
let nb = pseudoRandomNumber;
let rot = [];

for (let i = 0; i < 3; i++) {
    const rotor = readline();
    rot.push(rotor);    
}
const message = readline();
let messTable = message.split('');

if (operation === "ENCODE")
{
    let messTable2 = messTable.map(function(e) {
        let nbI = alphabet.indexOf(e)+nb;
        while (nbI > 25)
        {
            nbI -= 26;
        }
        let r = alphabet[nbI];
        nb++;
        return r;
        });

    for (let i = 0; i < 3; i++)
    {
        messTable2 = messTable2.map(function(e) {
        let r = rot[i][alphabet.indexOf(e)];
        return r;
        })
    }
    print(messTable2.join(""));
}
else if (operation === "DECODE")
{
    let messTable2 = messTable;
    
    for (let i = 2; i >= 0; i--)
    {
        messTable2 = messTable2.map(function(e) {
        let r = alphabet[rot[i].indexOf(e)];
        return r;
        })
    }
    
    messTable2 = messTable2.map(function(e) {
    let nbI = alphabet.indexOf(e)-nb;
    while (nbI < 0)
    {
        nbI += 26;
    }
    let r = alphabet[nbI];
    nb++;
    return r;
    });
    
    print(messTable2.join(""));
}