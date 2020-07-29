/*--------------------------------------------------
           DOM Calls and Global Vars
---------------------------------------------------*/

// Make DOM call to find Carrousel image
let carrouselIMG = document.querySelector('.carrousel__image');
let carrouselCaption = document.querySelector('.carrousel__caption');

// Carrousel object, contains all variables that power the functionality
let carrousel = {
  images: [],
  captions: [],
  index: 0,
  paused: false,
  justChanged: false,
  endpoint: {
    pre: 'https://www.reddit.com/r/',
    subreddit: 'aww',
    response: '/top/.json?t=',
    time: 'all',
    url: ''
  }
}

let subredditDropdown = document.getElementsByName('subreddit')[0];
let timeDropdown = document.getElementsByName('time')[0];
let toggleAutoplayDOM = document.querySelector('.toggleAutoplay');


/*--------------------------------------------------
                     Functions
---------------------------------------------------*/

function fetchGET(url) {
  fetch(url)
  .then(res => res.json())
  .then(function(data) {

    // Clear old photos from the carrousel (if any)
    if (carrousel.images.length > 0 ) {
      carrousel.images.length = 0;
    }

    // Also clear the captions
    if (carrousel.captions.length > 0) {
      carrousel.captions.length = 0;
    }

    // Cycle through the responses we got
    for (i = 0; i < data.data.children.length; i++) {
      let selection = data.data.children[i].data.url_overridden_by_dest;
      if (selection.includes(".jpg")) {
        // Only add .jpg items
        carrousel.images.push(selection);

        // Also add their captions
        carrousel.captions.push(data.data.children[i].data.title);
      }
    }

    console.log('Fetch request done.');
    updateCarrousel();
  })
}

function changeImage(direction) {
  // Temporarily stop the carrousel from auto changing.
  carrousel.justChanged = true;

  // Determine which direction the change is
  if (direction === 'next') {
    // Check how the index should be changed
    if (carrousel.index >= carrousel.images.length - 1) {
      carrousel.index = 0;
    } else {
      carrousel.index++;
    }

  } else if (direction === 'prev') {
    // Check how the index should be changed
    if (carrousel.index > 0) {
      carrousel.index--;
    } else {
      carrousel.index = carrousel.images.length-1;
    }
  }

  // Finally, update the Carrousel image source
  updateCarrousel();
}

// Updates img and caption in the carrousel
function updateCarrousel() {
  // Update IMG
  carrouselIMG.src = carrousel.images[carrousel.index];

  // Update IMG parent href
  carrouselIMG.parentNode.href = carrousel.images[carrousel.index];

  // Update caption
  carrouselCaption.innerHTML = carrousel.captions[carrousel.index];
}

// Updates a component of the endpoint object with a value
function updateEndpoint(component, value) {
  if (component === 'subreddit') {
    carrousel.endpoint.subreddit = value;
  } else if (component === 'time') {
    carrousel.endpoint.time = value;
  }

  // Afterwards: update the resulting url
  updateFullUrl();

  // Then, refresh the image selection of the Carrousel
  fetchGET(carrousel.endpoint.url);
}

// Updates full URL with the specified params
function updateFullUrl() {
  const ce = carrousel.endpoint;

  ce.url = ce.pre + ce.subreddit + ce.response + ce.time;
}

function autoUpdateCarrousel() {
  // Only get the next image if there are multiple
  if (carrousel.images.length > 1) {
    // Also: don't
    if (!carrousel.paused) {
      if (!carrousel.justChanged) {
        changeImage('next');
      } else {
        // Skip one iteration
        carrousel.justChanged = false;
      }
    }
  }
}

function updateDropdown(ref) {
  // Update the endpoint URL with the newly changed ref.value for the ref.name
  updateEndpoint(ref.name, ref.value);
}

function toggleAutoplay() {
  if (carrousel.paused === false) {
    carrousel.paused = true;
    toggleAutoplayDOM.classList.add('inactive');
    toggleAutoplayDOM.innerHTML = 'Paused';
  } else {
    carrousel.paused = false;
    toggleAutoplayDOM.classList.remove('inactive');
    toggleAutoplayDOM.innerHTML = 'Autoplay';
  }
}


/*--------------------------------------------------
                EventListeners
---------------------------------------------------*/

subredditDropdown.addEventListener("change", function() {
  updateDropdown(this);
})

timeDropdown.addEventListener("change", function() {
  updateDropdown(this);
})

toggleAutoplayDOM.addEventListener("click", function() {
  toggleAutoplay();
})


/*--------------------------------------------------
                OnLoad Functions
---------------------------------------------------*/

updateFullUrl();
fetchGET(carrousel.endpoint.url);

// Every three seconds (if the condition holds), get the next image
setInterval(function() {
  autoUpdateCarrousel();
}, 5000)
