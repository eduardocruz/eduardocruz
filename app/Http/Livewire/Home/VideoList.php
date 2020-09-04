<?php

namespace App\Http\Livewire\Home;

use App\Models\Video;
use Livewire\Component;

class VideoList extends Component
{

    public $video_count;
    public $video_minutes;
    public $videos;

    public function render()
    {
        $this->video_count = Video::whereNotNull('video_url')->count();
        $this->video_minutes = Video::whereNotNull('video_url')->sum('duration');
        $this->videos = Video::whereNotNull('video_url')->orderBy('created_at', 'desc')->get()->take(5);
        return view('livewire.home.video-list');
    }
}
