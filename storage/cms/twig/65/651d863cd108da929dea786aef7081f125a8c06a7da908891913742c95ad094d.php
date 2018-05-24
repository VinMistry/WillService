<?php

/* /Applications/XAMPP/xamppfiles/htdocs/October/plugins/willwritingpartnership/diywill/components/clientdata/default.htm */
class __TwigTemplate_d1c03b316a55c1ccd94fb0b6a483608876e56d70faf49035792c17c91ca03e73 extends Twig_Template
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
            echo "    <h1>Enter Basic Details</h1>
    ";
        } else {
            // line 5
            echo "    <h2>Please Log in Or Sign up</h2>
    ";
        }
        // line 7
        echo "</div>
<div class=\"container created\">
    <form data-request=\"onSubmitBasicInfo\" data-request-update=\"created: '#created'\">
        <div class=\"form-inline\">
            <div class=\"form-group\">
                <label for=\"titles\" class=\"form-spacing\">Title </label>
                <select name=\"title\" class=\"form-control mb-3 mr-sm-2 mb-sm-0\" id=\"title\">
                    <option>Mr</option>
                    <option>Miss</option>
                    <option>Mrs</option>
                    <option>Ms</option>
                </select>
            </div>
            <div class=\"form-group\">
                <label class=\"form-spacing\">First Name </label>
                <input type=\"text\" name=\"firstName\" id=\"firstName\" class=\"form-control mb-2 mr-sm-2 mb-sm-0\" placeholder=\"First Name\" />
            </div>
            <div class=\"form-group\">
                <label class=\"form-spacing\">Last Name </label>
                <input type=\"text\"  name=\"lastNames\" id=\"lastNames\" class=\"form-control mb-2 mr-sm-2 mb-sm-0\" placeholder=\"Last Name\" />
            </div>
        </div>
        <div class=\"form-group\">
            <label>Mobile Number</label>
            <input type=\"tel\" id=\"mobile\"  name=\"mobile\" class=\"form-control\" placeholder=\"Mobile Number\" />
        </div>
        <div class=\"form-group\">
            <label>Work Number</label>
            <input type=\"tel\" id=\"work\"  name=\"work\" class=\"form-control\" placeholder=\"Work Number\" />
        </div>
        <div class=\"form-group\">
            <label>Home Number</label>
            <input type=\"tel\" id=\"homeNum\"  name=\"homeNum\" class=\"form-control\" placeholder=\"Home Number\" />
        </div>

        <div class=\"form-group\">
            <label>Email</label>
            <input type=\"email\" id=\"email\"  name=\"email\" class=\"form-control\" placeholder=\"Email\" />
        </div>
        <div class=\"form-group\">
            <label>Address Line 1</label>
            <input id=\"address-line1\" class=\"form-control\" name=\"address-line1\" type=\"text\" placeholder=\"Address Line 1\">
            <small class=\"form-text text-muted\">Street address, P.O. box, company name, c/o</small>
        </div>
        <div class=\"form-group form-inline\">
            <label  class=\"form-spacing\">City / Town</label>
            <input id=\"city\" name=\"city\" type=\"text\" placeholder=\"City\" class=\"form-control mb-2 mr-sm-2 mb-sm-0\">
            <small class=\"form-text text-muted\"></small>
        </div>
        <div class=\"form-group\">
            <label class=\"form-label\">Zip / Postal Code</label>
            <input id=\"postal-code\" name=\"postal-code\" type=\"text\" placeholder=\"Zip or Postal Code\" class=\"form-control\">
            <small class=\"text-muted form-text\">e.g. BL9 5BN </small>
        </div>
        <div class=\"container text-center\">
            <a href=\"";
        // line 62
        echo $this->env->getExtension('Cms\Twig\Extension')->pageFilter("termsAndCon");
        echo "\"><button type=\"submit\" class=\"btn btn-primary btn-lg btn-bloc\">Submit</button></a>
        </div>
    </form>
</div>

";
    }

    public function getTemplateName()
    {
        return "/Applications/XAMPP/xamppfiles/htdocs/October/plugins/willwritingpartnership/diywill/components/clientdata/default.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 62,  32 => 7,  28 => 5,  24 => 3,  22 => 2,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"container\">
    {% if user %}
    <h1>Enter Basic Details</h1>
    {% else %}
    <h2>Please Log in Or Sign up</h2>
    {% endif %}
</div>
<div class=\"container created\">
    <form data-request=\"onSubmitBasicInfo\" data-request-update=\"created: '#created'\">
        <div class=\"form-inline\">
            <div class=\"form-group\">
                <label for=\"titles\" class=\"form-spacing\">Title </label>
                <select name=\"title\" class=\"form-control mb-3 mr-sm-2 mb-sm-0\" id=\"title\">
                    <option>Mr</option>
                    <option>Miss</option>
                    <option>Mrs</option>
                    <option>Ms</option>
                </select>
            </div>
            <div class=\"form-group\">
                <label class=\"form-spacing\">First Name </label>
                <input type=\"text\" name=\"firstName\" id=\"firstName\" class=\"form-control mb-2 mr-sm-2 mb-sm-0\" placeholder=\"First Name\" />
            </div>
            <div class=\"form-group\">
                <label class=\"form-spacing\">Last Name </label>
                <input type=\"text\"  name=\"lastNames\" id=\"lastNames\" class=\"form-control mb-2 mr-sm-2 mb-sm-0\" placeholder=\"Last Name\" />
            </div>
        </div>
        <div class=\"form-group\">
            <label>Mobile Number</label>
            <input type=\"tel\" id=\"mobile\"  name=\"mobile\" class=\"form-control\" placeholder=\"Mobile Number\" />
        </div>
        <div class=\"form-group\">
            <label>Work Number</label>
            <input type=\"tel\" id=\"work\"  name=\"work\" class=\"form-control\" placeholder=\"Work Number\" />
        </div>
        <div class=\"form-group\">
            <label>Home Number</label>
            <input type=\"tel\" id=\"homeNum\"  name=\"homeNum\" class=\"form-control\" placeholder=\"Home Number\" />
        </div>

        <div class=\"form-group\">
            <label>Email</label>
            <input type=\"email\" id=\"email\"  name=\"email\" class=\"form-control\" placeholder=\"Email\" />
        </div>
        <div class=\"form-group\">
            <label>Address Line 1</label>
            <input id=\"address-line1\" class=\"form-control\" name=\"address-line1\" type=\"text\" placeholder=\"Address Line 1\">
            <small class=\"form-text text-muted\">Street address, P.O. box, company name, c/o</small>
        </div>
        <div class=\"form-group form-inline\">
            <label  class=\"form-spacing\">City / Town</label>
            <input id=\"city\" name=\"city\" type=\"text\" placeholder=\"City\" class=\"form-control mb-2 mr-sm-2 mb-sm-0\">
            <small class=\"form-text text-muted\"></small>
        </div>
        <div class=\"form-group\">
            <label class=\"form-label\">Zip / Postal Code</label>
            <input id=\"postal-code\" name=\"postal-code\" type=\"text\" placeholder=\"Zip or Postal Code\" class=\"form-control\">
            <small class=\"text-muted form-text\">e.g. BL9 5BN </small>
        </div>
        <div class=\"container text-center\">
            <a href=\"{{ 'termsAndCon'|page }}\"><button type=\"submit\" class=\"btn btn-primary btn-lg btn-bloc\">Submit</button></a>
        </div>
    </form>
</div>

", "/Applications/XAMPP/xamppfiles/htdocs/October/plugins/willwritingpartnership/diywill/components/clientdata/default.htm", "");
    }
}
