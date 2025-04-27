<?php 
        
        include __DIR__."/../model/Select.php";

        $blogs = new Select();
        $bloggers = new Select();


        if (!isset($_POST["category"]) || $_POST["category"] == "All" ) {
      
            if ($rows = $blogs->Select_Blogs("","","","","","")){
                $textnum = count($rows);
                echo "<strong class='blogs'>".$textnum."</strong> adet yazı var.<br><br>";
                foreach($rows as $data){
                    $row = $bloggers->Select_Specified_Bloggers(["id"=>$data["bloggerId"]]);
                    echo "Yazar: "."<strong class='blogger'>".$row[0]["username"]."</strong>";
                    echo "<a class='blog' href='get_article.php?id=".strval($data["id"])."'>"."<h3>".$data["title"]. "</h3></a>";
                    echo "<br>";
                    echo "Kategori: ".$data["category"]."<p>".$data["posted_on"]."</p>";
                    echo "<img src='./view/images/icons8-click-50.png' width='30' height='30'> "."<p>".$data["clicked"]."</p>";
                    echo "<hr>";      
                }
            }
            else{
                echo "BOŞ";
            } 
        } else 
        {
            $request = $_POST["category"];
            $object = new Select();
    
            $blogrows = $object->Select_Specified_Blogs(["category" => $request]);
            if ($blogrows!=null) {
                $textnum = count($blogrows);
                echo "<strong class='blogs'>".$textnum."</strong> adet yazı var.<br><br>";
                foreach ($blogrows as $row) {
                    $blogerows = $object->Select_Specified_Bloggers(["id"=> $row["bloggerId"]]);
                    echo "Yazar: "."<strong class='blogger'>".$blogerows[0]["username"]."</strong>";
                    echo "<a class='blog' href='get_article.php?id=".strval($row["id"])."'>"."<h3>".$row["title"]. "</h3></a>";
                    echo "<br>";
                    echo "Kategori: ".$row["category"]."<p>".$row["posted_on"]."</p>";
                    echo "<img src='./view/images/icons8-click-50.png' width='30' height='30'> ".$row["clicked"];
                    echo "<hr>"; 
                }
            }
            else {
                echo "<strong class='blogs'>0</strong> adet yazı var.<br><br>";
            }
        }
               
?>