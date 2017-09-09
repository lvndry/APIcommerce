<?php
// Routes

$app->get('/hello/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});


$app->get('/api/customers', function($request, $response, $args) {
  $sql = "SELECT * FROM customers";

  try {
    //init new database
    $db = new db();
    //Connect to database
    $db = $db->connect();
    $query = $db->query($sql);
    $customers = $query->fetchAll(PDO::FETCH_OBJ);

    echo json_encode($customers);
  } catch (PDOException $e) {
      echo "error : ". $e->getMessage();
    }
  });

$app->post('/api/add/customers', function($request, $reponse, $args) {
  $name = $request->getParam('name');
  $age = $request->getParam('age');
  $adress = $request->getParam('adress');

  $sql = "INSERT INTO customers (name, age, adress) VALUES (:name, :age, :adress)";
  $query = $db->prepare($sql);
  $query->bindParams(':name', $name);
  $query->bindParams(':age', $age);
  $query->bindParams(':adress', $adress);

  $query->execute();

  echo "Customer added";
});
