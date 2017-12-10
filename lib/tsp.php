<?php
/*
 ====== Also need to comvert the output of the TSP as a json =====
*/
/*
This file grabs the longitudes and latitudes from the database
and then converts them into a 2D array and calls the algorithim

NOTE: Need to change fname and lname to the longitudes and latitudes
*/
    require_once 'config.php';

    $arr = array();
    $query = ("SELECT * FROM patient_table");
    $result = $DBcon->query($query);

    //echo $query;
 $i=0;
    while($row = mysqli_fetch_array($result)) {

        $arr[$i] = array($row['patient_fname'],$row['patient_lname']);
        $i++;

    }

?>

<script>


/*

    var js_json = <?php echo json_encode($arr)?>;
    var cityDistancesArray = [];

    for(var i = 0; i<js_json.length;i++){
        cityDistancesArray.push(js_json[i]);
    }

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
var storeDistanceProgression = [];

/*
    TEMP ARRAY
*/
var cityDistancesArray = [
//     // set the users location to 0,0 for starting point
//     [0, 0],
//     [53.515333, -6.190796],
//     [53.342686, -6.403656],
     [53.342686, -6.303406],
     [53.334486, -6.557465],
   [51.678091, -9.624023],
     [52.768293, -1.560059],
     [59.249033,-154.335938],
     [-40.338170,171.914063]
];
//var totalCities = cityDistancesArray.length;
makeCities(cityDistancesArray);

//console.log(totalCities);


// City creation function
/*
    This function creates a city with long and lat
    It creates a City object that has a latitude and longitude
*/

function City(latitude,longitude)
{
    this.latitude = latitude;
    this.longitude = longitude;
}
function makeCities(cityDistancesArray)
{
       //Make our city objects
    for (var i = 0; i < cityDistancesArray.length; i++)
    {
        //for the length of the array{
        // iterate the longs
        for (var x = 0; x < cityDistancesArray.length; x++)
        {
          // mapping lat long to new city and then numbering them
            var city = new City (cityDistancesArray[i][0], cityDistancesArray[i][1]);
            cities[i] = city;
            order[i] = i;
        }
    }
    // We make our population and shuffle the order
    for (var n = 0; n < populationSize; n++)
    {
      // Shuffle the population the number of times based on size
        population[n] = order.slice();

        shuffle(population[n]);

        //console.log(population);
    }
    // start the algorithim
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
  console.log("Best" + bestEver);
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
function calcFitness()
{
  var currentRecord = Infinity;
  /* loop through the entire population */
  for (var i = 0; i < population.length; i++)
  {
    // what is the distance first
    // pass in cities and the population
    var d = calculateDistanceBetweenTwoPoints(cities, population[i]);

    // if the distance between the two points is less then the record distance then
    // set the new record to d and set bestever to the population at that index
    if (d < recordDistance)
    {
      recordDistance = d;
      bestEver = population[i];
    }
    if (d < currentRecord)
    {
      // Track the currents
      currentRecord = d;
      currentBest = population[i];
    }

    fitness[i] = 1 / (Math.pow(d, 8) + 1);
    //console.log("The best is " + currentBest);
  }

  console.log("The distance is " + recordDistance);
  // Store distance to this array just for analytics purposes
  storeDistanceProgression.push(recordDistance);

  console.log(storeDistanceProgression);
}


function normalizeFitness()
{
  // fitness values to be mapped to a probalility to 0-100
  var sum = 0;
  for (var i = 0; i < fitness.length; i++)
  {
    // Total fitness - We want it to map to 0-100 percent
    // So to add to 100 percent fitness
    sum += fitness[i];
  }
  for (var i = 0; i < fitness.length; i++)
  {
    fitness[i] = fitness[i] / sum;
  }
}

/*
create a new order based on fitness
*/
var c = 0;

function nextGeneration()
{

    var newPopulation = [];
    for (var i = 0; i < population.length; i++)
    {
      // pick member according to fitness values

      var orderA = pickOne(population, fitness);
      //console.log("Order A " + orderA);
      var orderB = pickOne(population, fitness);
      //console.log("Order B " + orderB);

      var order = crossOver(orderA, orderB);
      //console.log("After crossoveer " + order);

      mutate(order, 0.02);

      newPopulation[i] = order;
      //console.log(newPopulation);
    }
    console.log("What " + newPopulation);
    population = newPopulation;

    console.log("distance : " + currentBest);
    // squash duplicates of distances
    console.log("Well hello there " + squash(storeDistanceProgression));
}
/*
pick random number from 0 to 1 - 0.8 = 80percent
*/
/*
  0912 - 70
  2344 - 20
  1345 - 10
  pick random number between 0-1, 70 percent of the time will land at 0912
*/
function pickOne(list, prob)
{
//console.log("the " + list + "probalility " + prob);
// assume index at 0
// pick 0-1.0
  var index = 0;
  var r = Math.random();
// as long as r is greater then 0
  while (r > 0)
  {
    // r is minus the probalility of that index
    /*
      If i had a .9 and .1 , pick random from 0-1 and subtract .9 from it
      as it is first, subtract .9 from it how often 0-1 subtract .9 so 90 percent
    */
    r = r - prob[index];
    index++;
  }
  // back up one ie if .8 and -9 and say index + 1 left at 1 but need 0
  index--;
  //console.log("u " + list[index]);

  return list[index].slice();

}
// evolve

function crossOver(orderA, orderB)
{
  //added
  //var start = Math.floor(Math.random(orderA.length));

  /*
    We get a random part of the array and then get next one
  */

  var start = Math.floor(Math.random() * orderA.length);

  //var start = Math.floor(Math.random() * myArray.length);
  //var end = Math.floor(Math.random(start + 1, orderA.length)); // + as slice will return 0 if .slice(3,3)
  //var end = Math.floor(Math.random() + start + 1 * orderA.length));

  var temp = start + 1;

  var end = Math.floor(Math.random() * orderA.length) + temp;

  /* this is our new array from cross over */
  var newOrder = orderA.slice(start, end);
  // loop through order b
  //
  for (var i = 0; i < orderB.length; i++)
  {
    // if the new order includes city then dont push else push
    var city = orderB[i];
    // if new order includes city
    if (!newOrder.includes(city))
    {
      // push it to new order
      newOrder.push(city);
    }
  }
  return newOrder;
}

function mutate(order, mutationRate)
{
  // Mutate based on a giving mutationRate
  // as long as the number of cities has not reached total cities
  // and the result from math random is less then mutationRate
  // then shuffle the order
  for (var i = 0; i < order; i++)
  {
    if (Math.random() < mutationRate)
    {
      var indexA = Math.floor(Math.random() * order.length);
      var indexB = Math.floor(Math.random() * order.length);

      swap(order, indexA, indexB);
    }
  }
}
function squash(arr)
{
      var tmp = [];
      for(var i = 0; i < arr.length; i++)
      {
          if(tmp.indexOf(arr[i]) == -1)
          {
            tmp.push(arr[i]);
          }
      }
      return tmp;
}

// All distances
// for testing
function what()
{
  console.log(squash(storeDistanceProgression));
}



</script>
