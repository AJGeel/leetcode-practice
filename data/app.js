/*--------------------------------------------------
           DOM Calls and Global Vars
---------------------------------------------------*/

// The endpoint we will be accessing
let endpoint = 'https://www.random.org/integers/?num=200&min=1&max=10&col=1&base=10&format=plain&rnd=new';
let dataset = {
  raw: [],
  count: {
    1: 0,
    2: 0,
    3: 0,
    4: 0,
    5: 0,
    6: 0,
    7: 0,
    8: 0,
    9: 0,
    10: 0
  }
}

// Get DOM item for chart
const ctx = document.getElementById('graph').getContext('2d');


/*--------------------------------------------------
                     Functions
---------------------------------------------------*/






async function fetchText(url) {

  let response = await fetch(url);
  // console.log(response.status); // 200

  if (response.status === 200) {
    // Handle data
    let data = await response.text();

    // Create object to store data buffer
    let dataBuffer = "";
    dataBuffer += data;

    // Split databuffer on line breaks
    dataBuffer = dataBuffer.split(`\n`);

    // Add these to our dataset array
    for (i=0; i<dataBuffer.length; i++) {
      dataset.raw[i] = dataBuffer[i];
    }

    // Check all counts of 1 through 10
    for (i=1; i<11; i++) {
      // Update dataset object with this data
      dataset.count[i] = dataset.raw.occurrence(`${i}`);

      // Push these changes to the Chart
      addData(frequencyChart, i, dataset.count[i]);
    }

    // Update the chart object with this dataset

  }
}

function onceMore() {
  // Clear the graph before pushing new data
  for (i=0; i<100; i++) {
    removeData(frequencyChart);
  }

  // Check if Endpoint still is valid
  if (endpoint != 'https://www.random.org/integers/?num=200&min=1&max=10&col=1&base=10&format=plain&rnd=new') {
    endpoint = 'https://www.random.org/integers/?num=200&min=1&max=10&col=1&base=10&format=plain&rnd=new';
  }

  // Get the data once again.
  fetchText(endpoint);
}

function newEndpoint() {
  let newNum = prompt("How many numbers would you like instead? (Between 1 and 10000)", "1337");

  if (isNaN(newNum)) {
    alert('Please enter a number');
  } else if (newNum < 0) {
    alert('Please enter a non-negative integer');
  } else if (newNum > 10000) {
    alert('Please enter a number that is less than 10,000.');
  } else {
    // User input is valid. Update endpoint, then update chart
    endpoint = `https://www.random.org/integers/?num=${newNum}&&min=1&max=10&col=1&base=10&format=plain&rnd=new`;

    for (i=0; i<100; i++) {
      removeData(frequencyChart);
    }

    fetchText(endpoint);
  }
}

function addData(chart, label, data) {
    chart.data.labels.push(label);
    chart.data.datasets.forEach((dataset) => {
        dataset.data.push(data);
    });
    chart.update();
}

function removeData(chart) {
    chart.data.labels.pop();
    chart.data.datasets.forEach((dataset) => {
        dataset.data.pop();
    });
    chart.update();
}

// Array function to count occurrences in arrays
Array.prototype.occurrence = function(val) {
  return this.filter(e => e === val).length;
}







/*--------------------------------------------------
                OnLoad Functions
---------------------------------------------------*/

// Create FrequencyChart Object
let frequencyChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [],
        datasets: [{
            label: 'Frequency',
            data: [],
            backgroundColor: [
                'hsla(0, 75%, 70%, 0.2)',
                'hsla(36, 75%, 70%, 0.2)',
                'hsla(72, 75%, 70%, 0.2)',
                'hsla(108, 75%, 70%, 0.2)',
                'hsla(144, 75%, 70%, 0.2)',
                'hsla(180, 75%, 70%, 0.2)',
                'hsla(216, 75%, 70%, 0.2)',
                'hsla(252, 75%, 70%, 0.2)',
                'hsla(288, 75%, 70%, 0.2)',
                'hsla(324, 75%, 70%, 0.2)',
            ],
            borderColor: [
              'hsla(0, 75%, 70%, 1)',
              'hsla(36, 75%, 70%, 1)',
              'hsla(72, 75%, 70%, 1)',
              'hsla(108, 75%, 70%, 1)',
              'hsla(144, 75%, 70%, 1)',
              'hsla(180, 75%, 70%, 1)',
              'hsla(216, 75%, 70%, 1)',
              'hsla(252, 75%, 70%, 1)',
              'hsla(288, 75%, 70%, 1)',
              'hsla(324, 75%, 70%, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

// Fetch data from API, update chart with it
fetchText(endpoint);
