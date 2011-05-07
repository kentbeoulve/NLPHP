<?php
class ChomskyNormalForm
{
    private $rules;

    public function __construct()
    {
        $this->rules = array();
    }

    private function addRule( RewriteRule $rule )
    {
        $this->rules[] = $rule;
    }
}
?>
