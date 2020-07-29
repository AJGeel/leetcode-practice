<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Snake</title>
    <link rel="stylesheet" href="../style.min.css">
  </head>
  <body>

    <?php include('../back.php') ?>

    <main>
      <article class="intro">
        <h1>Snake</h1>
        <p><b>Prompt:</b> Create a Snake game (example) that meets the following requirements:</p>
        <ul style="margin-bottom: 1rem;">
          <li>15x15 grid.</li>
          <li>Snake should be controlled with cursor keys (or WASD if you prefer).</li>
          <li>Snake should start with a length of 3.</li>
          <li>One apple at a time should appear in a random position on the grid. When collected, it should increase the score by one, increase the snake length by one, and change to another random position.</li>
          <li>Display a score for how many apples have been collected.</li>
          <li>If the snake head collides with the rest of the body, the game should end.</li>
          <li>If the snake head collides with the borders, the game should end.</li>
        </ul>
        <p>Source: <a target="_blank" href="https://www.reddit.com/r/webdev/comments/hyuznw/i_wanted_to_share_some_front_end_practice/">/u/jayrobin on Reddit</a>
      </article>
      <article class="solution">
        <h1>Solution</h1>
        <canvas class="graph" id="snake" width="400" height="200"></canvas>

      </article>
      <article class="extensions">
        <h1>Possible Extensions</h1>
        <ul>
          <li>When the game is over, display a game over message with the score and allow the user to press space to restart.</li>
          <li>As well as the current score, display the player's high score (you could also persist this with localStorage.</li>
          <li>Before the game starts, display an intro message (e.g. game title, controls, high score) and wait for the player to press a key.</li>
          <li>Consider ways to increase the difficulty over time (or add selectable difficulty modes): increasing the speed of the snake, adding random obstacles.</li>
          <li>At this point, you have a pretty complete game: congratulations!</li>

        </ul>
      </article>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" charset="utf-8"></script>
    <script src="app.js" charset="utf-8"></script>

  </body>
</html>
