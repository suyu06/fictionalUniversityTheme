This is our amazing custom theme.
<?php 
    function greet($name,$color){
        echo "<p>Hi,my name is $name and my favorite color is $color</p>";
    }
    greet("Jean", "vert");
    greet("martin", "bleu");
?>
<h1><?php bloginfo("name"); ?></h1>
<h1><?php bloginfo("description"); ?></h1>