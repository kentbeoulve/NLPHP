<?php
namespace NLPHP;

/**
 * A rewrite rule here is a transformation rule which can
 * be expressed as A->B or A->(B,C)
 */
class RewriteRule
{
    public $left;
    public $right = array();

    public function __construct($left, $right1, $right2 = null)
    {
        $this->left    = $left;
        $this->right   = array();
        $this->right[] = $right1;

        if (!empty($right2)) {
            $this->right[] = $right2;
        }
    }

    public function __toString()
    {
        return $this->left." -> ".implode(' ', $this->right);
    }
}
