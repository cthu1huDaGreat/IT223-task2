<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "embodo_db";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id, Name, Email, Password, Contact, Gender FROM usertbi";
        $result = $conn->query($sql);

        $rows = [];
        $error = null;
        if ($result) {
            while ($r = $result->fetch_assoc()) {
                $rows[] = $r;
            }
            $result->free();
        } else {
            $error = $conn->error;
        }

        $conn->close();
    ?>

    <div class="container mt-5">
        <table class="table table-bordered">
            <thead class="table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Contact</th>
                    <th>Gender</th>
                </tr>
            </thead>
            <tbody>

                <?php if (!empty($rows)):
                     foreach ($rows as $row): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['Name']); ?></td>
                            <td><?php echo htmlspecialchars($row['Email']); ?></td>
                            <td><?php echo htmlspecialchars($row['Password']); ?></td>
                            <td><?php echo htmlspecialchars($row['Contact']); ?></td>
                            <td><?php echo htmlspecialchars($row['Gender']); ?></td>
                        </tr>
                    <?php endforeach;
                    else: ?>
                    <tr>
                        <td colspan="6">
                            No results found<?php echo $error ? ': '.htmlspecialchars($error) : '';?>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>


</body>
</html>