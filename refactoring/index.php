<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refactoring UI — Components</title>
    <link rel="stylesheet" href="style.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Staatliches&display=swap" rel="stylesheet">
  </head>
  <body>

    <main>
      <article class="contacts">
        <h1>Contacts</h1>
        <div class="contacts__search">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          </svg>
          <input type="search" name="contactsSearch" placeholder="Search teams or members">
        </div>
        <div class="contacts__list">
          <div class="contacts__entry">
            <div class="contacts__status"></div>
            <h2 class="contacts__name">Tighten Co.</h2>
            <p class="contacts__type">Team</p>
          </div>
          <div class="contacts__entry">
            <div class="contacts__status online"></div>
            <h2 class="contacts__name">Taylor Otwell</h2>
            <p class="contacts__type">Member</p>
          </div>
          <div class="contacts__entry">
            <div class="contacts__status"></div>
            <h2 class="contacts__name">Adam Wathan</h2>
            <p class="contacts__type">Member</p>
          </div>
          <div class="contacts__entry">
            <div class="contacts__status"></div>
            <h2 class="contacts__name">Duke Street Studio Inc.</h2>
            <p class="contacts__type">Team</p>
          </div>
          <div class="contacts__entry">
            <div class="contacts__status online"></div>
            <h2 class="contacts__name">Jeffrey Way</h2>
            <p class="contacts__type">Member</p>
          </div>
        </div>
        <div class="contacts__actions">
          <button class="secondary" type="button" name="cancel">Cancel</button>
          <button class="primary" type="button" name="invite">Invite</button>
        </div>
      </article>

      <article class="modal">
        <div class="modal__header">
          <h1>Deactivate account</h1>
          <a href="#!" class="modal__close">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
              <line x1="18" y1="6" x2="6" y2="18"></line>
              <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
          </a>
        </div>
        <div class="modal__content">
          <p>Are your sure you want to deactivate your account? By doing this you will lose all of your saved data and will not be able to retrieve it.</p>
        </div>
        <div class="modal__actions">
          <button class="secondary" type="button" name="cancel">Cancel</button>
          <button class="primary" type="button" name="deactivate">Deactivate</button>
        </div>

      </article>

      <article class="card">
        <div class="card__hero">

        </div>
        <div class="">

        </div>

      </article>

      <article class="plans">
        <div class="plans__header">
          <h1>Change plan</h1>
          <button class="secondary" type="button" name="cancel">Cancel your plan</button>
        </div>
        <div class="plans__container">
          <a href="#!" class="plan active">
            <div class="plan__title">
              <h2>Hobby</h2>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check" alt="check icon">
                <polyline points="20 6 9 17 4 12"></polyline>
              </svg>
            </div>
            <p class="plan__details">1</p>
            <p class="plan__price">€<span>5</span> / mo</p>
          </a>
          <a href="#!" class="plan">
            <div class="plan__title">
              <h2>Growth</h2>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check" alt="check icon">
                <polyline points="20 6 9 17 4 12"></polyline>
              </svg>
            </div>
            <p class="plan__details">5</p>
            <p class="plan__price">€<span>10</span> / mo</p>
          </a>
          <a href="#!" class="plan">
            <div class="plan__title">
              <h2>Business</h2>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check" alt="check icon">
                <polyline points="20 6 9 17 4 12"></polyline>
              </svg>
            </div>
            <p class="plan__details">10</p>
            <p class="plan__price">€<span>15</span> / mo</p>
          </a>
          <a href="#!" class="plan">
            <div class="plan__title">
              <h2>Enterprise</h2>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check" alt="check icon">
                <polyline points="20 6 9 17 4 12"></polyline>
              </svg>
            </div>
            <p class="plan__details">20</p>
            <p class="plan__price">€<span>20</span> / mo</p>
          </a>

        </div>

      </article>

    </main>

    <script src="app.js" charset="utf-8"></script>

  </body>
</html>
