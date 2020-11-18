<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <title>Vote</title>
</head>
<style>
    * {
        font-family: 'Kanit', sans-serif;
    }

</style>
<body>
<div class="container mx-auto px-5 py-5" >
    <p class="text-center font-weight-bold h2"></p>
    <p class="text-center font-weight-bold h6" style="color:#39f077;">ระบุ</p>   

        <form id="choose" action="select.php" method="POST">
        <div class="input-group mb-3 mt-5" >
        <input type="text" id="name" name="name" placeholder="Enter" required/><br>
        <div class="input-group-append" >
            <button type="submit" name="submit" class="btn btn-primary font-weight-bold">ค้นหา</button>
        </div>
    </form>
    </div>
    </div>
    </div>
    <?php
    $url = "https://dd-wtlab2020.netlify.app/pre-final/ezquiz.json";
    $response = file_get_contents($url);
    $result = json_decode($response);

    $track = $result -> tracks;
    $items = $track -> items;
    $found = false;

    ob_start();

    // if(isset($_POST['submit'])) {
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

    // }

    if(isset($_POST['submit'])) {
        ob_end_clean();
        $find = $_POST['name'];
        for($i=0; $i < sizeof($result->tracks->items);$i++){
            $name = $result->tracks->items[$i]->album->artists[0]->name;
            $check = explode(" ", $name);
            if(sizeof($check) == 1){
                if(($result->tracks->items[$i]->album->name == $find) or ($check[0]==$find)){
                    echo '  <div class="col-4 mt-4">
                        <div class="card">
                            <img class="card-img-top" src="'.$result->tracks->items[$i]->album->images[0]->url.'" alt="">
                            <div class="card-body">
                                <h4>'.$result->tracks->items[$i]->album->name.'</h4>
                                <p>Artist: '.$result->tracks->items[$i]->album->artists[0]->name.'</p>
                                <p>Release date: '.$result->tracks->items[$i]->album->release_date.'</p>
                                <p>Availiable: '.sizeof($result->tracks->items[$i]->album->available_markets).' countries</p>
                            </div>
                        </div>
                    </div>';
                    $found = true;
                }
            } elseif(sizeof($check) == 2) {
                if(($result->tracks->items[$i]->album->name == $name) or ($check[0]==$find) or ($check[1]==$find)){
                    echo '  <div class="col-4 mt-4">
                        <div class="card">
                            <img class="card-img-top" src="'.$result->tracks->items[$i]->album->images[0]->url.'" alt="">
                            <div class="card-body">
                                <h4>'.$result->tracks->items[$i]->album->name.'</h4>
                                <p>Artist: '.$result->tracks->items[$i]->album->artists[0]->name.'</p>
                                <p>Release date: '.$result->tracks->items[$i]->album->release_date.'</p>
                                <p>Availiable: '.sizeof($result->tracks->items[$i]->album->available_markets).' countries</p>
                            </div>
                        </div>
                    </div>';
                    $found = true;
                }
            }
            
        }
        if(!$found){
            echo '<h1 class="mt-5">Not Found</h1>';
        }

    }
       
       
    ?>




</body>

</html>