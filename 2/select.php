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

    $name = $_POST['name'];


    
    if(isset($_POST['submit'])) {
        foreach ($result as $data) {
            if ($data->no == $number) {
                echo '<div class="card">';
                $img = $data->img;
                echo '<div class="text-center">';
                echo '<img class="w-100 card-img-top rounded"  src="'.$img.'"/>';
                echo '</div>';
                echo '<div class="card-body">';
                echo '<h4 class="card-title font-weight-bold ">';
                echo $data->name .'</h4>';
                echo '<h6 class="card-text text-danger">';
                echo 'อันดับ ';
                echo $data->no;
                echo '</h6>';
                echo '<h6 class="card-text">';
                echo $data->score;
                echo ' คะเเนน';
                echo '</h6>';
                echo '</div>';
                echo '</div>';
            }
        

        }

    }
    ?>

    </div>



</body>

</html>