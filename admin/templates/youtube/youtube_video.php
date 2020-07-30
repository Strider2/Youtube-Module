<?php

$this->show('youtube/youtube_header.php');



echo '<h4>Youtube Video name: '.$youtube->name.'</h4><hr />';

echo 'Youtube video ID: <b>'.$youtube->vid.'</b><br />';

echo '</b><hr />';
echo '<a href="'.SITE_URL.'/admin/index.php/Youtube_admin/edit_video?id='.$youtube->id.'"><b>Edit video</b></a><br /><hr />';
echo '<a href="'.SITE_URL.'/admin/index.php/Youtube_admin/delete_video?id='.$youtube->id.'"><span style="color:red;"><b>Delete video</b></a> - This will delete the youtube video from the datbase permanently!</span><br /><hr />';
?>
