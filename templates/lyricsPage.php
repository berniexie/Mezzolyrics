<html>

<head>
    <link rel="stylesheet" type="text/css" href="pageStyles.css">
</head>

<body bgcolor="#A4A4A4"> <!--gray background-->
    <div class="wrapper">
      <div id="lyricsHeader">
         <h1>{{ songtitle }}</h1>
         <h2>{{ artist }}</h2>
      </div>

      <div id = "lyrics">{{ lyrics }}</div>
      <div class="push"></div>
    </div>

    <div class="footer">
      <div id = "buttons">
        <FORM>
          <INPUT Type="BUTTON" VALUE="Song Selection" ONCLICK="window.location.href='http://localhost:3000/songs'">
        </FORM>
        <FORM>
          <INPUT Type="BUTTON" VALUE="Word Cloud" ONCLICK="window.location.href='http://localhost:3000/'">
        </FORM>
      </div>
    </div>

</body>
</html>