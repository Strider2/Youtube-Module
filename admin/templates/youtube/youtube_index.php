<?php
$this->show('youtube/youtube_header.php');

echo 'Click On Video details for editing the video or viewing the name and Video ID.<hr />';

echo '<h4>Videos</h4><hr />';
    if(!$youtube)
    {
     echo 'No videos found';

    }
    else
    {

    foreach($youtube as $video)
    {
         echo '<p><iframe width="'.$video->width.'" height="'.$video->height.'" src="https://www.youtube.com/embed/'.$video->vid.'"
            frameborder="'.$video->frameborder.'" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
             '.$video->fullscreen.'></iframe></p>';
         echo '<p><a href="'.SITE_URL.'/admin/index.php/Youtube_admin/get_video?id='.$video->id.'">Video Details</a></p><br />';
  }

    }

?>
