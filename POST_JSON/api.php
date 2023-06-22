<?php
//header("Content-Type:application/json");
$data = file_get_contents("php://input"); // read http body
$data = json_decode($data);
$id = $data->id;
$text = $data->text;

$books =
[
  1=>["C++ Qt", "50000"],
  2=>["PHP", "40000"],
  3=>["YII2", "45000"],
  4=>["PYTHON", "20000"],
  5=>["HTML", "15000"]
];


if (isset($id))
{
  if($id > 0 && $id < 6)
  {
    response($id,$text,$books[$id][0], $books[$id][1], 200, "SUCCESSFUL");
  }
  else
    response(NULL,NULL, NULL, NULL, 400,"Invalid ID");
}
else
  response(NULL,NULL, NULL, NULL, 400,"Invalid Request");


function response($id,$text,$book,$price, $code,$desc)
{
  $response['id'] = $id;
  $response['text'] = $text;
  $response['book'] = $book;
  $response['price'] = $price;
  $response['code'] = $code;
  $response['desc'] = $desc;

  $json_response = json_encode($response);
  echo $json_response;
}
?>
