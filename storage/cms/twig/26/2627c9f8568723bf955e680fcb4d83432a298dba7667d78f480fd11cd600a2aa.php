<?php

/* /Applications/XAMPP/xamppfiles/htdocs/October/plugins/willwritingpartnership/diywill/components/testators/default.htm */
class __TwigTemplate_38dacf30bbfc4760fb58f04ac2ef060c50d2970b922de462b3aaa0e2b6ec884d extends Twig_Template
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
        echo "<div class=\"container text-center\">
    <h1>Testators</h1>
    <hr>
    <form data-request=\"onSubmit\">
        <div class=\"form-inline col-md-12 row\">
            <div class=\"form-group col-md-4\">
                <label class=\"form-spacing\">Marital Status</label>
                <select class=\"form-control mb-3 mr-sm-2 mb-sm-0\" name=\"maritalStat\">
                    <option>Single</option>
                    <option>Engaged</option>
                    <option>Married/Civil Partnership</option>
                    <option>Cohabiting</option>
                    <option>Separated</option>
                    <option>Divorced Widow/er</option>
                </select>
            </div>
            <div class=\"form-group col-md-4\">
                <label class=\"form-spacing\">For How Long?</label>
                <input type=\"number\" class=\" form-control\" placeholder=\"In Years\" name=\"howLong\">
            </div>
        </div>
        <div class=\"form-inline col-md-12 row\">
            <div class=\"form-group col-md-4\">
                <label class=\"form-spacing\">Number of Children</label>
                <input type=\"number\" min=\"0\" class=\" form-control\" placeholder=\"This Relationship\" name=\"numOfChildCurrent\">
            </div>
            <div class=\"form-group col-md-4\">
                <label class=\"form-spacing\">Number of Children</label>
                <input type=\"number\" min=\"0\" class=\" form-control\" placeholder=\"Past Relationships\" name=\"numOfChildPast\">
            </div>
            <div class=\"form-group col-md-4\">
                <label class=\"form-spacing\">Children Under 18</label>
                <input type=\"number\" min=\"0\" class=\" form-control\" placeholder=\"\" name=\"numOfChildUnder\">
            </div>
        </div>
        <div class=\"col-md-12 row\">
            <div class=\"form-group col-md-6\">
                <label class=\"form-spacing\">Date of Birth</label>
                <input type=\"date\" class=\" form-control\" data-date-format=\"mm-dd-yyyy\" placeholder=\"\" name=\"dob\">
            </div>
            <div class=\"form-group col-md-6\">
                <label class=\"form-spacing\">Nationality</label>
                <input type=\"text\" class=\" form-control\" placeholder=\"\" name=\"nationality\">
            </div>
        </div>
        <div class=\"col-md-12 row\">
            <div class=\"form-group col-md-6\">
                <label class=\"form-spacing\">Born At Town?</label>
                <input type=\"Text\" class=\" form-control\" placeholder=\"\" name=\"bornAt\">
            </div>
            <div class=\"form-group col-md-6\">
                <label class=\"form-spacing\">Born At Country?</label>
                <input type=\"Text\" class=\" form-control\" placeholder=\"\" name=\"bornAtCountry\">
            </div>
        </div>
        <div class=\"col-md-12 row\">
            <div class=\"form-group col-md-6\">
                <label class=\"form-spacing\">Job Title</label>
                <input type=\"Text\" class=\" form-control\" placeholder=\"\" name=\"jobTitle\">
            </div>
            <div class=\"form-group col-md-6\">
                <label class=\"form-spacing\">Employer</label>
                <input type=\"Text\" class=\"form-control\" placeholder=\"\" name=\"employer\">
            </div>
        </div>
        <div class=\"col-md-12 row\">
            <div class=\"form-group col-md-6\">
                <label class=\"form-spacing\">Also Know As</label>
                <input type=\"Text\" class=\" form-control\" placeholder=\"\" name=\"knowAs\">
            </div>
            <div class=\"form-group col-md-6\">
                <label class=\"form-spacing\">Formerly</label>
                <input type=\"Text\" class=\"form-control\" placeholder=\"\" name=\"formerly\">
            </div>
        </div>
        <div class=\"col-md-8 form-group row\">
            <label class=\"col-md-3\">Is The Testator Fully Sighted?</label>
            <div class=\"form-check col-md-4 row\">
                <input type=\"radio\" name=\"sighted\" class=\"form-check-input\" value=\"true\">
                <label class=\"form-check-label\" for=\"exampleCheck1\">Yes</label>
            </div>
            <div class=\"form-check col-md-4\">
                <input type=\"radio\" name=\"sighted\" class=\"form-check-input\" value=\"false\">
                <label class=\"form-check-label\" for=\"exampleCheck1\">No</label>
            </div>
        </div>
        <button type=\"submit\" class=\"btn btn-primary\">Continue</button>
    </div>
</form>
<hr>
<div class=\"buttonSpace\">
    <div class=\"text-lg-right\">
        <button onclick=\"myFunction()\" class=\"btn btn-success\">+ Add Testator</button>
        <!-- <button class=\"btn btn-danger\">- Remove Testator</button> -->
    </div>
</div>
<script>
    function myFunction(){
        alert('Hi');
    }
</script>



";
    }

    public function getTemplateName()
    {
        return "/Applications/XAMPP/xamppfiles/htdocs/October/plugins/willwritingpartnership/diywill/components/testators/default.htm";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"container text-center\">
    <h1>Testators</h1>
    <hr>
    <form data-request=\"onSubmit\">
        <div class=\"form-inline col-md-12 row\">
            <div class=\"form-group col-md-4\">
                <label class=\"form-spacing\">Marital Status</label>
                <select class=\"form-control mb-3 mr-sm-2 mb-sm-0\" name=\"maritalStat\">
                    <option>Single</option>
                    <option>Engaged</option>
                    <option>Married/Civil Partnership</option>
                    <option>Cohabiting</option>
                    <option>Separated</option>
                    <option>Divorced Widow/er</option>
                </select>
            </div>
            <div class=\"form-group col-md-4\">
                <label class=\"form-spacing\">For How Long?</label>
                <input type=\"number\" class=\" form-control\" placeholder=\"In Years\" name=\"howLong\">
            </div>
        </div>
        <div class=\"form-inline col-md-12 row\">
            <div class=\"form-group col-md-4\">
                <label class=\"form-spacing\">Number of Children</label>
                <input type=\"number\" min=\"0\" class=\" form-control\" placeholder=\"This Relationship\" name=\"numOfChildCurrent\">
            </div>
            <div class=\"form-group col-md-4\">
                <label class=\"form-spacing\">Number of Children</label>
                <input type=\"number\" min=\"0\" class=\" form-control\" placeholder=\"Past Relationships\" name=\"numOfChildPast\">
            </div>
            <div class=\"form-group col-md-4\">
                <label class=\"form-spacing\">Children Under 18</label>
                <input type=\"number\" min=\"0\" class=\" form-control\" placeholder=\"\" name=\"numOfChildUnder\">
            </div>
        </div>
        <div class=\"col-md-12 row\">
            <div class=\"form-group col-md-6\">
                <label class=\"form-spacing\">Date of Birth</label>
                <input type=\"date\" class=\" form-control\" data-date-format=\"mm-dd-yyyy\" placeholder=\"\" name=\"dob\">
            </div>
            <div class=\"form-group col-md-6\">
                <label class=\"form-spacing\">Nationality</label>
                <input type=\"text\" class=\" form-control\" placeholder=\"\" name=\"nationality\">
            </div>
        </div>
        <div class=\"col-md-12 row\">
            <div class=\"form-group col-md-6\">
                <label class=\"form-spacing\">Born At Town?</label>
                <input type=\"Text\" class=\" form-control\" placeholder=\"\" name=\"bornAt\">
            </div>
            <div class=\"form-group col-md-6\">
                <label class=\"form-spacing\">Born At Country?</label>
                <input type=\"Text\" class=\" form-control\" placeholder=\"\" name=\"bornAtCountry\">
            </div>
        </div>
        <div class=\"col-md-12 row\">
            <div class=\"form-group col-md-6\">
                <label class=\"form-spacing\">Job Title</label>
                <input type=\"Text\" class=\" form-control\" placeholder=\"\" name=\"jobTitle\">
            </div>
            <div class=\"form-group col-md-6\">
                <label class=\"form-spacing\">Employer</label>
                <input type=\"Text\" class=\"form-control\" placeholder=\"\" name=\"employer\">
            </div>
        </div>
        <div class=\"col-md-12 row\">
            <div class=\"form-group col-md-6\">
                <label class=\"form-spacing\">Also Know As</label>
                <input type=\"Text\" class=\" form-control\" placeholder=\"\" name=\"knowAs\">
            </div>
            <div class=\"form-group col-md-6\">
                <label class=\"form-spacing\">Formerly</label>
                <input type=\"Text\" class=\"form-control\" placeholder=\"\" name=\"formerly\">
            </div>
        </div>
        <div class=\"col-md-8 form-group row\">
            <label class=\"col-md-3\">Is The Testator Fully Sighted?</label>
            <div class=\"form-check col-md-4 row\">
                <input type=\"radio\" name=\"sighted\" class=\"form-check-input\" value=\"true\">
                <label class=\"form-check-label\" for=\"exampleCheck1\">Yes</label>
            </div>
            <div class=\"form-check col-md-4\">
                <input type=\"radio\" name=\"sighted\" class=\"form-check-input\" value=\"false\">
                <label class=\"form-check-label\" for=\"exampleCheck1\">No</label>
            </div>
        </div>
        <button type=\"submit\" class=\"btn btn-primary\">Continue</button>
    </div>
</form>
<hr>
<div class=\"buttonSpace\">
    <div class=\"text-lg-right\">
        <button onclick=\"myFunction()\" class=\"btn btn-success\">+ Add Testator</button>
        <!-- <button class=\"btn btn-danger\">- Remove Testator</button> -->
    </div>
</div>
<script>
    function myFunction(){
        alert('Hi');
    }
</script>



", "/Applications/XAMPP/xamppfiles/htdocs/October/plugins/willwritingpartnership/diywill/components/testators/default.htm", "");
    }
}
