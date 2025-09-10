<?php
$conn = new mysqli("localhost", "root", "", "users");


if (isset($_GET["action"]) && $_GET["action"] == "delete" && isset($_GET["id"])) 
{
    $id = intval($_GET["id"]);
    $conn->query("DELETE FROM test1 WHERE id=$id");
}


if (isset($_POST["action"]) && $_POST["action"] == "insert") 
{
    if (!empty($_POST["sid"]) && !empty($_POST["sname"]) && !empty($_POST["smark"])) 
    {
        $id = $_POST["sid"];
        $name = $_POST["sname"];
        $marks = $_POST["smark"];
        $conn->query("INSERT INTO test1 (id, name, marks) VALUES ('$id', '$name', '$marks')");
    }
}

if (isset($_POST["action"]) && $_POST["action"] == "update") 
{
    if (!empty($_POST["sid"]) && !empty($_POST["sname"]) && !empty($_POST["smark"])) 
    {
        $id = $_POST["sid"];
        $name = $_POST["sname"];
        $marks = $_POST["smark"];
        $conn->query("UPDATE test1 SET name='$name', marks='$marks' WHERE id='$id'");
    }
}


$result = $conn->query("SELECT * FROM test1");

echo "<table border='1' cellpadding='5'>";
echo "<tr><th>ID</th><th>Name</th><th>Marks</th></tr>";
while ($row = $result->fetch_assoc()) 
{
    echo "<tr>";
    echo "<td>".$row["id"]."</td>";
    echo "<td>".$row["name"]."</td>";
    echo "<td>".$row["marks"]."</td>";
    echo "</tr>";
}
echo "</table>";

$conn->close();
?>
