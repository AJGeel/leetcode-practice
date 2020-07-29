<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Carrousel</title>
    <link rel="stylesheet" href="../style.min.css">
  </head>
  <body>

    <?php include('../back.php') ?>

    <main>
      <article class="intro">
        <h1>Image Carrousel</h1>
        <p><b>Prompt:</b> create an image carousel that cycles through images fetched from an endpoint (displaying a new image every 3 seconds), and allows the user to skip to the next/previous image.</p>
        <p>Source: <a class="link" target="_blank" href="https://www.reddit.com/r/webdev/comments/hyuznw/i_wanted_to_share_some_front_end_practice/">/u/jayrobin on Reddit</a>
      </article>
      <article class="solution">
        <h1>Solution</h1>

        <div class="carrousel">
          <div class="carrousel__controls">
            <a href="#!" class="carrousel__prev" onclick="changeImage('prev')">&lt;</a>
            <a href="#!" class="carrousel__next" onclick="changeImage('next')">&gt;</a>
          </div>
          <a href="#" target="_blank">
            <img class="carrousel__image" src="placeholder.jpeg" width="400" height="400" alt="Carrousel image">
          </a>
          <div class="carrousel__caption">Your images are loading...</div>
        </div>

        <div class="sorting-options">
          <div class="option toggleAutoplay">Autoplay</div>
          <div class="option">
            <label for="subreddit">Showing posts from</label>
            <select class="dropdown" name="subreddit">
              <option value="aww" selected>Aww</option>
              <option value="graphic_design">Graphic Design</option>
              <option value="houseplants">Houseplants</option>
              <option value="nextfuckinglevel">Nextfuckinglevel</option>
            </select>
          </div>
          <div class="option">
            <label for="time">In time period</label>
            <select class="dropdown" name="time">
              <option value="all" selected>All Time</option>
              <option value="year">This Year</option>
              <option value="month">This Month</option>
              <option value="week">This Week</option>
              <option value="day">Today</option>
            </select>
          </div>
        </div>
      </article>
      <article class="extensions">
        <h1>Possible Extensions</h1>
        <ul>
          <li class="checked">When the user presses next/previous, make sure that the timer resets.</li>
          <li class="checked">After the last image, make sure the image cycles back to the first.</li>
          <li>Add image selector circles. The highlighted circle should have the same index of the current image, and the user should be able to click on a circle to jump to that image.</li>
          <li class="checked">Allow the user to select from a (static) list of subreddits to change the cycled images</li>
          <li class="checked">Allow the user to see top images from the day, week, month, year, or all time by dynamically appending a query param to the URL: e.g. https://www.reddit.com/r/aww/top/.json?t=day
(or t=week, t=month, t=year, t=all)</li>
        </ul>
      </article>
    </main>

    <script src="app.js" charset="utf-8"></script>

  </body>
</html>
