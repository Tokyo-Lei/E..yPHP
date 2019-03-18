<?php

/* index.html */
class __TwigTemplate_3215e7408152b956a8af309c68ce95a0abfd75276371e62fd47e37f1a7e6d14f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <title>首页</title>
    <style type=\"text/css\">
        .num{
            font-size:14px;padding: 0px;
        position: absolute;
        bottom: 20px;}

        *{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: \"微软雅黑\"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style>
</head>
<body>
<div style=\"padding: 24px 48px;\"> <h1>:)</h1><p>你好世界！ <b></b></p>

<div class=\"num\">目前访问：";
        // line 19
        echo twig_escape_filter($this->env, ($context["num"] ?? null), "html", null, true);
        echo " 次</div>
</div>

<script src=\"https://cdn.bootcss.com/jquery/3.3.1/jquery.slim.min.js\"></script> 
<script src=\"..//Public/typeit.min.js\"></script> 
<script> 
\$(\"b\").typeIt({
    whatToType: [\"EasyPHP.\", \"E...yPHP！\"],
    typeSpeed: 100,
    breakLines: false
});
</script> 
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 19,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <title>首页</title>
    <style type=\"text/css\">
        .num{
            font-size:14px;padding: 0px;
        position: absolute;
        bottom: 20px;}

        *{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: \"微软雅黑\"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style>
</head>
<body>
<div style=\"padding: 24px 48px;\"> <h1>:)</h1><p>你好世界！ <b></b></p>

<div class=\"num\">目前访问：{{num}} 次</div>
</div>

<script src=\"https://cdn.bootcss.com/jquery/3.3.1/jquery.slim.min.js\"></script> 
<script src=\"..//Public/typeit.min.js\"></script> 
<script> 
\$(\"b\").typeIt({
    whatToType: [\"EasyPHP.\", \"E...yPHP！\"],
    typeSpeed: 100,
    breakLines: false
});
</script> 
</body>
</html>", "index.html", "C:\\Users\\YangLei\\Desktop\\Myphp\\E..yPHP\\Templates\\index.html");
    }
}
