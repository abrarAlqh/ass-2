<?php 

$url = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

$response = file_get_contents($url); 
if ($response === FALSE) {
    die('Error fetching the data from the API: ' . error_get_last()['message']);
}

$data = json_decode($response, true);
if (!$data) {
    die('Error decoding JSON: ' . json_last_error_msg());
}

if (!isset($data["results"])) {
    die('Error: "results" key not found in the data.');
}

$result = $data["results"];

if (empty($result)) {
    die('No data available.');
}
?>

<html>
<head>
    <title>Student Inforamtion </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #ddd;
        }
    </style> 
</head>
<body> 
    <h1>Student Inforamtion</h1>
    <table>
        <thead>
            <tr>
                <th>Year</th>
                <th>Semester</th> 
                <th>The Program</th>
                <th>Nationality</th>
                <th>Colleges</th>
                <th>Number Of Students</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($result as $student) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($student["year"] ?? 'N/A') . '</td>';
            echo '<td>' . htmlspecialchars($student["semester"] ?? 'N/A') . '</td>'; 
            echo '<td>' . htmlspecialchars($student["the_programs"] ?? 'N/A') . '</td>'; 
            echo '<td>' . htmlspecialchars($student["nationality"] ?? 'N/A') . '</td>';
            echo '<td>' . htmlspecialchars($student["colleges"] ?? 'N/A') . '</td>'; 
            echo '<td>' . htmlspecialchars($student["number_of_students"] ?? 'N/A') . '</td>'; 
            echo '</tr>';
        }
        ?>  
        </tbody>
    </table>   
</body>
</html>
