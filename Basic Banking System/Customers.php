<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Details</title>
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css">
  <link rel="stylesheet" type="text/css" href="css/Customers.css">
  <style type="text/css">
    /*  Style sheet */
    body {
      background-image: url('images/background.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
      image-rendering: pixelated;
    }
    table {

      border-collapse: collapse;
      margin-top: 10px;
      margin-left: 220px;
      width:60%;
      height:auto;
      text-align: center;
      color:black ;
      font-family: sans-serif;
      background-color: #eee8aa;
    }

    td:first-child {
      padding-bottom: 1px;
      padding-top: 1px;
    }

    td:nth-child(even) {
      padding-bottom: 1px;
      padding-top: 1px;
    }

    th {
      border: 1px;
      background-color: #ffe4e1;
      color: black;
      padding: 10px;
      height: 50px;
      border: 1px;
    }

    tr:first-child {
      margin-bottom: 5px;
      background-color: #eee8aa;
    }

    tr:nth-child(even) {
      background-color: #ffa07a;
      color: black;
      
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
  </div>


  <table>
    <thead>
      <tr>
        <th>Customer ID</th>
        <th>Customer Name</th>
        <th>E-Mail ID</th>
        <th>A/C Balance</th>
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

      //sql query to display all
      $sql = "SELECT * FROM customer_details";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row["customer_ID"] . "</td><td>" . $row["customer_name"] . "</td><td>" . $row["E-mail"] . "</td><td>" . $row["Bank_balance"] . "</td></tr>";
        }
      } else {
        echo "0 results";
      }
      $conn->close();
      ?>
    </tbody>
  </table>
</body>

</html>