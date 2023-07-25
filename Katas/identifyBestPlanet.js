//solution for https://www.codewars.com/kata/6474b8964386b6795c143fd8/javascript
function bestPlanet(solarSystem, maxSize) {
    const REQUIRED_ELEMENTS = ['H', 'C', 'N', 'O', 'P', 'Ca'];
    let largestPlanet = '';

    let smallEnoughPlanets = [];
    //iterate through solarSystem array and remove every planet that is larger than maxSize
    solarSystem.forEach(planet => {
        let planetSize = parseInt(planet.split('_')[1]);
        if (planetSize <= maxSize) {
            smallEnoughPlanets.push(planet);
        }
    });

    let habitablePlanets = [];

    //iterate through solarSystem array and remove every planet that does not contain all of the required elements
    smallEnoughPlanets.forEach(planet => {
        let planetElements = planet.split('_')[0].split(/(?=[A-Z])/);
        let containsAllElements = true;

        REQUIRED_ELEMENTS.forEach(element => {
            if (!planetElements.includes(element)) {
                containsAllElements = false;
            }
        });

        if (containsAllElements) {
            habitablePlanets.push(planet);
        }
    });

    //iterate through solarSystem array and find the planet with the largest size
    habitablePlanets.forEach(planet => {
        if (largestPlanet === '') {
            largestPlanet = planet;
        } else {
            let planetSize = parseInt(planet.split('_')[1]);
            if (planetSize > parseInt(largestPlanet.split('_')[1])) {
                largestPlanet = planet;
            }
        }
    });

    return largestPlanet;
}
