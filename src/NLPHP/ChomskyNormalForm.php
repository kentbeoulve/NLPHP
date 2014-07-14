<?php
namespace NLPHP;

/**
 * A class to represent a Chomsky Normal Form
 *
 * A Chomsky Normal Form is a context-free grammar which produces
 * only rules of one of the following forms :
 *  - A -> BC
 *  - A -> a
 *  - S -> e
 *
 * (where "A", "B" and "C" ar nonterminal symbols, "a" is a terminal symbol,
 * "S" is the start symbol and "e" is the empty string).
 */
class ChomskyNormalForm
{
    private $rules;

    public function __construct()
    {
        $this->rules = array();
    }

    /**
     * Add a rewrite rule to the grammar
     */
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
