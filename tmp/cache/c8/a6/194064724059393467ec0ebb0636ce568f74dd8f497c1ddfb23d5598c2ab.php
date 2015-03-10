<?php

/* songListPage.phtml */
class __TwigTemplate_c8a6194064724059393467ec0ebb0636ce568f74dd8f497c1ddfb23d5598c2ab extends Twig_Template
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
         <style>
            a {
                text-decoration: none;
                color: #000000;
            }
        </style>
    </head>

<body bgcolor=\"#A4A4A4\">
    <div class=\"wrapper\">
        <div id=\"songHeader\">
            <h1><a href=\"http://localhost:3000/\">";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</a></h1>
            <h2>";
        // line 17
        echo twig_escape_filter($this->env, (isset($context["searchword"]) ? $context["searchword"] : null), "html", null, true);
        echo "</h2> 
        </div>

        <div id = \"songTitles\">
            <div id=\"titles\">
                Song Title
                <ul>
                ";
        // line 24
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["songs"]) ? $context["songs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["song"]) {
            // line 25
            echo "                    <li>
                    <a href=\"http://localhost:3000/lyrics/";
            // line 26
            echo twig_escape_filter($this->env, (isset($context["artist"]) ? $context["artist"] : null), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute($context["song"], "title", array()), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, (isset($context["searchword"]) ? $context["searchword"] : null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["song"], "title", array()), "html", null, true);
            echo "</a>
                    </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['song'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "                </ul>
            </div>
        </div>

        <div id = \"frequency\">
            Frequency
            <ul>
            ";
        // line 36
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["songs"]) ? $context["songs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["song"]) {
            // line 37
            echo "                <li>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["song"], "frequency", array()), "html", null, true);
            echo "</li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['song'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "            </ul>
       </div>
       <div class=\"push\"></div>
    </div>

    <div class=\"footer\">
        <div>
            <form method='get' action='/cloud/back'>
                <input type=\"submit\" class=\"buttons\" value=\"Back\">
            </form>
        </div>
    </div>

</body>
</html>";
    }

    public function getTemplateName()
    {
        return "songListPage.phtml";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 39,  85 => 37,  81 => 36,  72 => 29,  57 => 26,  54 => 25,  50 => 24,  40 => 17,  36 => 16,  19 => 1,);
    }
}
