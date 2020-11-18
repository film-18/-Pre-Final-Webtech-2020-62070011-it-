<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>spotify</title>
</head>
<body>
    
<div id="main">
        <?php
            $url = "https://dd-wtlab2020.netlify.app/pre-final/ezquiz.json";
            $response = file_get_contents($url);
            $result = json_decode($response);
            $track = $result -> tracks;
            $items = $track -> items;
            
            echo '<div class="container">';
            echo '<div class="row py-5">';

            foreach ($items as $info) {
                $album = $info -> album;
                $album_type = $album -> album_type;
                $name2 = $album->artists[0]->name;
                

                $date = $album->release_date;
                $count = $album->available_markets;


                $img = $album -> images[0] -> url;
              
                echo '<div class="col-4 py-2">';

                echo '<div class="card py-2" style="width: 18rem;">';
                echo '<img class="w-100 card-img-top rounded"  src="'.$img.'"/>';
                echo "<br>";
                echo '<div class="card-body">';
        
                echo '<h5 class="card-title font-weight-bold text-dark">';
                echo $album->name;
                echo '</h5>';
                echo '<hr>';
                
                echo '<div class="module card-text">';
                echo "Artists: " .$name2;
                echo "<br>";
                echo "Release Date: " .$date;
                echo "<br>";
                echo "Avariable: " .count($count). " countries";
                echo '</div>';
                echo '</div>';

                echo '</div>';
                echo '</div>';

            
            }
            echo '</div>';
            echo '</div>';
            
        ?>
        
    </div>
</body>
</html>