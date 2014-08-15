<?php 
//Include the database class
require("classes/db.class.php");
include("includes/config.php");
include("layout/header.php");
if(!$user->is_logged_in()){ header('Location: index.php'); }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<body>

<div class='container-fluid' style="background-color:rgba(0,0,0,0.75)">
<br>

    <?php

      $station = $_GET['station'];
       echo'<div class="row">
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 page_info">

    <h2>'; echo$station; echo'</h2>
    
    Currently displaying recipes used on '; echo$station; echo'.<br>
    <br>
    <br>
    <ul class="menu" id="menu">
    <li><span><a href="/recipes.php">All Recipes</a></span></li>
    <li><span><a href="/stations.php">Stations</a></span></li>    
    <li><span><a href="/chefs.php">Chefs</a></span></li>
    <li><span><a href="/allIngredients.php">Ingredients</a></span></li>
    <li><span><a href="/allQuarters.php">Quarters</a></span></li>
    </ul>
    </div>
    </div>
    <br>
        <div class="row">
    <div class= "col-xs-12 col-sm-12 col-md-12 col-lg-12 fishy">
    	<img class="fishy img-responsive" src="images/fish-top-border.png">
    </div>
    </div>
    <hr>';
     
     
      $sql="SELECT * FROM lola_recipes WHERE station = '$station'";
      
      $stmt=$db->prepare($sql);
      $stmt->execute();
      $result=$stmt->fetchAll();
    
  
     	foreach ($result as $row){
                 $recipeID = $row['recipeID'];
                 $title = $row['title'];
     	         if($row['imagePath']!=""){
                 $imagePath = $row['imagePath'];
                 }
                 else{
                      $imagePath = 'http://www.verlasso.com/images/uploads/Blog_Images/jax1.png';
                     }
                // $count = $row['ct'];
                 
                // if($count > 0){
           echo "

         
           
            <a href='recipeView.php?recipeID=$recipeID' >                     
               <div class='col-xs-12 col-sm-12 col-md-12'>
                   <h3>"; print_r ($row['title']);echo"</h3>                                    
                      <hr class='recipe_list'>                                    
               </div>
            </a>                                      
            
";     

       
     }

     	
     	
    ?>


</div>


<script type="text/javascript">
$(document).ready(function() {   
            var sideslider = $('[data-toggle=collapse-side]');
            var sel = sideslider.attr('data-target');
            var sel2 = sideslider.attr('data-target-2');
            sideslider.click(function(event){
                $(sel).toggleClass('in');
                $(sel2).toggleClass('out');
            });
        });
</script>

<script 
  type="text/javascript"
  src="js/vegas/jquery.vegas.min.js">
</script>

<script
  type="text/javascript">
  $.vegas({
  src:'/images/rueben.jpg'
});
</script>
</body>
</html>