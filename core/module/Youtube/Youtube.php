<?php

class Youtube extends CodonModule
{
	public function index()
	{
		$this->set('copyright', YoutubeData::getVersion());
		$this->set('youtube', YoutubeData::get_video());
		$this->render('youtube/Youtube.php');
	}
	public function copyright()
	{
		$this->set('copyright', YoutubeData::getVersion());
		$this->render('youtube/footer.php');
	}
}
