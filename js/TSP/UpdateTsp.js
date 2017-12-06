/*
   Our Variables
*/

var cities = [];
var populationSize = 100;
var population = [];
var fitness = [];
var recordDistance = Infinity;
var bestEver;
var currentBest;
var order = [];
var counter;
/*
    TEMP ARRAY
*/
var cityDistancesArray = [
    // set the users location to 0,0 for starting point
    [0, 0],
    [53.515333, -6.190796],
    [53.342686, -6.403656],
    [53.342686, -6.303406],
    [53.334486, -6.557465],
    [51.678091, -9.624023],
    [52.768293, -1.560059]
];
var totalCities = cityDistancesArray.length;



// City creation function
/*
    This function creates a city with long and lat
*/

function City(longitude, latitude)
{
    this.latitude = latitude;
    this.longitude = longitude;
}
makeCities(cityDistancesArray);
function makeCities(cityDistancesArray)
{
       //Make our city objects
    for (var i = 0; i < cityDistancesArray.length; i++)
    {
        //for the length of the array{
        // iterate the longs
        for (var x = 0; x < cityDistancesArray.length; x++)
        {
            var city = new City (cityDistancesArray[i][0], cityDistancesArray[i][1]);
            cities[i] = city;
            order[i] = i;
        }
    }
    // We make our population and shuffle the order
    for (var n = 0; n < populationSize; n++)
    {
        population[n] = order.slice();

        shuffle(population[n]);

        //console.log(population);
    }

    startAlgorithim();
}

// Starting function
/*
    This function takes in an 2d array of longs and lats of our city
    then it intialises our variable and runs the algorithim
*/
//startAlgorithim(cityDistancesArray);

function startAlgorithim()
{
   var a = performance.now();

   //console.log("Population is " + population);
   for(var i = 0; i < 250; i++)
   {
    // We calculate the fitness
    calcFitness();
    // We then normalize the fitness
    normalizeFitness();
    // Call next generation
    nextGeneration();
    // Print out the bestever
    //console.log(currentBest);
    console.log("current best " + currentBest);
    console.log("Travel to the following points " + bestEver);
    console.log("Distance " + recordDistance + " kilometers");
    what();
  }
  var b = performance.now();
  console.log("Took " + (b-a) + " miliseconds");
  //alert('It took ' + (b - a) + ' ms.');

  let finalArray = bestEver.map(i => cityDistancesArray[i]);

  console.log(finalArray);

}

// CALCULATE THE DISTANCE BETWEEN TWO CITIES
/*
    This function takes in points and the current order
    then it calculate the distance by calling another
    function to calulcate the haversine distance
    between two points
*/
/* 02345 */
/* Think theres a problem here */
// The haversine is working

function calculateDistanceBetweenTwoPoints(points, order)
{
    var returnedDistance = 0;
    for (var i = 0; i < order.length - 1; i++)
    {
        var cityAIndex = order[i];
        var cityBIndex = order[i + 1];
        var cityAlat = points[cityAIndex].latitude;
        var cityAlon = points[cityAIndex].longitude;

        var cityBlat = points[cityBIndex].latitude;
        var cityBlon = points[cityBIndex].longitude;

        var d = calculateHaversine(cityAlat, cityAlon, cityBlat, cityBlon);
        returnedDistance += d;
    }
    return returnedDistance;
}


// Calculate distances using haversine
/*
    This function takes in a long lat pair coordinates
    and the outputs the distances in kilometers

    This function is based on the code located here
    https://stackoverflow.com/questions/27928/calculate-distance-between-two-latitude-longitude-points-haversine-formula

    Also the conversion to radians is also from this link
*/
function calculateHaversine(lat1,lon1,lat2,lon2)
{
  var R = 6371;
  var dLat = deg2rad(lat2-lat1);
  var dLon = deg2rad(lon2-lon1);
  var a =
    Math.sin(dLat/2) * Math.sin(dLat/2) +
    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
    Math.sin(dLon/2) * Math.sin(dLon/2);

  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
  var d = R * c;
  return d;
}
// Function to convert to radians
function deg2rad(deg)
{
  return deg * (Math.PI/180)
}


// Remove duplication of distances
/*
    This function basically removes distances in our
    stored distances array so we can clearly see the
    the progression of our distances getting smaller
*/
function squash(arr)
{
      var tmp = [];
      for(var i = 0; i < arr.length; i++){
          if(tmp.indexOf(arr[i]) == -1){
          tmp.push(arr[i]);
          }
      }
      return tmp;
}


// Swapping elements around
/*
    This function basically swaps our elements around for more
    diversity
*/
function swap(a, i, j)
{
    var temp = a[i];
    a[i] = a[j];
    a[j] = temp;
}
// Shufk=fle Function
/*

This function takes in a array and shuffles the order randomly

*/

function shuffle(array)
{
    let counter = array.length;

    // While there are elements in the array
    while (counter > 0)
     {
        // Pick a random index
        let index = Math.floor(Math.random() * counter);

        // Decrease counter by 1
        counter--;

        // And swap the last element with it
        let temp = array[counter];
        array[counter] = array[index];
        array[index] = temp;
    }

    return array;
}
