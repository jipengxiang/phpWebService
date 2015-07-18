<html>
    <body>
        <?php
        $text = $_POST['txtMessage'];
// Yes French is a beautiful language.
        $lang = "en";

// Name of the MP3 file generated using the MD5 hash
// Added things to prevent bug if you want the same sentence in two different languages
        $file = md5($lang . "?" . urlencode($text));

// Save the MP3 file in this folder with the .mp3 extension 
        $file = "audio/" . $file . ".mp3";

// Verify if folder exists, if it doesn't, create it, if exists, verify CHMOD
        if (!is_dir("audio/"))
            mkdir("audio/");
        else
        if (substr(sprintf('%o', fileperms('audio/')), -4) != "0777")
            chmod("audio/", 0777);


// If the MP3 file exists, do not create a new request
        if (!file_exists($file) || filesize($file)==0) {
            // Download the content
            $mp3 = file_get_contents(
                    'http://translate.google.com/translate_tts?tl=' . $lang . '&q=' . urlencode($text));

            if (file_put_contents($file, $mp3)) {
                echo "Saved<br>";
            } else {
                echo "Wasn't able to save it !<br>";
            }
        } else {
            echo "Already exist<br>";
        }
        ?>
        <audio controls="controls" autoplay="autoplay">
            <source src="<?php echo $file; ?>" type="audio/mp3" />
        </audio>
    </body> 
</html>
