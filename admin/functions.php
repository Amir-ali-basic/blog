
<?php

function confirmQuery($result){
    global $connection;
    if(!$result){
        die("query failed" . mysqli_error($connection));
      }
};

//dodajemo kategorije
function insert_categories() {
    global $connection;
//dodajemo kategorije
    if(isset($_POST['submit'])){
    $cat_title = $_POST['cat_title'];

    if($cat_title == '' || empty($cat_title)){
     echo "<h4 class='alert alert-danger'>Ovo polje ne moze biti prazno </h4>";
    }else{

     echo "<h4 class='alert alert-success'>Kategorija uspjesno dodata </h4>";

     $query = 'INSERT INTO categories(cat_title) ';
     $query.="VALUE ('{$cat_title}')";
     //saljemo podatke u bazu podataka
     $create_category_query = mysqli_query($connection,$query);

     if(!$create_category_query){
      die('QUERRY FAILED' . mysqli_error($connection));
     }
    }
   }

}

function findAllCategories(){

    global $connection;

    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection,$query); //smjestam kategorije u bazu podataka
    while($row = mysqli_fetch_assoc($select_categories)){
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
    echo "<tr>";
    echo "<td>{$cat_id}</td>";
    echo "<td>{$cat_title}</td>";
    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
    echo "/<tr>";
    }
}

function deleteAllCategories(){
global $connection;
if(isset($_GET['delete'])){
    $the_cat_id = $_GET['delete']; 
    //brisi iz kategorija kad je cat_id = trazenom id za brisanje
    $query ="DELETE FROM categories WHERE cat_id = {$the_cat_id}"; 
    $delete_query = mysqli_query($connection, $query); //trazim da se izvrseno primijeni na bazu
    header('Location: categories.php'); //rifresujem stranicu da bi se zahtjev izvrsio na prvi klik
}

}



?>