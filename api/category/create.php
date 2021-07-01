<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

try {
  include_once '../../config/Database.php';
  include_once '../../models/Category.php';

} catch (Error $e) {

  echo "include create  category Error!: " . $e->getMessage();

}

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();
  echo $db;
  // Instantiate blog post object
  $category = new Category($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $category->name = $data->name;

  // Create Category
  if($category->create()) {
    echo json_encode(
      array('message' => 'Category Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Category Not Created')
    );
  }
