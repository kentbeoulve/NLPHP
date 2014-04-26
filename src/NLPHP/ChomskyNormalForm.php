<?php
namespace NLPHP;

/**
 * @todo documentation
 */
class ChomskyNormalForm
{
    private $rules;

    public function __construct()
    {
        $this->rules = array();
    }

    public function addRule(RewriteRule $rule)
    {
        $this->rules[] = $rule;
    }

    public function leftOf($right)
    {
        $result = array();

        foreach ($this->rules as $rule) {

            if ($rule->right == $right) {

                $result[] = $rule->left;
            }
        }

        return $result;
    }
}
