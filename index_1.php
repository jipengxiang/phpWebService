<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (empty($_GET)) {
            ?>

            <form name="search" method="get">
                Category  <select name="category">
                    <option value="entertainment"> entertainment</option>
                    <option value="sport"> sport</option>
                    <option value="technology"> technology</option>
                </select><br/>

                Rows per page  <select name="rows">
                    <option value="<10"> 10</option>
                    <option value="20"> 20</option>
                    <option value="50"> 50</option>
                </select><br/>
                <input type="submit" value="search" />

            </form>
            <?php
        } else {
            echo "wonderfully filtered search results for " . $_GET["category"];
            foreach (getallheaders() as $name => $value) {
                echo "$name: $value\n";
            }
        }
            ?>

    </body>
</html>