@extends('layouts.master')
<?php $path = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix(); 


$list_contents = glob('C:/xampp/htdocs/bpr/bpr/public/audio/*mp3');
$folder = 'audio';
$fsi = new FilesystemIterator($folder);
$countFsi = iterator_count($fsi);

function prepareFileName($string) {
    $noFileExtension = preg_replace("/\\.[^.\\s]{3,4}$/", '', $string);
    $noUnderscores = str_replace('_', ' ', $noFileExtension);
    if (strlen($noUnderscores) > 30 ) {
        $shortenedName = substr($noUnderscores, 0, 27).'...';
        return $shortenedName;
    } else {
        return $noUnderscores;
    }
}


?>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/audioPlayer.js') }}"></script>
<audio controls id="audioPlayer">
    Sorry, you do not support this feature
</audio>
<ul id="playlist">
    <div class='row'>
    <div class="column">
<!--     <li class="current-song">
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
    $i = 0;
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
    } 
?>
 </div>
</div>
</ul>


<?php 

    //echo $countFsi;

    foreach ($list_contents as $list_content) {
    echo "filename:".$list_content."<br/>";
}

/* foreach ($fsi as $it) {
    echo "<li><a href='/audio/02 - GlowCloud.mp3'>".($it->getFilename())."</a></li>";
}  */
?>
<script>
    audioPlayer2();
</script>

