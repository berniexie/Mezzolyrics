<html>

    <head>
        <link rel="stylesheet" type="text/css" href="pageStyles.css">
    </head>

<body bgcolor="#A4A4A4"> <!--gray background -->
    <div class="wrapper">
        <div id="songHeader">
            <h1>{{ title }}</h1>
            <h2>{{ searchword }}</h2> <!-- VARIABLE -->
        </div>

        <div id = "songTitles">
            <div id="titles">
                Song Title
                <ul>
                {% for song in songs %}
                    <li>{{ song.title }}</li>
                {% endfor %}
                </ul>
            </div>
        </div>

        <div id = "frequency">
            Frequency
            <ul>
            {% for song in songs %}
                <li>{{ song.frequency }}</li>
            {% endfor %}
            </ul>
       </div>
       <div class="push"></div>
    </div>

    <div class="footer">
        <div id = "buttons">
            <FORM>
                <INPUT Type="BUTTON" class="buttons" VALUE="Back" ONCLICK="window.location.href='http://localhost:3000'">
            </FORM>
        </div>
    </div>

</body>
</html>