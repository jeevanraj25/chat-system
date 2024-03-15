<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Tables</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            transition: background-color 0.3s ease;
        }
        body.dark-mode {
            background-color: #333;
            color: #fff;
        }
        /* Styles for tables */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            transition: background-color 0.3s ease;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            background-color: #fff;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #333;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .dark-mode table {
            background-color: #444;
            color: #fff;
        }
        .dark-mode th {
            background-color: #222;
        }
        .dark-mode tr:nth-child(even) {
            background-color: #666;
        }
        .dark-mode tr:hover {
            background-color: #555;
        }
        button {
            padding: 10px;
            border-radius: 100px;
            background-color: #555;
            border: none;
            color: #fff;
            cursor: pointer;
            transition: box-shadow 0.3s ease, background-color 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            outline: none;
            font-size: 25px;
        }

        button:hover {
            background-color: #444;
        }

        button:active {
            background-color: #333;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
<button onclick="toggleDarkMode()"><span class="sun-symbol">&#9728;</span></button>

<div class="container">
    <h2>User Details</h2>
    <?php
     session_start();
     include_once "php/config.php"; 
    // PHP code to fetch and display user details
    // New Query to fetch users' first name, last name, email, and phone
    $sql_details = "SELECT fname, lname, email, phone_number FROM users";
    $query_details = mysqli_query($conn, $sql_details);

    // Initialize output for the third table with headers
    $output = "<table border='1' style='margin-top:20px;'>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>";

    if(mysqli_num_rows($query_details) == 0){
        $output .= "<tr><td colspan='4'>No user details available</td></tr>";
    } else {
        while($row = mysqli_fetch_assoc($query_details)) {
            $output .= "<tr>
                            <td>" . htmlspecialchars($row['fname']) . "</td>
                            <td>" . htmlspecialchars($row['lname']) . "</td>
                            <td>" . htmlspecialchars($row['email']) . "</td>
                            <td>" . htmlspecialchars($row['phone_number']) . "</td>
                        </tr>";
        }
    }
    $output .= "</table>"; // Close the third table tag

    echo $output; // Output of the third table
    ?>

</div>
<div class="container">
    <h2>User List</h2>
    <?php
    // PHP code to fetch and display user list
   // Ensure this file has the $conn variable for MySQL connection

    // Fetch all users
    $sql = "SELECT * FROM users";
    $query = mysqli_query($conn, $sql);

    // Initialize output with the beginning of the first table and headers
    $output = "<table border='1'>
                <tr>
                    <th>Name</th>
                    <th>Branch</th>
                </tr>";

    if(mysqli_num_rows($query) == 0){
        $output .= "<tr><td colspan='2'>No users are available to chat</td></tr>";
    } else {
        while($row = mysqli_fetch_assoc($query)) {
            $output .= "<tr>
                            <td>" . htmlspecialchars($row['fname']) . "</td>
                            <td>" . htmlspecialchars($row['branch']) . "</td>
                        </tr>";
        }
    }
    $output .= "</table>"; // Close the first table tag

    echo $output; // Output of the first table
    ?>
</div>

<div class="container">
    <h2>Branch-wise User Count</h2>
    <?php
    // PHP code to fetch and display branch-wise user count
    // Query to count the number of users in each branch
    $sql_count = "SELECT branch, COUNT(*) AS user_count FROM users GROUP BY branch";
    $query_count = mysqli_query($conn, $sql_count);

    // Initialize output for the second table with headers
    $output = "<table border='1' style='margin-top:20px;'>
                <tr>
                    <th>Branch</th>
                    <th>User Count</th>
                </tr>";

    if(mysqli_num_rows($query_count) == 0){
        $output .= "<tr><td colspan='2'>No branch data available</td></tr>";
    } else {
        while($row = mysqli_fetch_assoc($query_count)) {
            $output .= "<tr>
                            <td>" . htmlspecialchars($row['branch']) . "</td>
                            <td>" . htmlspecialchars($row['user_count']) . "</td>
                        </tr>";
        }
    }
    $output .= "</table>"; // Close the second table tag

    echo $output; // Output of the second table
    ?>
</div>


<div class="container">
    <h2>Message Count in Group chat</h2>
    <?php
    // PHP code to fetch and display total message count
    include_once "php/config.php"; // Ensure this file has the $conn variable for MySQL connection

    // Query to count the total number of messages in the group_chat table
    $sql_messages = "SELECT COUNT(*) AS total_messages FROM groupchat";
    $query_messages = mysqli_query($conn, $sql_messages);
    $row_messages = mysqli_fetch_assoc($query_messages);
    $totalMessages = $row_messages['total_messages'];

    // Display the total message count
    echo "<table border='1'>
            <tr>
                <th>Total Messages</th>
            </tr>
            <tr>
                <td>$totalMessages</td>
            </tr>
          </table>";
    ?>
</div>
<div class="container">
    <h2>Average Message Length</h2>
    <?php
    // PHP code to fetch and display average message length
    // Query to calculate the average length of messages in the group_chat table
    $sql_avg_length = "SELECT AVG(LENGTH(message_text)) AS avg_length FROM groupchat";
    $query_avg_length = mysqli_query($conn, $sql_avg_length);
    $row_avg_length = mysqli_fetch_assoc($query_avg_length);
    $avgLength = $row_avg_length['avg_length'];

    // Display the average message length
    echo "<table border='1'>
            <tr>
                <th>Average Length</th>
            </tr>
            <tr>
                <td>$avgLength</td>
            </tr>
          </table>";
    ?>
</div>

<script>
    function toggleDarkMode() {
        const body = document.body;
        body.classList.toggle('dark-mode');
    }
</script>
</body>
</html>
