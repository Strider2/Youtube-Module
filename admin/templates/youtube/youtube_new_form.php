<?php

$this->show('youtube/youtube_header.php');
if(isset($youtube))
{echo '<div id="error">All fields must be filled out</div>'; }
?>

<h4>Youtube Video</h4>
<span style="color:red;">Note: All fields must be filled in.</span>
<table width="80%">
  <form name="eventform" action="<?php echo SITE_URL; ?>/admin/index.php/Youtube_admin" method="post">
  <table width="100%" class="tablesorter">
  <tr>
    <td valign="top"><strong>Name: </strong></td>
    <td>
      <input type="text" name="name"
      <?php
      if(isset($event))
      {
        echo 'value="'.$event['name'].'"';
      } ?>/>
    </td>
  </tr>
  <tr>
    <td><strong>width:</strong></td>
    <td>
      <input type="text" name="width"
      <?php
      if(isset($event))
      {
          echo 'value="'.$event['width'].'"';
      }
       ?>/>
       <p><span style="color:red;">Default 560.</span></p>

    </td>
  </tr>
  <tr>
    <td width="3%" nowrap><strong>Height:</strong></td>
    <td><input  name="height"
        <?php
        if(isset($event))
        {
          echo 'value="'.$event['height'].'"';
        }
        ?>/>
        <p><span style="color:red;">Default 315.</span></p>
    </td>
  </tr>
  <tr>
    <td width="3%" nowrap><strong>Youtube Video ID:</strong></td>
    <td><input  name="vid"
        <?php
        if(isset($event))
        {
          echo 'value="'.$event['vid'].'"';
        }
        ?>/>
        <p><span style="color:red;">Please enter the video ID like: TyVSIdLGL10.</span></p>
    </td>
  </tr>
  <tr>
    <td><strong>Frameborder:</strong></td>
    <td><input name="frameborder"
      <?php
        if(isset($event))
        {
          echo 'value="'.$event['frameborder'].'"';
        }
       ?>/>
       <p><span style="color:red;">Default 0.</span></p>
    </td>
  </tr>
  <tr>
    <td></td>
    <td><input type="hidden" name="action" value="<?php echo $action;?>" />
      <input type="hidden" name="id" value="<?php echo $youtube->id;?>" />
      <input type="hidden" name="fullscreen" value="allowfullscreen"/>
      <input type="submit" name="submit" value="<?php echo $title;?>" />
    </td>
  </tr>
  </table>
  </form>
  </div>
