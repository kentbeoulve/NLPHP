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
        $matchingRules = array_filter(
            $this->rules,
            function ($rule) use ($right) {
                return $rule->right == $right;
            }
        );

        return array_map(
            function ($rule) {
                return $rule->left;
            },
            $matchingRules
        );
    }
}
