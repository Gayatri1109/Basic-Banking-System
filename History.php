<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="css/Customers.css">
     <link rel="stylesheet" href="css/History.css">

    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <style type="text/css">
        /* Style sheet */
        body{
            background-image: url('images/background.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            image-rendering: pixelated;
        }
        .bg-light {
            background-color: #dbe4f0 !important;
            height: 45px;
        }
        .sendMoney {
        text-decoration: none;
        padding: 1rem 1.2rem;
        background-color:#33FFCC !important;
        margin-left: 5px;
        padding: 0.75rem;
        transition: all 0.3s ease;
        border-radius: 0.5rem;
        border:ridge white;
      }

    </style>
</head>

<body>
    <!-- navbar starts here  -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="./index.html"><b>GMM  BANK</b></a>
      <img src="https://www.flaticon.com/svg/static/icons/svg/1138/1138038.svg" width="25px" height="25px" alt="">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./History.php">History</a>
                </li>

            </ul>
        </div>
    </nav>
    <!-- navbar ends here  -->

    <div class="my-info text-center">
        <button class="btn sendMoney" data-toggle="modal" data-target="#sendMoney"><a href="Transfer.php ">Send Money</a></button>
        <button class="btn sendMoney" data-toggle="modal" data-target="#sendMoney"><a href="Customers.php ">Customer Details</a></button>

    </div>
    <!-- Navigation Bar code ends here -->
    <div class="table-wrapper">
        <table class="fl-table">

            <thead>
                <tr>
                    <th>Sender's Name</th>
                    <th>Receiver's Name</th>
                    <th>Amount</th>
                    <th>Date and Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "bank_details";
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                ?>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "bank_details";
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                //sql query to display 
                $sql = "SELECT * FROM transaction_history ORDER BY Date_Time DESC;";
                $result = $conn->query($sql);
                error_reporting(0);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        //Output of each row
                        echo "<tr><td>" . $row["Sender"] . "</td><td>" . $row["Receiver"] . "</td><td>" . "₹ " . $row["Amount"] . "</td><td>" . $row["Date_Time"] . "</td></tr>";
                    }
                } else {
                    echo "<h2 style ='color:#1a4984;'>0 results</h3>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>