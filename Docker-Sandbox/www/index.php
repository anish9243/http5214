<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <?php
            $connect = mysqli_connect(
                'db',
                'demo' ,
                'password',
                'demo'
            );

            if (!$connect) {
                echo 'Error code: ' . mysqli_connect_errno();
                echo 'Error code: ' . mysqli_connect_error();
                exit;
            }

            $query = 'SELECT `Name`, `Hex` FROM colors';
            $result = mysqli_query($connect, $query);

            if (!$result) {
                echo 'Error Message ' . mysqli_error($connect);
                exit;
            } else {
                $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                foreach ($rows as $row) {
                    echo
                    '<div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">' . $row["Name"] . '</h5>
                    <div style="width: 100%; height: 50px; background-color: ' . $row["Hex"] . '" class="mb-1"></div>
                    <p class="card-text">Hex: ' . $row["Hex"] . '</p>
                    </div>
                </div>
            </div>';;
                }
                echo 'The Query Found ' . mysqli_num_rows($result);
                echo '<pre>';
                print_r($result);
                echo '</pre>';
            }
            ?>
        </div>
    </div>
</body>

</html>