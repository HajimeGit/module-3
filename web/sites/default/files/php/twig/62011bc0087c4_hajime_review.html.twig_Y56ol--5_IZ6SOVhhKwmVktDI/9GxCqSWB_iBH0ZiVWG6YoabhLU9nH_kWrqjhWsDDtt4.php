<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/custom/hajime/templates/hajime_review.html.twig */
class __TwigTemplate_c8c45858314180b043d3a39491c2190b23bb82dcb64781d68f47451263262aac extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div class=\"response_table\">
  <div class=\"response_wrapper\">
    <div class=\"user_info\">
      <div class=\"user_avatar\">";
        // line 4
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "avatar", [], "any", false, false, true, 4), 4, $this->source), "html", null, true);
        echo "</div>
      <div class=\"user_name\">";
        // line 5
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "name", [], "any", false, false, true, 5), 5, $this->source), "html", null, true);
        echo "</div>
      <div class=\"added_date\">";
        // line 6
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "created", [], "any", false, false, true, 6), 6, $this->source), "html", null, true);
        echo "</div>
    </div>
    <div class=\"response_info\">
      <div class=\"response_text\">";
        // line 9
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "review", [], "any", false, false, true, 9), 9, $this->source), "html", null, true);
        echo "</div>
      ";
        // line 10
        if ((twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "image", [], "any", false, false, true, 10) != null)) {
            // line 11
            echo "      <div class=\"response_image\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "image", [], "any", false, false, true, 11), 11, $this->source), "html", null, true);
            echo "</div>
      ";
        }
        // line 13
        echo "    </div>
    <div class=\"user_contacts\">
      <div class=\"user_tel\">";
        // line 15
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "number", [], "any", false, false, true, 15), 15, $this->source), "html", null, true);
        echo "</div>
      <div class=\"user_email\">";
        // line 16
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "email", [], "any", false, false, true, 16), 16, $this->source), "html", null, true);
        echo "</div>
      ";
        // line 17
        if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasPermission", [0 => "administer nodes"], "method", false, false, true, 17)) {
            // line 18
            echo "        <div class=\"review_buttons\">
          ";
            // line 19
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["button"] ?? null), 19, $this->source), "html", null, true);
            echo "
        </div>
      ";
        }
        // line 22
        echo "    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/custom/hajime/templates/hajime_review.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 22,  87 => 19,  84 => 18,  82 => 17,  78 => 16,  74 => 15,  70 => 13,  64 => 11,  62 => 10,  58 => 9,  52 => 6,  48 => 5,  44 => 4,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/hajime/templates/hajime_review.html.twig", "/var/www/web/modules/custom/hajime/templates/hajime_review.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 10);
        static $filters = array("escape" => 4);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
