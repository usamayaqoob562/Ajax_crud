<?php
session_start();
include "conn.php";


$isAdmin = (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin');

$sql    = "SELECT * FROM students"; 
$result = mysqli_query($conn, $sql);

$output = '<table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Mobile</th>';

if ($isAdmin) {
    $output .= '<th>Action</th>';
}

$output .= '    </tr>
            </thead>
            <tbody>';

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['first_name']}</td>
                        <td>{$row['last_name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['mobile']}</td>";

        if ($isAdmin) {
            $output .= "<td>
                            <button class='btn btn-warning btn-sm editBtn' data-id='{$row['id']}'>Edit</button>
                            <button class='btn btn-danger btn-sm deleteBtn' data-id='{$row['id']}'>Delete</button>
                        </td>";
        }

        $output .= "</tr>";
    }
} else {
    $output .= "<tr><td colspan='6' class='text-center'>No Record Found</td></tr>";
}

$output .= '</tbody></table>';

echo $output;
?>