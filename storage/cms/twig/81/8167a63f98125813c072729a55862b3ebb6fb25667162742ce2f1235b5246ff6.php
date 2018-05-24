<?php

/* /Applications/XAMPP/xamppfiles/htdocs/October/themes/WillWritingPartnership/partials/created.htm */
class __TwigTemplate_9b90f9d2d8d5dd50ed8b20af9c7ff3f7a79bf9ef3fecdca3c7d0e9a1a310acd2 extends Twig_Template
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
        if (($context["cred"] ?? null)) {
            // line 2
            echo "<a href=\"";
            echo $this->env->getExtension('Cms\Twig\Extension')->pageFilter("termsAndCon");
            echo "\" class=\"btn btn-primary\">Continue</a>
";
        }
    }

    public function getTemplateName()
    {
        return "/Applications/XAMPP/xamppfiles/htdocs/October/themes/WillWritingPartnership/partials/created.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  21 => 2,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% if cred %}
<a href=\"{{ 'termsAndCon'|page }}\" class=\"btn btn-primary\">Continue</a>
{% endif %}", "/Applications/XAMPP/xamppfiles/htdocs/October/themes/WillWritingPartnership/partials/created.htm", "");
    }
}
