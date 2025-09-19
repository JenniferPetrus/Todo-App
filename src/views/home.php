<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo-App</title>
  <link rel="stylesheet" href="src/views/home.css?v=1.0">
</head>
<body>
  <h1><?php echo $message ?></h1>


  <form action="" method="post">
    <input type="text" name="name" id="title" placeholder="Todo Title">
    <input type="text" name="desc" id="description" placeholder="What todo?">
    <button type="submit" name="create">Create</button>
  </form>

  <div class="card-container">
    <?php
    foreach ($cards as $card) {
      echo $card;
    }
    ?>
  </div>
</body>
</html>