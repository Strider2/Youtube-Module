<?php


class Youtube_admin extends CodonModule
{
    public function HTMLHead()
    {
        $this->set('sidebar', 'youtube/sidebar_youtube.php');
    }

    public function NavBar()
    {
        echo '<li><a href="'.SITE_URL.'/admin/index.php/Youtube_admin">Youtube</a></li>';
    }

    public function index()
    {
        if($this->post->action == 'save_new_video')
        {
            $this->save_new_video();
        }
        elseif($this->post->action == 'save_edit_video')
        {
            $this->save_edit_video();
        }
        else
        {
            $this->set('youtube', YoutubeData::get_video());
			      $this->set('history', YoutubeData::get_past_video());
            $this->set('copyright', YoutubeData::getVersion());
            $this->show('youtube/youtube_index.php');
        }
    }
    public function get_video()
    {
        $id = $_GET[id];
        $this->set('youtube', YoutubeData::get_videos($id));
        $this->set('copyright', YoutubeData::getVersion());
        $this->show('youtube/youtube_video.php');
    }
    public function new_video()
    {
        $youtube = YoutubeData::get_video();
        $this->set('copyright', YoutubeData::getVersion());
        $this->set('title', 'Add Video');
        $this->set('action', 'save_new_video');
        $this->set('youtube', $youtube);


        $this->render('youtube/youtube_new_form.php');
        /*$this->set('codeshares', $codeshares);
        $this->show('codeshare/codeshare_new_form.php');*/
    }
    protected function save_new_video()
    {
      $youtube = array();

      $youtube['name'] = DB::escape($this->post->name);
      $youtube['width'] = DB::escape($this->post->width);
      $youtube['height'] = DB::escape($this->post->height);
      $youtube['vid'] = DB::escape($this->post->vid);
      $youtube['frameborder'] = DB::escape($this->post->frameborder);
      $youtube['fullscreen'] = DB::escape($this->post->fullscreen);



      /*foreach($youtube as $test)
      {
          if(empty($test))
          {
              $this->set('spotify', $youtube);
              $this->show('youtube/spotify_new_form.php');
              return;
          }
      }*/


      # Add it in
      YoutubeData::save_new_video($youtube['name'], $youtube['width'],
                            $youtube['height'],
                            $youtube['vid'],
                            $youtube['frameborder'],
                            $youtube['fullscreen']);


      $this->set('message', 'The video "' . $this->post->name .'" has been added');
      $this->render('core_success.php');
      $this->set('youtube', YoutubeData::get_video());
      $this->show('youtube/youtube_index');
      LogData::addLog(Auth::$userinfo->pilotid, 'Added Youtube Video "' . $this->post->name . '"');
    }
    public function edit_video() {
            $id = $_GET[id];
            $youtube = array();
            $youtube = YoutubeData::get_videos($id);
            $this->set('copyright', YoutubeData::getVersion());
            $this->set('youtube', $youtube);
            $this->show('youtube/youtube_edit_form.php');
    }
    protected function save_edit_video()
    {
      $youtube = array();

      $youtube['name'] = DB::escape($this->post->name);
      $youtube['width'] = DB::escape($this->post->width);
      $youtube['height'] = DB::escape($this->post->height);
      $youtube['vid'] = DB::escape($this->post->vid);
      $youtube['frameborder'] = DB::escape($this->post->frameborder);
      $youtube['fullscreen'] = DB::escape($this->post->fullscreen);


        $ret=YoutubeData::save_edit_video($youtube['name'], $youtube['width'],
                              $youtube['height'],
                              $youtube['vid'],
                              $youtube['frameborder'],
                              $youtube['fullscreen']);

        if (DB::errno() != 0 && $ret == false) {
            $this->set('message',
                       'There was an error adding the Youtube Video,
                       already exists DB error: ' . DB::error());
            $this->render('core_error.php');
            return;
        }

        $this->set('message', 'The Youtube Video "' . $this->post->name .
                   '" has been added');
        $this->render('core_success.php');

        LogData::addLog(Auth::$userinfo->pilotid, 'Edited Youtube Video "' . $this->post->name . '"');

        $id = $youtube['id'];
        $this->set('youtube', YoutubeData::get_videos($id));

        $this->show('youtube/youtube_video.php');
    }

    public function delete_video()
    {
        $id = $_GET[id];
        YoutubeData::delete_video($id);
        LogData::addLog(Auth::$userinfo->pilotid, 'Deleted Youtube Video "' . $this->post->name . '"');
        $this->set('youtube', YoutubeData::get_upcoming_videos());
        $this->show('youtube/youtube_index.php');
    }
}
