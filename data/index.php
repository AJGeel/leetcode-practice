<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Fetching &amp; Visualization</title>
    <link rel="stylesheet" href="../style.min.css">
  </head>
  <body>

    <?php include('../back.php') ?>

    <main>
      <article class="intro">
        <h1>Data Fetching &amp; Visualization</h1>
        <p><b>Prompt:</b> retrieve a list of numbers from an endpoint, then plot a histogram showing the frequency of each number in the list. The histogram should have appropriately numbered x and y axes.</p>
        <p>Source: <a class="link" target="_blank" href="https://www.reddit.com/r/webdev/comments/hyuznw/i_wanted_to_share_some_front_end_practice/">/u/jayrobin on Reddit</a>
      </article>
      <article class="solution">
        <h1>Solution</h1>
        <canvas class="graph" id="graph" width="400" height="200"></canvas>

        <div class="button-group">
          <button type="button" name="fetchBtn" onclick="onceMore()">Fetch New Data!</button>
          <button class="secondary" type="button" name="newEndpointBtn" onclick="newEndpoint()">I want a new endpoint 🤔</button>
        </div>
      </article>
      <article class="extensions">
        <h1>Possible Extensions</h1>
        <ul>
          <li class="checked">Ensure your histogram displays correctly with extremes, e.g. how does it handle very high frequencies of a single number, what about negative numbers?</li>
          <li class="checked">Use different colors for each bar in the histogram.</li>
          <li class="checked">Add a button to refetch/regenerate the data (the endpoint will return random numbers each time)</li>
          <li class="checked">On hovering over a bar in the histogram, change the color and show a label above the bar with the precise value</li>
          <li class="checked">You may notice that the random.org URL takes query parameters that will change the numbers generated: include a form that will dynamically generate the URL to provide a different set of numbers (e.g. more numbers, min/max value)</li>
        </ul>
      </article>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" charset="utf-8"></script>
    <script src="app.js" charset="utf-8"></script>

  </body>
</html>
