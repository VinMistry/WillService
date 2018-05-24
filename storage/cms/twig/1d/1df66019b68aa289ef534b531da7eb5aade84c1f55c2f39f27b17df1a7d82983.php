<?php

/* /Applications/XAMPP/xamppfiles/htdocs/October/themes/WillWritingPartnership/partials/header.htm */
class __TwigTemplate_7b89165353f07cabea7129f7a669a261f1aef48cfac87c29cfd7181a14d48359 extends Twig_Template
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
        echo "<!-- Nav -->
<div class=\"navigation\">
    <ul>
        <div class=\"\">
            <a href=\"";
        // line 5
        echo $this->env->getExtension('Cms\Twig\Extension')->pageFilter("index");
        echo "\"><img class=\"img-fluid menu-logo\" src=\"";
        echo $this->env->getExtension('Cms\Twig\Extension')->themeFilter("assets/images/twp-logo.png");
        echo "\"></a>
            <li><a class=\"company-name\" ></a></li>
        </div>
        <div class=\"nav-button\">
            <li class=\"grow\"><a class=\"nav-btn-open\" href=\"#\">Life Planning</a></li>
        </div>
        <div class=\"nav-button\">
            <li class=\"grow\"><a class=\"nav-btn-open\" href=\"#\">Personal Services</a></li>
        </div>
            <li class=\"grow\"><a href=\"";
        // line 14
        echo $this->env->getExtension('Cms\Twig\Extension')->pageFilter("services");
        echo "\">Online Services</a></li>
            <li class=\"grow\"><a href=\" ";
        // line 15
        echo $this->env->getExtension('Cms\Twig\Extension')->pageFilter("blog");
        echo "\">News</a></li>

    </ul>

</div>
<div class=\"nav-overlay\">
    <div class=\"nav-wrap\">
        <ul class=\"wrap-nav\">
            <li ><a class=\"overlay-header\" href=\"#\">Life Planning</a>
                <ul>
                    <li><a href=\"";
        // line 25
        echo $this->env->getExtension('Cms\Twig\Extension')->pageFilter("wills");
        echo "\">Wills</a></li>
                    <li><a href=\"";
        // line 26
        echo $this->env->getExtension('Cms\Twig\Extension')->pageFilter("funeral");
        echo "\">Funeral</a></li>
                    <li><a href=\"";
        // line 27
        echo $this->env->getExtension('Cms\Twig\Extension')->pageFilter("probate");
        echo "\">Probate</a></li>
                </ul>
            </li>
            <li><a class=\"overlay-header\" href=\"#\">Personal Services</a>
                <ul>
                    <li><a href=\"";
        // line 32
        echo $this->env->getExtension('Cms\Twig\Extension')->pageFilter("storage");
        echo "\">Storage</a></li>
                    <li><a href=\"";
        // line 33
        echo $this->env->getExtension('Cms\Twig\Extension')->pageFilter("trusts");
        echo "\">Trusts</a></li>
                    <li><a href=\"";
        // line 34
        echo $this->env->getExtension('Cms\Twig\Extension')->pageFilter("inheritance");
        echo "\">Inheritance</a></li>
                    <li><a href=\"";
        // line 35
        echo $this->env->getExtension('Cms\Twig\Extension')->pageFilter("faq");
        echo "\">Frequently Asked Questions</a></li>
                </ul>
            </li>
            </ul>
        </a>
    </div>
</div>
</div>";
    }

    public function getTemplateName()
    {
        return "/Applications/XAMPP/xamppfiles/htdocs/October/themes/WillWritingPartnership/partials/header.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 35,  80 => 34,  76 => 33,  72 => 32,  64 => 27,  60 => 26,  56 => 25,  43 => 15,  39 => 14,  25 => 5,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!-- Nav -->
<div class=\"navigation\">
    <ul>
        <div class=\"\">
            <a href=\"{{ 'index'|page }}\"><img class=\"img-fluid menu-logo\" src=\"{{ 'assets/images/twp-logo.png'|theme }}\"></a>
            <li><a class=\"company-name\" ></a></li>
        </div>
        <div class=\"nav-button\">
            <li class=\"grow\"><a class=\"nav-btn-open\" href=\"#\">Life Planning</a></li>
        </div>
        <div class=\"nav-button\">
            <li class=\"grow\"><a class=\"nav-btn-open\" href=\"#\">Personal Services</a></li>
        </div>
            <li class=\"grow\"><a href=\"{{ 'services'|page }}\">Online Services</a></li>
            <li class=\"grow\"><a href=\" {{ 'blog'|page }}\">News</a></li>

    </ul>

</div>
<div class=\"nav-overlay\">
    <div class=\"nav-wrap\">
        <ul class=\"wrap-nav\">
            <li ><a class=\"overlay-header\" href=\"#\">Life Planning</a>
                <ul>
                    <li><a href=\"{{ 'wills'|page }}\">Wills</a></li>
                    <li><a href=\"{{ 'funeral'|page }}\">Funeral</a></li>
                    <li><a href=\"{{ 'probate'|page }}\">Probate</a></li>
                </ul>
            </li>
            <li><a class=\"overlay-header\" href=\"#\">Personal Services</a>
                <ul>
                    <li><a href=\"{{ 'storage'|page }}\">Storage</a></li>
                    <li><a href=\"{{ 'trusts'|page }}\">Trusts</a></li>
                    <li><a href=\"{{ 'inheritance'|page }}\">Inheritance</a></li>
                    <li><a href=\"{{ 'faq'|page }}\">Frequently Asked Questions</a></li>
                </ul>
            </li>
            </ul>
        </a>
    </div>
</div>
</div>", "/Applications/XAMPP/xamppfiles/htdocs/October/themes/WillWritingPartnership/partials/header.htm", "");
    }
}
