<?php
// Pobierz identyfikator rekordu do usunięcia

if(isset($_GET["id"]))
{

$id = $_GET["id"];

$servername = "localhost";
$username = "root";
$password = "";
$databaseName = "wordpress";
$conn = new mysqli($servername, $username, $password, $databaseName);

// Sprawdź połączenie
if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

// Wykonaj zapytanie SQL, aby usunąć rekord z bazy danych
$sql = "DELETE FROM wp_popup WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Deleted.";
} else {
    echo "Error while performing operations: " . $conn->error;
}

// Zamknij połączenie
$conn->close();
echo '<script>window.location.href = document.referrer;</script>';
exit;
}
?>
