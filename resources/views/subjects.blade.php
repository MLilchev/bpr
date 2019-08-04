@extends('layouts.master')
<?php $path = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix(); ?>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/audioPlayer.js') }}"></script>
<audio controls id="audioPlayer">
    Sorry, you do not support this feature
</audio>
<ul id="playlist">
    <li class="current-song">
        <a href="https://video.oper.ru/video/audio/crusades3.mp3">
            Song 1
        </a>
    </li>
    <li>
        <a href="https://video.oper.ru/video/audio/interview_october2.mp3">
            Song 2
        </a>
    </li>
</ul>
<script>
    audioPlayer();
</script>

