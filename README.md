## kendimde önemli oop eksiklikleri fark ettim

```php
class Select extends Connection {

    public $con = new Connection();


    public function Select_All_Blogs($id, $category, $blog, $posted_on, $clicked) {
        $filter = "*"; # default
        $query = "SELECT ". "$filter " ."FROM blog_posts";
        $check = [$id, $category, $blog, $posted_on, $clicked];
        foreach ($check as $value) {            
            if (empty($value)) {
                unset($check[$value]);
            }   
        }
        if (count($check) > 0) {
            $filter = join(",", $check);            
        }

        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result); # or mysqli_fetch_array($result, MYSQLI_ASSOC)
            $con->close();
            return $row;
        }
    }
}
```

örnek olarak bu kod bloğunda herhangi bir problem yokmuş gibi fakat hayır.
\\**Use of unassigned variable '$con'**  hatası alırız. 
buradaki 
```php
public $con = new Connection();
``` 

değerine erişebilmek için
```php
$this->con->blabla();
```
ifadesini kullanmalıyız.

-----


## ikinci bir sorun


```php
<?php
include_once(__DIR__."/Connection.php");


class Select extends Connection {

    public $con = new Connection();


    public function Select_All_Blogs($id, $category, $blog, $posted_on, $clicked) {
        $filter = "*"; # default
        $query = "SELECT ". "$filter " ."FROM blog_posts";
        $check = [$id, $category, $blog, $posted_on, $clicked];
        foreach ($check as $value) {            
            if (empty($value)) {
                unset($check[$value]);
            }   
        }
        if (count($check) > 0) {
            $filter = join(",", $check);            
        }

        $result = mysqli_query($this->con, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result); # or mysqli_fetch_array($result, MYSQLI_ASSOC)
            $this->con->close();
            return $row;
        }

    }
}

?>
```

kod bloğund aldığım hata: `Fatal error: New expressions are not supported in this context in C:\xampp\htdocs\web_project\model\Select.php on line 7` idi. Bunu chatgpt sayesinde şu şekilde çözdüm;

```php
<?php
include_once(__DIR__."/Connection.php");


class Select extends Connection {

    public $con;

     
    // Constructor: Connection nesnesini burada başlatıyoruz.
    public function __construct() {
        $this->con = new Connection();
    }


    public function Select_All_Blogs($id, $category, $blog, $posted_on, $clicked) {
        $filter = "*"; # default
        $query = "SELECT ". "$filter " ."FROM blog_posts";
        $check = [$id, $category, $blog, $posted_on, $clicked];
        foreach ($check as $value) {            
            if (empty($value)) {
                unset($check[$value]);
            }   
        }
        if (count($check) > 0) {
            $filter = join(",", $check);            
        }

        $result = mysqli_query($this->con->connect(), $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result); # or mysqli_fetch_array($result, MYSQLI_ASSOC)
            $this->con->connect()->close();
            return $row;
        }

    }
}
?>
```

şeklinde oldu. Aynı şekilde `Insert.php` de değiştirildi.