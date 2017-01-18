
<!DOCTYPE html>
<html>
<head>
    <style>
table, th, td {
    border: 1px solid black;
        }
    </style>
</head>
<body>
<?php

require_once("database.php");
$zoeken="SELECT locatiecode,locatie FROM locatie";

/* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */

echo "<form method='post' action='dropdown.php'><select onchange='this.form.submit()' name='locatie'>Locatie</option>"; // list box select command
echo "<option value='0'>Selecteer Locatie</option>";
foreach ($conn->query($zoeken) as $zoek){
    echo "<option value=$zoek[locatiecode]>$zoek[locatie]</option>";
}

echo "</select></form>";// Closing of list box
if(isset($_POST['locatie'])) {
    $dropdown = $_POST['locatie'];
    $tabel = "";
    $sql = "SELECT voorraad.productcode, voorraad.aantal, voorraad.locatiecode, product.product, product.type, product.fabriekscode, locatie.locatiecode, locatie.locatie FROM voorraad JOIN product ON voorraad.productcode = product.productcode JOIN locatie ON voorraad.locatiecode = locatie.locatiecode WHERE $dropdown = voorraad.locatiecode";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        echo "<table><tr><th>Productcode</th><th>Product</th><th>Aantal</th><th>Locatie</th></tr>";
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<tr><td>" . $row["productcode"] . "</td><td>" . $row["product"] . "</td><td>" . $row["aantal"] . "</td><td>" . $row['locatie'] . "</td></tr>";
        }
    } else {
        echo "Geen producten";
    }
}
else{
    $tabel = "";
    $sql = "SELECT voorraad.productcode, voorraad.aantal, voorraad.locatiecode, product.product, product.type, product.fabriekscode, locatie.locatiecode, locatie.locatie FROM voorraad JOIN product ON voorraad.productcode = product.productcode JOIN locatie ON voorraad.locatiecode = locatie.locatiecode";
    $result = $conn->query($sql);




    if ($result->num_rows > 0) {
        echo "<table><tr><th>Productcode</th><th>Product</th><th>Aantal</th><th>Locatie</th></tr>";
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            echo "<tr><td>" . $row["productcode"]. "</td><td>" . $row["product"]. "</td><td>" . $row["aantal"]. "</td><td>" . $row['locatie'] ."</td></tr>";
        }
    } else {
        echo "Geen producten";
    }
}
$conn->close();
?>
