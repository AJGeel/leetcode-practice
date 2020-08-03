/*--------------------------------------------------
           DOM Calls and Global Vars
---------------------------------------------------*/

let stream = document.querySelector('.stream');

// Image stream object, contains all variables that power the functionality
let imgStream = {
  images: [],
  captions: [],
  endpoint: {
    pre: 'https://www.reddit.com/r/',
    subreddit: 'aww',
    response: '/top/.json?t=',
    time: 'all',
    url: ''
  }
}


/*--------------------------------------------------
                     Functions
---------------------------------------------------*/

function fetchGET(url) {
  fetch(url)
  .then(res => res.json())
  .then(function(data) {

    parseData(data);

    appendImages();

    console.log('Fetch request done.');
  })
}

function parseData(dataObj) {
  // Cycle through the responses we got
  for (i = 0; i < dataObj.data.children.length; i++) {
    let selection = dataObj.data.children[i].data;
    if (selection.url_overridden_by_dest.includes(".jpg")) {
      // add .jpg items
      imgStream.images.push(selection.url_overridden_by_dest);

      // Also add their captions
      imgStream.captions.push(selection.title);
    }
  }
}

function appendImages() {
  for (i = 0; i < imgStream.images.length; i++) {
    stream.insertAdjacentHTML('beforeend', `
      <div class="stream__image">
          <img src="${imgStream.images[i]}" width="400" height="400" loading="lazy"  alt="placeholder image">
          <p class="stream__caption">${imgStream.captions[i]}</p>
        </div>
    `)
  }
}

// Updates a component of the endpoint object with a value
function updateEndpoint(component, value) {
  if (component === 'subreddit') {
    imgStream.endpoint.subreddit = value;
  } else if (component === 'time') {
    imgStream.endpoint.time = value;
  }

  // Afterwards: update the resulting url
  updateFullUrl();

  // Then, refresh the image selection of the Carrousel
  fetchGET(imgStream.endpoint.url);
}

// Updates full URL with the specified params
function updateFullUrl() {
  const is = imgStream.endpoint;

  is.url = is.pre + is.subreddit + is.response + is.time;
}


/*--------------------------------------------------
                EventListeners
---------------------------------------------------*/


/*--------------------------------------------------
                OnLoad Functions
---------------------------------------------------*/

updateFullUrl();
fetchGET(imgStream.endpoint.url);
