<?php
$phpSelf = htmlspecialchars($_SERVER['PHP_SELF']);
$pathparts = pathinfo($phpSelf);
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>kickin' knit!</title>
        <meta name="author" content="sasha danilov and jessica rosseau">
        <meta name="description" content="all you kneed to know about knitting">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <link rel="stylesheet" href="css/custom.css?version=<?php print time(); ?>" type="text/css">
        <link rel="stylesheet" media="(max-width: 800px)" href="css/custom-tablet.css?version=<?php print time(); ?>" type="text/css">
        <link rel="stylesheet" media="(max-width: 600px)" href="css/custom-phone.css?version=<?php print time(); ?>" type="text/css">
    </head>
    <!-- uhhhhh i can't think of any content -->
    <?php
    print '<body class="' . $pathParts['filename'] . '">';
    print '<!-- ####### body elements ##### -->';
    include 'connect-DB.php';
    include 'header.php';
    include 'nav.php';
    ?>