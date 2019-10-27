@extends('layouts.master')
<?php

$path = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix(); 


/* $list_contents = glob('C:/xampp/htdocs/bpr/bpr/public/audio/*mp3');
$folder = 'audio';
$fsi = new FilesystemIterator($folder);
$countFsi = iterator_count($fsi); */

$path = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix(); 
$list_contents = glob('C:/xampp/htdocs/bpr/bpr/public/audio/*mp3');
// Path needed for URLs
$folder = 'audio/';

// Path needed for URLs
//$link_folder = $base_url . $folder;

// Path needed for the FilesystemIterator class
//$iterator_folder = $server_path . $folder;

// Prepares a list of the files in the folder
$files_list = new FilesystemIterator($folder);

// Holds number of files discovered by the FilesystemIterator
$files_count = iterator_count($files_list);

$song_names = [
    1 => 'Song 1',
    2 => 'Song 2',
    3 => '',
    4 => 'Song 4',
    5 => 'Song 5',
    6 => 'Song 6',
    7 => 'Song 7',
    8 => 'Song 8',
    9 => 'Song 9',
    10 => 'Song 10'
];

$file_types = [
    'mp3',
    'ogg',
    'wav',
    'oga',
    'm4a',
    'webm'
];

function prepareFileName($string)
{
    // Removes file extension
    //$no_file_extension = preg_replace("/\\.[^.\\s]{3,4}$/", '', $string);
    $no_file_extension = substr($string, 0, (strrpos($string, '.')));
    $no_underscores = str_replace('_', ' ', $no_file_extension);
    if (strlen($no_underscores) > 30) {
        $shortened_name = substr($no_underscores, 0, 27) . '...';
        return $shortened_name;
    } else {
        return $no_underscores;
    }
}

function checkSongTitleExists($customName, $fileName)
{
    if ($customName == '') {
        return $fileName;
    } else {
        return $customName;
    }
}
?>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/audioPlayer.js') }}"></script>
<!-- 
<audio controls id="audioPlayer">
    Sorry, you do not support this feature
</audio>
<ul id="playlist">
    <div class='row'>
    <div class="column">
    <li class="current-song">
        <a href="/audio/01 - Pilot.mp3">
            Song 1
        </a>
    </li>
    <li>
        <a href="/audio/02 - GlowCloud.mp3">
            Song 2
        </a>
    </li> -->
<?php   
    //echo $countFsi;
/*     $i = 0;
    foreach ($fsi as $it) {
        $part = "<a href='".(dirname($it))."/".($it->getFilename())."'>".prepareFileName($it->getFilename())."</a></li>";
        if ($i == 0) {
            echo "<li class='current-song'>".$part;
        } elseif ($i == (round($countFsi/2))) {
            echo "</div><div class='column'><li>".$part;
        } else {
            echo "<li>".$part;
        }
    $i++;
    }  */
?>
<!--  </div>
</div>
</ul>
 -->

<?php 

    //echo $countFsi;

/*     foreach ($list_contents as $list_content) {
    echo "filename:".$list_content."<br/>";
} */

/* foreach ($fsi as $it) {
    echo "<li><a href='/audio/02 - GlowCloud.mp3'>".($it->getFilename())."</a></li>";
}  */
?>
<div>
<audio controls class="audioPlayer">
    Sorry, the audio player did not load as expected. Your browser might not support this feature.
</audio>
<div class="column">
    <ul class="playlist">
    <?php
        $i = 1;
        foreach ($files_list as $files_entry) {
            if (in_array(pathinfo($files_entry->getFilename(), PATHINFO_EXTENSION), $file_types)) {
                $song_link = '<a href="http://127.0.0.1:8000/audio' . '/' . ($files_entry->getFilename()) . '">' . checkSongTitleExists($song_names[$i], prepareFileName($files_entry->getFilename())) . '</a>';
                
                if ($i == 1) {
                    echo "<li class='current-song'>" . $song_link . '</li>';
                } else {
                    echo '<li>' . $song_link . '</li>';
                }

            //var_dump($files_entry);
                $i++;
            }
        }
    ?>
    </ul>
</div>
</div>
<?php

?>


<script>
    audioPlayer3();
</script>

