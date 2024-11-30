
<?php 

$url="https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

$response= file_get_contents(filename: $url );

echo $response;
print_r(value: $response);

$data=json_decode(json: $response, associative:  true);

echo $response;
print_r(value: $response);

if (!$data ||  !isset($data["result"]))  {
        die('error fetching the data from the api ');

}
$result = $data["result"];
print_r(value:$result);

 ?>

<html>
    <head>
        <title> </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="css/pico.min.css">
       <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body> 
    <table>
        <thead>
         <tr>
            
            <th>Semster  </th>
            <th>The Program </th>
            <th>Nationality</th>
            <th>colleges </th>
            <th>Number Of students </th>
         </tr>
        </thead>

        <tbody>
           <?php
             foreach($result as $student){  }
              ?>
               <tr>
              <td> <?php  echo $student["year"]; ?> </td>
                </tr>
        </tbody>

    </table>   
 
</html>