<h2>RESTFUL POST</h2>
<?php

$id = $_POST['id'];

if (isset($id))
{
  echo "<h3>ID VALUE IS $id</h3>";
  $data = ["id"=>$id, "text"=>"sample text"];
  $data = json_encode($data); // json data

  $url = "http://localhost/WS_REST/POST_JSON/api.php";
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_POST, 1);
  //curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data)));
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
  //curl_setopt($curl, CURLINFO_HEADER_OUT, true);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($curl);
  $result = json_decode($result);
  curl_close ($curl);

  echo "<table>";
  echo "<tr><td>ID:</td><td>$result->id</td></tr>";
  echo "<tr><td>My Text is:</td><td>$result->text</td></tr>";
  echo "<tr><td>book:</td><td>$result->book</td></tr>";
  echo "<tr><td>price:</td><td>$result->price</td></tr>";
  echo "<tr><td>Code:</td><td>$result->code</td></tr>";
  echo "<tr><td>Desc:</td><td>$result->desc</td></tr>";
  echo "</table>";
}
?>
