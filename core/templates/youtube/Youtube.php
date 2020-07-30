
<h3>Youtube Videos</h3>
<div class="block full">




<?php
if(!$youtube)
    {
    	echo '<span style="color:red;">You have not added any youtube videos.</span>';
    }
    else {?>



	<?php

    foreach($youtube as $video){


        ?>
        <div class="block-title">

        <h1><i class="hi hi-map-marker"></i> <?php echo $video->name;?></h1>

        </div>
        <iframe width="<?php echo $video->width;?>" height="<?php echo $video->height;?>" src="https://www.youtube.com/embed/<?php echo $video->vid;?>"
        frameborder="<?php echo $video->frameborder;?>" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
        <?php echo $video->fullscreen;?>></iframe><br />
<?php
}
}
?>
<hr />
<?php
if(!$copyright){
echo '<span style="color:red;">Please put the strider table in your database as this is required.</span>';

}

else{
  foreach($copyright as $copy){
echo $copy->copyright .' '.date("Y").' '.$copy->name.' '.$copy->module.' '.$copy->version.'.';
}
}
 ?>
</div>

</div>
