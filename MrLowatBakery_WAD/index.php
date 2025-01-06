<?php
// Redirect to another page
header("Location: public/pages/index.php");
exit;  // It's important to call exit() after the header to stop further execution
?>