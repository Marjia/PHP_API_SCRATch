<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <p>API Tutorial</p>
    <?php
    try {
      include_once 'config/Database.php';
      include_once 'models/Post.php';

    } catch (Error $e) {
      echo "include Error!: " . $e->getMessage();
    }

    // include_once 'config/Database.php';
    // include_once 'models/Post.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();
    //print_r($db);

    // Instantiate blog post object
    try {
      $post = new Post($db);
      $result = $post->read();
      //$row = $result->fetch(PDO::FETCH_ASSOC);
      //print_r($result);
      // Get row count
      $num = $result->rowCount();
      echo $num;

    } catch (Error $e) {
      echo " show data  Error!: " . $e->getMessage();

    }


     ?>
  </body>
</html>
