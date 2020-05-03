<!DOCTYPE html>
<html>
  <head>
    <title>Web Backend Landing Page</title>
    <link rel="stylesheet" href="homepageStyle.css">
  </head>

  <body>

    <header>
      <h1>CSE 341: Backend Web Develoment II</h1>
      <h2>Home Page</h2>
      <h2>
        <?php
            echo "Hello, you are visiting this site on " . date("l") . ", " . date("d/m/Y") . "<br>";
         ?>
      </h2>
    </header>

    <div class="row">
      <div id="assignmentWidget" class="column left">
        <h2>Assignments</h2>
        <ul>
          <li><a href="https://serene-inlet-46314.herokuapp.com/hello.html">Hello World!</a></li>
          <li><a href="homepage.php">Home Page</a></li>
        </ul>
      </div>

      <div id="mainContent" class="column middle">
        <h1>A Little About Me</h1>

        <p>I have worked as a pharmacist before deciding to continue my education
        with BYU-I's online program. My major is Computer Science with an
        emphasis in Software Engineering. Just finished an internship with a
        mobile app company that is producing a language learning app. It was a great
        experience and I learned a ton! My dream project would be to combine
        my educational disciplines and work on software that could be utilized
        in the healtcare field.
        </p>

        <p>In my free time I like play video games, spend time with my family,
        and I have recently taking up sketching and drawing. I'm not very good,
        but it is a nice relaxing hobby that has helped during this hectic time.
        </p>

        <p>I am not married nor do I have any kids. But I do have a great kitty
          companion. Wednesday has is almost 5 years old. I got her shortly after
          graduating pharmacy school. She loves to cuddle and even play fetch with
          hair scrunchies. She's been a great companion who has helped me keep
          my sanity when I have lived away from family and during hectic times.
        </p>

        <img src="wednesday.jpg"></img>
     </div>

     <div class="column right"></div>
  </div>

    <footer>
      <p>Posted for CSE 341: Backend Web Development II<br>
      <p>Assignment Due: 05/02/2020<br>
         Last Updated: 05/02/2020
      </p>
    </footer>

</body>
</html>
