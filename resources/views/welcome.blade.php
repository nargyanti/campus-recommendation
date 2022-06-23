<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="{{ asset("css/style.css")}}">
      <title>Score</title>
    </head>
    <body>
      <div class="container">
        <nav>
          <div class="nav-brand">
            <img src="{{ asset("assets/icon/Score..svg")}}" alt="">
          </div>
          <div class="nav-links">
            <a href="#" class="link-sm">About</a>
            <button href="#" class="btn-primary">Lets Start</button>
          </div>
        </nav>

        <!--banner-->
        <section class="score">
          <div class="column-text-heading">
            <h1 class="score-heading">
              Welcome to Score
            </h1>
            <p class="text-p">
              Lets find a university recommendations based on your 
              entrance exam scores
            </p>
            <button href="#" class="btn-secondary">Lets Explore</button>
          </div>
          <div class="column-illustration">
            <img class="img1" src="{{ asset("assets/img/1.png") }}" alt="">
          </div>
        </section>

        <!--steps-->
        <section class="steps">
          <div class="get-to-know">
            <h1>Get to know Score </h1>
            <p>A prospective student who has done UTBK test wants to study Informatics Engineering in Java,</p>
            <p>The prospective student wants to get a recommendation for the most suitable campus based on his grades.</p>  
          </div>
          <div class="find-out-how">
            <h2>Find out how to find your recommendations</h2>
          </div>

          <div class="step-by">
            <div class="img-step-by">
              <img src="{{ asset("assets/img/s3.svg") }}" alt="" style="margin-left: -95px;">
            </div>
            <div class="text-step-by">
              <h3>Log in or Register</h3>
              <p>Make your own account to start with us!</p>
            </div>
            
            <div class="step-by-1" style="flex-direction: row-reverse;">
              <div class="img-step-by-1">
                <img src="{{ asset("assets/img/s2.svg") }}" alt="" style="margin-right: -95px;">
              </div>
              <div class="text-step-by-1">
                <h3>Input your score</h3>
                <p>Input your score and see the recomendations</p>
              </div>
          </div>
        </section>

        <!--steps-->
        <section class="footer">
          <div class="footer-primary">
            <h3>Made By :</h3>
            <p>Aisya Chalvina</p>
            <p>Nabilah Argyanti</p>
          </div>
        </section>
      </div>
    </body>
</html>