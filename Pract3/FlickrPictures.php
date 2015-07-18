<!--
We’re going to use the <title> tag as the alt text of our <img> tag. We’re also going to use the first
of the <link> tags as the href attribute of our anchor tag. Getting to our second link will be a bit 
trickier. We can use the array notation to get to the second link’s href attribute ($pixinfo->link[1]['href']). 
However, that will give us a much larger picture than we’ll need. I’m using a simple str_replace function to change 
the end of our link url from _b.jpg, to _s.jpg. That will give us thumbnails, which gives you something like this.
http://blog.teamtreehouse.com/how-to-parse-xml-with-php5
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $uri = "http://api.flickr.com/services/feeds/photoset.gne?set=72157627229375826&nsid=73845487@N00&lang=en-us";
        $mypix = simplexml_load_file($uri);
        foreach ($mypix->entry as $pixinfo){
            $title = $pixinfo->title;
            $link = $pixinfo->link['href'];
            $image = str_replace("_b.jpg", "_s.jpg", $pixinfo->link[1]['href']);
            echo "<a href=$link><img src=$image title=$title /></a>\n";
        }
        echo "<br/>";
        echo " the second picture hyperlink ";
        echo $mypix->entry[1]->link['href'];
        echo "<br/>";
        echo "<a href=" . $mypix->entry[1]->link['href'] . ">" . "View Image" . "</a>";
        echo "<br/>";
        echo '<pre>';
        print_r($mypix);
        echo '</pre>';
        ?>
    </body>
</html>
