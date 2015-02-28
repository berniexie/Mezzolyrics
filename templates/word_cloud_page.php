<!DOCTYPE html>
<html>
  <head>
      <link rel="stylesheet" type="text/css" href="css/pageStyles.css">
  </head>
  <body bgcolor="#A4A4A4"> <!--gray background -->
      <div id="wordCloudHeader">
          <h1>LyricFloat</h1>
      </div>
      <div id="wordCloud">
          <img src="http://static.guim.co.uk/sys-images/Guardian/Pix/contributor/2009/12/9/1260365203581/Wordle-of-Alistair-Darili-002.jpg" alt="Mountain View" style="width:800px;height:600px">
      </div>
      <h1 name="artist"></h1>
      <div id="artistSearch">
          <form id="search" method='get' action='/search_artist'>
              <br>
              <input type="text" name="firstname" placeholder="Enter an artist">
              <input type="submit" value = "Submit">
              <input type="button" value="Add">
              <input type="button" value = "Share">
              <br>
          </form>
      </div>
  </body>
</html>
