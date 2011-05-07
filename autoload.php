<?php
require_once('ezc/Base/base.php');
spl_autoload_register( array( 'ezcBase', 'autoload' ) );
ezcBase::addClassRepository('src');
ezcBase::addClassRepository('tests');
?>
