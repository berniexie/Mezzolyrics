<?php

/* lyricsPage.phtml */
class __TwigTemplate_e81a3da2904b167417c68cb7f95ed32d939d6b2ac280247528b8f23a64234a2c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>

<head>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/Stylesheets/pageStyles.css\">
</head>

<body bgcolor=\"#A4A4A4\">
    <div class=\"wrapper\">
      <div id=\"lyricsHeader\">
         <h1>";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["songtitle"]) ? $context["songtitle"] : null), "html", null, true);
        echo "</h1>
         <h2>";
        // line 11
        echo (isset($context["artist"]) ? $context["artist"] : null);
        echo "</h2>
      </div>

      <div id = \"lyrics\">";
        // line 14
        echo (isset($context["lyrics"]) ? $context["lyrics"] : null);
        echo "</div>
      <div class=\"push\"></div>
    </div>

    <div class=\"footer\">
      <div>
        <form method='get' action='/songs/";
        // line 20
        echo twig_escape_filter($this->env, (isset($context["word"]) ? $context["word"] : null), "html", null, true);
        echo "'>
          <input type=\"submit\" class=\"buttons\" value=\"Song Selection\">
        </form>
        <form method='get' action='/cloud/back'>
          <input type=\"submit\" class=\"buttons\" VALUE=\"Word Cloud\">
        </form>
      </div>
    </div>

</body>
</html>";
    }

    public function getTemplateName()
    {
        return "lyricsPage.phtml";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 20,  40 => 14,  34 => 11,  30 => 10,  19 => 1,);
    }
}
