<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>webscreen</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css?version=<?= rand(0,99); ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="main" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Navbar Link</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h2 class="header center white-text bold">Welcome to webscreen</h2>
        <div class="row center">
          <h5 class="header col s12 light white-text">Create a screenshot or thumbnail of any web page in couple of seconds for free.</h5>
        </div>
        <div class="row center">
              <form>
                  <div class="row">

                    <div class="input-field col s9">
                      <input id="url" name="url" type="text" class="validate">
                      <label for="url">Enter Website URL</label>
                    </div>
 
                     <div class="input-field col s3"> 
                       <i class="material-icons prefix white-text">settings</i>
                      <select name="settings[]" multiple> 
                        <option value="" disabled selected> Resolution</option>
                        <option value="1920x1080">1920x1080</option>
                        <option value="1024x768">1024x768</option>
                        <option value="800x600">800x600</option>
                        <option value="" disabled> Output</option>
                         <option value="jpeg">JPEG</option>
                        <option value="png">PNG</option> 
                                               
                      </select>
                     </div>
                 </div>
                 <div class="row">
                 <script>
                 function showHelp() {
                     var $toastContent = '1. Enter an url <br> 2. Select a resolution & Output type <br> 3. Click on Take Screenshot';
                     Materialize.toast($toastContent, 6000);
                  }
                 </script>
                   <a class="waves-effect waves-light main-green btn" onclick="showHelp()">Help!</a>

                   <button class="waves-effect waves-light btn secondary" type="submit"><i class="material-icons left">add_a_photo</i>Take Screenshot !</button>
                 </div>
                </form>
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="img/slide.jpg" alt="Unsplashed background img 1"></div>
  </div>
 <div class="container">
    <div class="section">
        <!--   Preview Section   -->
        <div class="row center image-list">

      </div>
    </div>
</div>
<!-- Ignore this -->
              <div id="screen-template" style="display:none">
              <div class="col s12 m4">
                <div class="card">
                  <div class="card-image">
                    <img  class="screen-src" src="" alt="Print-screen"> 
                  </div>
                  <div class="card-content">
                    <p class="screen-url"></p>
                  </div>
                  <div class="card-action">
                    <a href="#" class="screen-src main-green-text" target="_blank">Download</a>
                    <a href="#" class="screen-src secondary-text" target="_blank">View Image</a>
                  </div>
                </div> 
              </div>
            </div>
<!-- Ignore this -->

 <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row center">
      <h4>Features</h4>
        <div class="col s12 m4">

          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center">Fast !</h5>

            <p class="light">We did our best to make fast screenshot rendering and download without sitting in the queue.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
            <h5 class="center">Easy !</h5>

            <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>
            <h5 class="center">Reliable</h5>

            <p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. </p>
          </div>
        </div>
      </div>

    </div>
    </div>
    <br><br>

   

  <footer class="page-footer main">
    <div class="container">
      <div class="row">
        <div class="col l12 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div> 
      </div>
    </div>
    <div class="footer-copyright main-dark">
      <div class="container">
      Made with <i class="main-green-text tiny material-icons">favorite_border
</i> by <a class="main-green-text text-lighten-3" href="#">Stormix</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script>
  $(document).ready(function () {
    $('form').submit(function (e) {
      e.preventDefault();
      var imageUrl = 'shot.php?';
      $(this).serializeArray().forEach(function (param) {
        if (param.value) {
          imageUrl += param.name + "=" + encodeURIComponent(param.value) + "&";
        }
      });
      var template = $($('#screen-template').html());
      template.find('.screen-url').html($('input[name=url]').val());
      template.find('a.screen-src').attr('href', imageUrl);
      template.find('img.screen-src').attr('src', imageUrl);
      $('.image-list').prepend(template);
    });
  });
</script>
  </body>
</html>
