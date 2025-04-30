<?php
    // Start Session (if page include $_SESSION)
    session_start();

    // Connect to Database
    // 1. database info
    $host = "127.0.0.1";
    $database_name = "todolist";
    $database_user = "root";
    $database_password = "";

    // 2. Connect PHP with MYSQL database
    // PDO (PHP Database Object)
    $database = new PDO("mysql:host=$host;dbname=$database_name", $database_user, $database_password);

    // 3. Get data from database
    // 3.1 - SQL Command(recipe)
    $sql = "SELECT * FROM todos";
    // 3.2 - prepare SQL query(prep material)
    $query = $database->prepare($sql);
    // 3.3 - execute SQL query(cook)
    $query->execute();
    // 3.4 - fetch result from query(eat)
    $todos = $query->fetchAll();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>TODO App</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
        <style type="text/css">
            body {
                background: #f1f1f1;
            }
        </style>
    </head>
    <body>
        <div class="card rounded shadow-sm" style="max-width: 500px; margin: 60px auto;">
            <div class="card-body">
                <h3 class="card-title mb-3">My Todo List</h3>
                <?php if(isset($_SESSION["user"])):?>
                    <span></span>
                <?php else: ?>
                    <div class="pb-2">
                        <a href="login.php">Log In</a>
                        <a href="signup.php">Sign Up</a>
                    </div>
                <?php endif;?>
                <?php if(isset($_SESSION["user"])):?>
                    <ul class="list-group">
                        <?php foreach ($todos as $index => $todo) { ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <form method="POST" action="update_task.php">
                                        <input type="hidden" name="task_id" value="<?php echo $todo ["id"];?>"/>
                                        <input type="hidden" name="completed" value="<?php echo $todo ["completed"];?>"/>
                                        <?php if ($todo["completed"] == 0) {?>
                                            <button class="btn btn-sm btn-light"><i class="bi bi-square"></i></button>
                                            <span class="ms-2"><?php echo $todo["label"];?></span>
                                        <?php } else { ?>
                                            <button class="btn btn-sm btn-success"><i class="bi bi-check-square"></i></button>
                                            <span class="ms-2 text-decoration-line-through"><?php echo $todo["label"];?></span>
                                        <?php } ?>
                                    </form>
                                </div>
                                <div>
                                    <form method="POST" action="delete_task.php">
                                        <input type="hidden" name="task_id" value="<?php echo $todo ["id"];?>"/>
                                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                <?php endif;?>
                <?php if(isset($_SESSION["user"])):?>
                    <div class="mt-4">
                        <form class="d-flex justify-content-between align-items-center" method="POST" action="add_task.php">
                            <input type="text" class="form-control" placeholder="Add new item..." name="label_name" required/>
                            <button class="btn btn-primary btn-sm rounded ms-2">Add</button>
                        </form>
                    </div>
                <?php endif;?>
            </div>
        </div>

        <?php if(isset($_SESSION["user"])):?>
            <div class="d-flex justify-content-center">
                <a href="logout.php">Log Out</a>
            </div>
        <?php endif;?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>