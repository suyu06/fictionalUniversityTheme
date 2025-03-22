<!-- This is our amazing custom theme. -->
<!-- function & arrays-->
<!-- <?php 
    function greet($name,$color){
        echo "<p>Hi,my name is $name and my favorite color is $color</p>";
    }
    greet("Jean", "vert");
    greet("martin", "bleu"); 
?>
<h1><?php bloginfo("name"); ?></h1>
<h1><?php bloginfo("description"); ?></h1>

<?php 
    $count=1;
    while($count<10){
        echo "<li>$count</li>";
        $count++;}
?>
<?php     
    $names= array("Matin","Pierre","Ziba","suzy");
    $n=0;
    while($n<count($names)){
        echo "<li>$names[$n]</li>";
        $n++;}

?> -->


<?php 
        while(have_posts()){
            the_post();?>
      <h2><a href= "<?php the_permalink(); ?>"><?php  the_title();?></a></h2>
      <p><?php the_content() ;?></p> 
<?php         }
?>

