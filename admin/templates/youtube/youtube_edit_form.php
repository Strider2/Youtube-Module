<?php


$this->show('youtube/youtube_header.php');

?>


<h4>Edit Spotify Playlist</h4>
<hr />
<form name="eventform" action="<?php echo SITE_URL; ?>/admin/index.php/Youtube_admin" method="post" >
<table width="80%">

            <tr>
                <td>Name</td>
                <td>
                  <input type="text" name="name"
                  <?php echo 'value="'$youtube->name.'"';?>/></td>

            </tr>
            <tr>
                <td>Width</td>
                <td><input type="text"  name="width"
                           <?php echo 'value="'.$youtube->width.'"'; ?>
                           /></td>
            </tr>
            <tr>
                <td>Height</td>
                <td><input type="text" name="height"
                            <?php

                                  echo 'value="'.$youtube->height.'"';
                                ?>/></td>
                              </tr>
                              <tr>
                                  <td>Youtube Video ID</td>
                                  <td><input type="text" name="vid"
                                              <?php

                                                    echo 'value="'.$youtube->vid.'"';
                                                  ?>/></td>
                                                </tr>
            <tr>
                <td>Frameborder</td>
                <td><input type="text" name="frameborder"
                           <?php echo 'value="'.$youtube->frameborder.'"'; ?>
                          /></td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $youtube->id; ?>" />
                    <input type="hidden" name="action" value="save_edit_youtube" />
                    <input type="hidden" name="fullscreen" value="allowfullscreen"/>
                    <input type="submit" value="Edit Youtube Video"></td>
            </tr>

    </table>     </form>
