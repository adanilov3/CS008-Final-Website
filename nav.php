<!-- ### nav ### -->
<nav>
    <a class="<?php
    if ($pathParts['filename'] == "index") {
        print 'activePage';
    }
    ?>" href="index.php">Introduction</a>
    
    <a class="<?php
    if ($pathParts['filename'] == "detail2") {
        print 'activePage';
    }
    ?>" href="detail2.php">Stitches</a>
    
    <a class="<?php
    if ($pathParts['filename'] == "detail1") {
        print 'activePage';
    }
    ?>"  href="detail1.php">Beginner Inspiration</a>

    <a class="<?php
    if ($pathParts['filename'] == "form") {
        print 'activePage';
    }
    ?>" href="form.php">Knewsletter Signup</a>
</nav>