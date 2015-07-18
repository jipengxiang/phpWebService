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
        $uri = "http://gdata.youtube.com/feeds/api/users/alisothegeek/uploads";
        $myEntries = simplexml_load_file($uri);
        foreach ($myEntries->entry as $entry):
            $title = $entry->title;
            $author = $entry->author;
            echo $title & "\n";
        endforeach;

        echo '<pre>';
        print_r($myEntries);
        echo '</pre>';
        ?>
    </body>
</html>
