<?php

/* /Applications/XAMPP/xamppfiles/htdocs/October/themes/WillWritingPartnership/pages/account.htm */
class __TwigTemplate_a83495f4bc458c380bfdd943c32ceadcc9bd195a11d898e58af48b57d96f5b81 extends Twig_Template
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
        echo "<div class=\"container\">
    ";
        // line 2
        if (($context["user"] ?? null)) {
            // line 3
            echo "    <h1>Hello ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["user"] ?? null), "name", array()), "html", null, true);
            echo "</h1>
    ";
        } else {
            // line 5
            echo "    <h2>Please Log in Or Sign up</h2>
    ";
        }
        // line 7
        echo "</div>

<hr>

<div class=\"container\">
    <h3>Account Details</h3>
    ";
        // line 13
        $context['__cms_component_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->componentFunction("account"        , $context['__cms_component_params']        );
        unset($context['__cms_component_params']);
        // line 14
        echo "</div>


<div class=\"container\">
    <p><a class =\"fgt-psswd\" href=\"";
        // line 18
        echo $this->env->getExtension('Cms\Twig\Extension')->pageFilter("forgot-password");
        echo "\">Forgotten your password?</a></p>
    ";
        // line 19
        if (($context["user"] ?? null)) {
            // line 20
            echo "    <a data-request=\"onLogout\"  data-request-data=\"redirect: '/account'\"><button  class=\"btn btn-primary\">Sign out</button></a>
    ";
        }
        // line 22
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "/Applications/XAMPP/xamppfiles/htdocs/October/themes/WillWritingPartnership/pages/account.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 22,  58 => 20,  56 => 19,  52 => 18,  46 => 14,  42 => 13,  34 => 7,  30 => 5,  24 => 3,  22 => 2,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"container\">
    {% if user %}
    <h1>Hello {{ user.name }}</h1>
    {% else %}
    <h2>Please Log in Or Sign up</h2>
    {% endif %}
</div>

<hr>

<div class=\"container\">
    <h3>Account Details</h3>
    {% component 'account' %}
</div>


<div class=\"container\">
    <p><a class =\"fgt-psswd\" href=\"{{ 'forgot-password'|page }}\">Forgotten your password?</a></p>
    {% if user %}
    <a data-request=\"onLogout\"  data-request-data=\"redirect: '/account'\"><button  class=\"btn btn-primary\">Sign out</button></a>
    {% endif %}
</div>", "/Applications/XAMPP/xamppfiles/htdocs/October/themes/WillWritingPartnership/pages/account.htm", "");
    }
}
