<?php

class YoutubeData extends CodonData
{
    public static function get_video()
    {
		return DB::get_results("SELECT * FROM ".TABLE_PREFIX."youtube");

    }
 	public static function get_upcoming_video()
    {
        $query = "SELECT * FROM ".TABLE_PREFIX."youtube
                ORDER BY id ASC";

        return DB::get_results($query);
    }
    public static function get_videos($id)
    {
        $query = "SELECT * FROM ".TABLE_PREFIX."youtube WHERE id='$id'";

        return DB::get_row($query);
    }

   public static function get_past_video()
    {
        $query = "SELECT * FROM ".TABLE_PREFIX."youtube
                ORDER BY id DESC";

        return DB::get_results($query);
    }

    public static function save_new_video($name, $width, $height, $vid, $frameborder, $fullscreen)
    {
      $query = "INSERT IGNORE INTO ".TABLE_PREFIX."youtube (name, width, height, vid, frameborder, fullscreen)
              VALUES ('$name', '$width', '$height', '$vid', '$frameborder', '$fullscreen')";

      DB::query($query);
    }
     public static function save_edit_video($name, $width, $height, $vid, $frameboarder, $fullscreen)
    {
        $query = "UPDATE ".TABLE_PREFIX."youtube SET
         name='$name',
         width='$width',
         height='$height',
         vid='$vid',
         frameborder='$frameboarder',
         fulscreen='$fullscreen'
         WHERE id='$id'";

        DB::query($query);
    }
    public static function delete_video($id)
    {
        $query = "DELETE FROM ".TABLE_PREFIX."youtube
                    WHERE id='$id'";

        DB::query($query);
    }
       /////////////////////////////////
       // Do not remove this code!   //
       ///////////////////////////////
       public static function getVersion()
       {
        return DB::get_results("SELECT * FROM ".TABLE_PREFIX."strider WHERE id = 3");
       }
}
