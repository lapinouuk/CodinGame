/*
CodinGame MediumPuzzle : Sponsored

ANEO SPONSORED PUZZLE

Driving your car, you enter a section of road and you plan to rest entirely on your cruise control to cross the area without having to stop or slow down.

The goal is to find the maximum speed (off speeding) that will allow you to cross all the traffic lights to green.

Score, get contacted, and grab the chance to meet the ANEO tech team.
*/

/**
Algorithm coded :
- Get each speed allowed for each traffic light from speed = max to 1, and from 1 to 10 000
  rotations.
- Check which speed allowed for the first traffic light matches with the other traffic lights
  from speed max allowed to the last one calculated. 
- Print the first speed match.
**/

function compSpeed(arrSpeeds) {
    /**
     * Compare the speed of the first traffic light with the other one
     * Enter: arrSpeeds, the list of speeds allowed for each traffic lights
     * Return: the first speed which matches all traffic lights
    **/
    
    for (let i = 0; i < arrSpeeds[0].length; i++) {
        let bool = true;
        let j = 1;
        while ((bool === true) && (j < arrSpeeds.length)) {
            if (arrSpeeds[j].indexOf(arrSpeeds[0][i]) === -1) {
                bool = false;
            }
            j++;
        }
        if (bool === true) {
            return arrSpeeds[0][i];
        }
    } 
}

function isLightOn(speed, dist, time) {
    /**
     * Calculate for each speeds if its allowed or not
     * Enter: speed, max speed allowed; dist, distance to the light; time, rotation time
     * Return: a list of allowed speeds for a traffic light given
    **/
    
    let speedOk = [];
    // j -> Going through all speed, begining by the maximum
    for (let j = speed; j > 0; j--) {
        // i -> Number of changes of the light
        for (let i = 0; i < 10000; i++) {
            let tTravel = dist / (j/3600*1000);
            let tOnLight = Math.round(tTravel / time*1000)/1000;
            if (i <= tOnLight && (i+1) > tOnLight) {
                speedOk.push(j);
            }
            i++;
        }
    }
    return speedOk
}

const speed = parseInt(readline());
const lightCount = parseInt(readline());
let speedsOk = [];

for (let i = 0; i < lightCount; i++) {
    var inputs = readline().split(' ');
    const distance = parseInt(inputs[0]);
    const duration = parseInt(inputs[1]);
    
    speedsOk.push(isLightOn(speed, distance, duration));
}
print(compSpeed(speedsOk));