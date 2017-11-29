
var storeDistanceProgression = [];
function calcFitness()
{
  var currentRecord = Infinity;
  /* loop through the entire population */
  for (var i = 0; i < population.length; i++)
  {
    // what is the distance first
    // pass in cities and the population
    var d = calculateDistanceBetweenTwoPoints(cities, population[i]);


    if (d < recordDistance)
    {
      recordDistance = d;
      bestEver = population[i];
    }
    if (d < currentRecord)
    {
      currentRecord = d;
      currentBest = population[i];
    }
    fitness[i] = 1 / (d + 1);
    //console.log("The best is " + currentBest);
  }

  console.log("The distance is " + recordDistance);
  storeDistanceProgression.push(recordDistance);

  console.log(storeDistanceProgression);
}


function normalizeFitness()
{
  // fitness values to be mapped to a probalility to 0-100
  var sum = 0;
  for (var i = 0; i < fitness.length; i++)
  {
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

      var orderA = pickOne(population, fitness);
      //console.log("Order A " + orderA);
      var orderB = pickOne(population, fitness);
      //console.log("Order B " + orderB);

      var order = crossOver(orderA, orderB);
      //console.log("After crossoveer " + order);


      newPopulation[i] = order;
      mutate(order, 0.02);
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
function pickOne(list, prob)
{
//console.log("the " + list + "probalility " + prob);
  var index = 0;
  var r = Math.random();

  while (r > 0)
  {
    r = r - prob[index];
    index++;
  }
  index--;
  //console.log("u " + list[index]);

  return list[index].slice();

}
// evolve
function crossOver(orderA, orderB)
{
  //added
  //var start = Math.floor(Math.random(orderA.length));
  var start = Math.floor(Math.random() * orderA.length);

  //var start = Math.floor(Math.random() * myArray.length);
  //var end = Math.floor(Math.random(start + 1, orderA.length)); // + as slice will return 0 if .slice(3,3)
  //var end = Math.floor(Math.random() + start + 1 * orderA.length));

  var temp = start + 1;

  var end = Math.floor(Math.random() * orderA.length) + temp;


  var newOrder = orderA.slice(start, end);
  // loop through order b
  for (var i = 0; i < orderB.length; i++)
  {

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
  for (var i = 0; i < totalCities; i++)
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
function what()
{
  console.log(squash(storeDistanceProgression));
}
