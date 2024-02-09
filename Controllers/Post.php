<?php

class Post{

    public function view(){
        echo("POST VIEW");
        

        echo file_get_contents("Views/post-view.phtml");
        
        return true;
    }
    public function post(){
        $_POST = json_decode(file_get_contents('php://input'), true);

        var_dump($_POST);

        // [
            //     "title": "14 Ways Json Can Improve Your SEO",
            //     "subtitle": "and the women who love them",
            //     "image": "http://example.com/image.jpg",
            //     "uri": "14 Ways-Json-Can-Improve-Your-SEO",
            //     "date": "2015-09-20",
            //     "description": "We love to do stuff to help people and stuff",
            //     "articleBody": "You can paste your entire post in here, and yes it can get really really long."
            // ]
        
        // $_POST = [
        //     "title"=> "14 Ways Json Can Improve Your SEO",
        //     "subtitle"=> "and the women who love them",
        //     "image"=> "http://example.com/image.jpg",
        //     "uri"=> "14 Ways-Json-Can-Improve-Your-SEO",
        //     "date"=> "2015-09-20",
        //     "description"=> "We love to do stuff to help people and stuff",
        //     "articleBody"=> "You can paste your entire post in here, and yes it can get really really long."
        // ];

        $servername = "mysqldb";
        $database = "myDb";
        $username = "root";
        $password = "test";
        
        // Create connection
        $con = mysqli_connect($servername, $username, $password, $database);
        // Check connection
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO post (title,subtitle,image,uri, date, description, articleBody)
        VALUES ('" . $_POST["title"] ." ','" . $_POST["subtitle"] ."','" . $_POST["image"] ."','" . $_POST["uri"] ."','" . $_POST["date"] ."','" . $_POST["description"] ."','" . $_POST["articleBody"] ."')";
        if (mysqli_query($con, $sql)) {
           echo "New record created successfully !";
        } else {
           echo "Error: " . $sql . "
   " . mysqli_error($con);
        }

        echo "Connected successfully";
        mysqli_close($con);

    }


}