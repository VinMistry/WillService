<?php

/* __string_template__fbd16af4418630e1876f4e1fd00052fd3a3e128ebef0054476caba63835b6b0f */
class __TwigTemplate_ff19bed6320aeb16822b8f8b5eb5172d055ffb352709533e6abdcc09cf43dc7e extends Twig_Template
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
        <style type=\"text/css\" media=\"screen\">
            ";
        // line 4
        echo ($context["css"] ?? null);
        echo "
        </style>
    </head>
    <body style=\"background: url(";
        // line 7
        echo twig_escape_filter($this->env, ($context["background_img"] ?? null), "html", null, true);
        echo ") top left no-repeat;\">
        <div class=\"header\">
            <p class=\"left\"><strong>www.example.com</strong></p>
            <p class=\"right\">
                <strong>Acme Company</strong><br>
                Admin Person<br>
                Test Street<br>
                34131 Berlin
            </p>
        </div>
        <div class=\"footer\">
            <p class=\"left\">
                Tel. 4141414144<br>
                Fax: 41414141414<br>
                E-mail: test@test.com<br>
                USt-IdNr.: 34131 Berlin
            </p>
            <p class=\"right\">
                Bank: Acme Company<br>
                Kontoinhaber: Admin Person<br>
                IBAN: DE41413113131<br>
                BIC: 341314
            </p>
        </div>
        ";
        // line 31
        echo ($context["content_html"] ?? null);
        echo "
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "__string_template__fbd16af4418630e1876f4e1fd00052fd3a3e128ebef0054476caba63835b6b0f";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 31,  30 => 7,  24 => 4,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<html>
    <head>
        <style type=\"text/css\" media=\"screen\">
            {{ css|raw }}
        </style>
    </head>
    <body style=\"background: url({{ background_img }}) top left no-repeat;\">
        <div class=\"header\">
            <p class=\"left\"><strong>www.example.com</strong></p>
            <p class=\"right\">
                <strong>Acme Company</strong><br>
                Admin Person<br>
                Test Street<br>
                34131 Berlin
            </p>
        </div>
        <div class=\"footer\">
            <p class=\"left\">
                Tel. 4141414144<br>
                Fax: 41414141414<br>
                E-mail: test@test.com<br>
                USt-IdNr.: 34131 Berlin
            </p>
            <p class=\"right\">
                Bank: Acme Company<br>
                Kontoinhaber: Admin Person<br>
                IBAN: DE41413113131<br>
                BIC: 341314
            </p>
        </div>
        {{ content_html|raw }}
    </body>
</html>", "__string_template__fbd16af4418630e1876f4e1fd00052fd3a3e128ebef0054476caba63835b6b0f", "");
    }
}
