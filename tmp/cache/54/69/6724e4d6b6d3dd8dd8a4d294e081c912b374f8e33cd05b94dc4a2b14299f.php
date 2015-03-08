<?php

/* wordCloudPage.phtml */
class __TwigTemplate_54696724e4d6b6d3dd8dd8a4d294e081c912b374f8e33cd05b94dc4a2b14299f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("homePage.phtml");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'style' => array($this, 'block_style'),
            'wordcloud' => array($this, 'block_wordcloud'),
            'search' => array($this, 'block_search'),
            'addartist' => array($this, 'block_addartist'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "homePage.phtml";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_style($context, array $blocks = array())
    {
        // line 3
        echo "#cloud {
position: relative;
top: 50%;
transform: translateY(-50%);
margin: 0 auto;
}
";
    }

    // line 10
    public function block_wordcloud($context, array $blocks = array())
    {
        // line 11
        echo (isset($context["cloud"]) ? $context["cloud"] : null);
        echo "
";
    }

    // line 13
    public function block_search($context, array $blocks = array())
    {
        // line 14
        $this->displayParentBlock("search", $context, $blocks);
        echo "
<input type=\"button\" class=\"buttons\" value=\"Add To Cloud\" onclick=\"myFunction()\">
";
    }

    // line 17
    public function block_addartist($context, array $blocks = array())
    {
        // line 18
        echo "<div class=\"fb-share-button\" data-href=\"http://comprendia.com/wp-content/uploads/2011/02/SDBN-tagxedo-for-SM-workshop-4.jpg\" data-layout=\"button\"></div><div id=\"fb-root\"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = \"//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0\";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
function myFunction() {
var artist = document.getElementById(\"artistName\").value;
window.location.href = \"http://localhost:3000/cloud/add?artist=\"+artist;
}
</script>
";
    }

    public function getTemplateName()
    {
        return "wordCloudPage.phtml";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 18,  71 => 17,  64 => 14,  61 => 13,  55 => 11,  52 => 10,  42 => 3,  39 => 2,  11 => 1,);
    }
}
