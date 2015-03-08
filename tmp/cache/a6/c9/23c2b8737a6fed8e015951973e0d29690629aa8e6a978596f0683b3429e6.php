<?php

/* homePage.phtml */
class __TwigTemplate_a6c923c2b8737a6fed8e015951973e0d29690629aa8e6a978596f0683b3429e6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'style' => array($this, 'block_style'),
            'wordcloud' => array($this, 'block_wordcloud'),
            'search' => array($this, 'block_search'),
            'addartist' => array($this, 'block_addartist'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>

<head>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/Stylesheets/pageStyles.css\"> 
    <link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css\">
    <script src=\"//code.jquery.com/jquery-1.10.2.js\"></script>
    <script src=\"//code.jquery.com/ui/1.11.3/jquery-ui.js\"></script>
    <script>
        \$(function() {
            var availableTags = [
                \"Ellie Goulding\",
                \"Nirvana\",
                \"The Fray\",
                \"Coldplay\",
                \"Imagine Dragons\",
                \"Bastille\",
                \"Eminem\",
                \"Ben Howard\",
                \"The Rolling Stones\",
                \"The Beatles\",
                \"Led Zeppelin\",
                \"OneRepublic\",
                \"Michael Jackson\",
                \"Jason Derulo\",
                \"Daughter\",
                \"Katy Perry\",
                \"Drake\",
                \"Calvin Harris\",
                \"Sam Smith\",
                \"Of Monsters and Men\",
                \"Avicii\",
                \"Sia\"
            ];
            \$( \"#tags\" ).autocomplete({
            source: availableTags
            });

            // \$(\"#tags\").autocomplete({
            //     minLength: 2,                                          
            //     source: availableTags,        
            //     select: function( event, ui ) {
            //         window.location.href = ui.item.value;
            //     }
            // }).data(\"uiAutocomplete\")._renderItem = function (ul, item) {
            //         return \$(\"<li />\")
            //             .data(\"item.autocomplete\", item)
            //             .append(\"<a><img src='\" + item.icon + \"' />\" + item.label + \"</a>\")
            //             .appendTo(ul);
            //         }; 
            });
    </script>  
    <style>
    a {
        text-decoration: none;
        color: #000000;
    }
    .ui-autocomplete {
        max-height: 100px;
        overflow-y: scroll;
        overflow-x: hidden;
    }
     * html .ui-autocomplete {
        height: 100px;
    }
    ";
        // line 65
        $this->displayBlock('style', $context, $blocks);
        // line 67
        echo "    </style>
</head>

<body bgcolor=\"#A4A4A4\">

    <div id=\"wordCloudHeader\">
        <h1><a href=\"http://localhost:3000/\">";
        // line 73
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</a><h1>
    </div>

    <div id=\"wordCloud\">
        ";
        // line 77
        $this->displayBlock('wordcloud', $context, $blocks);
        // line 78
        echo "    </div>

    <div id=\"artistSearch\">
    <div class=\"ui-widget\">
        <form method='get' action='/cloud/new'>
            <input id=\"tags\" name=\"artist\" placeholder=\"Enter an artist\">
            <br />
            <input type=\"submit\" class=\"buttons\" value=\"Submit\">
            ";
        // line 86
        $this->displayBlock('search', $context, $blocks);
        // line 87
        echo "        </form>
        ";
        // line 88
        $this->displayBlock('addartist', $context, $blocks);
        // line 89
        echo "    </div>
    </div>

</body>
</html>";
    }

    // line 65
    public function block_style($context, array $blocks = array())
    {
        // line 66
        echo "    ";
    }

    // line 77
    public function block_wordcloud($context, array $blocks = array())
    {
    }

    // line 86
    public function block_search($context, array $blocks = array())
    {
    }

    // line 88
    public function block_addartist($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "homePage.phtml";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 88,  145 => 86,  140 => 77,  136 => 66,  133 => 65,  125 => 89,  123 => 88,  120 => 87,  118 => 86,  108 => 78,  106 => 77,  99 => 73,  91 => 67,  89 => 65,  23 => 1,);
    }
}
