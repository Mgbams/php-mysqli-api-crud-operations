<?php 

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {

 case 'POST': // create data

      $data = json_decode(file_get_contents('php://input'), true);  // true means you can convert data to array
    //  print_r($data);
      postData($data);
      break;

 	case 'GET': // read data
		  getData();
    	break;

  case 'PUT': // update data
      $data = json_decode(file_get_contents('php://input'), true);  // true means you can convert data to array
      putData($data);
      break;

  case 'DELETE': // delete data
      $data = json_decode(file_get_contents('php://input'), true);  // true means you can convert data to array
		  deleteData($data);
    	break;

  default:
    	print('{"result": "Requested http method not supported here."}');

}


/*  CRUD operations*/

  function putData($data){
    include "bdd.php";

    $id = $data["id"];
    $nom = $data["nom"];
    $phone = $data["phone"];
    // $area = $data["address"]["area"];
    // $road = $data["address"]["road"];
   //  $fullAddress = $area . ", " . $road;

    $sql = "UPDATE test SET nom = '$nom', phone = '$phone', date_time = NOW() WHERE id = '$id'";

    if (mysqli_query($conn, $sql) or die()) {
        echo '{"result": "Success"}';
    } else {
        echo '{"result": "Sql error"}';
    }

  }

  function getData(){

    include "bdd.php";

    $query = "SELECT * FROM test";

    $output = mysqli_query($conn, $query);

    if (mysqli_num_rows($output) > 0) {
        // output data of each row
      $rows = array();
       while($r = mysqli_fetch_assoc($output)) {
          $rows["result"][] = $r; // with result object
        //  $rows[] = $r; // only array
       }
      echo json_encode($rows);

    } else {
        echo '{"output": "empty table, no available data"}';
    }

  }

  function postData($data){
   // print_r($data);
 
    include "bdd.php";

    $nom = $data["nom"];
    $phone = $data["phone"];
    // $area = $data["address"]["area"];
    // $road = $data["address"]["road"];
   // $fullAddress = $area . ", " . $road;
   // $datetime = $data["datetime"];

    $query = "INSERT INTO test(nom, phone, date_time) VALUES('$nom', '$phone', NOW())";

    if (mysqli_query($conn, $query)) {
        echo '{"output": "Success"}';
    } else {
        echo '{"output": "Sql error"}';
    }



  }

  function deleteData($data){

    include "bdd.php";

    $id = $data["id"];

    $sql = "DELETE FROM test WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo '{"result": "Success"}';
    } else {
        echo '{"result": "Sql error"}';
    }

  }


 ?>