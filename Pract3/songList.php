<?php

    $mysongs = simplexml_load_file('songs.xml');
    echo "<ul id='songlist'>\n";
    foreach ($mysongs as $songinfo):
        $title=$songinfo->title;
        $artist=$songinfo->artist;
        $date=$songinfo['dateplayed'];
        echo "<li><div class='title'>",$title,"</div><div class='artist'>by ",$artist,"</div><time>",$date,"</time></li>\n";
    endforeach;
    echo "</ul>";
?>
