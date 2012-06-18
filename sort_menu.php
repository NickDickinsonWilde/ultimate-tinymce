<?php
//print_r( $_POST );

if (isset($_POST)) { $results = $_POST; } //end switch} //end if

update_option('jwl_test', $results);

?>