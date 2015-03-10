<?php

/* homePage.phtml */
class __TwigTemplate_eed0748ef4c5a498256e3ff851fc4143006b1a177740d146ccdffaff1d1c77eb extends Twig_Template
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
    <style>
    a {
        text-decoration: none;
        color: #000000;
    }
    ";
        // line 10
        $this->displayBlock('style', $context, $blocks);
        // line 12
        echo "    </style>
</head>

<body bgcolor=\"#A4A4A4\">

    <div id=\"wordCloudHeader\">
        <h1><a href=\"http://localhost:3000/\">";
        // line 18
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</a><h1>
    </div>

    <div id=\"wordCloud\">
        ";
        // line 22
        $this->displayBlock('wordcloud', $context, $blocks);
        // line 23
        echo "    </div>

    <div id = \"artistSearch\">
        <form method='get' action='/cloud/new'>
            <input type=\"text\" id=\"artistName\" name=\"artist\" placeholder=\"Enter an artist\">
            <br />
            <input type=\"submit\" class=\"buttons\" value=\"Submit\">
            ";
        // line 30
        $this->displayBlock('search', $context, $blocks);
        // line 31
        echo "        </form>
        ";
        // line 32
        $this->displayBlock('addartist', $context, $blocks);
        // line 33
        echo "    </div>

</body>
</html>";
    }

    // line 10
    public function block_style($context, array $blocks = array())
    {
        // line 11
        echo "    ";
    }

    // line 22
    public function block_wordcloud($context, array $blocks = array())
    {
    }

    // line 30
    public function block_search($context, array $blocks = array())
    {
    }

    // line 32
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
        return array (  93 => 32,  88 => 30,  83 => 22,  79 => 11,  76 => 10,  69 => 33,  67 => 32,  64 => 31,  62 => 30,  53 => 23,  51 => 22,  44 => 18,  36 => 12,  34 => 10,  23 => 1,);
    }
}
