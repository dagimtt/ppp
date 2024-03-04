<?php
include('product.php');
$conn = new mysqli($servername, $username, $password, $product);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Check if there are rows in the result
if ($result->num_rows > 0) {
    // Output data in a Bootstrap-styled table
    echo '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Product Display</title>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            </head>
            <body>
                <div class="container mt-5">
                    <h2 class="mb-4">Product Table</h2>
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Product ID</th>
                                
                                <th scope="col">Product Type</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>';

    // Output data rows with alternating background colors
    $count = 1;
    while ($row = $result->fetch_assoc()) {
        $bgColorClass = $count % 2 == 0 ? 'bg-light' : ''; // Alternate background color
        echo '<tr class="' . $bgColorClass . '">
                <th scope="row">' . $count . '</th>
                <td>' . $row["productid"] . '</td>
                
                <td>' . $row["producttype"] . '</td>
                <td>' . $row["quantity"] . '</td>
                <td>' . $row["date"] . '</td>
              </tr>';
        $count++;
    }

    echo '</tbody>
          </table>
          </div>
          </body>
          </html>';
} else {
    echo "No records found";
}
?>
