<?php 
session_start();



$conn = new mysqli("localhost", "root", "", "budget-baru");

$income = 0;
$incomeAwal = 0;
$total = 0;

$id_user = $_SESSION["user"]["id_user"];
$result = mysqli_query($conn, "SELECT * FROM budget WHERE id_user = $id_user ");
while($row = $result->fetch_assoc()){
    $total = $total + $row['pengeluaran'];

}

$ambilincome = mysqli_query($conn, "SELECT * FROM income WHERE id_user = $id_user"); 
while($row = $ambilincome->fetch_assoc()) {
    $incomeAwal = $row["income"];
    $income =  $row["income"] - $total;
} 



function queryData($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows [] = $row;
     }
     return $rows;

}

function tambah($data) {
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $income = htmlspecialchars($data["income"]);
    $id_user = $_SESSION["user"]["id_user"];


    $query = "INSERT INTO budget VALUES ('', '$id_user', '$nama', '$income')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);



}

function tambahIncome($data) {
    global $conn;

    $pendapatan = htmlspecialchars($data["pendapatan"]);
    $id_user = $_SESSION["user"]["id_user"];


    $query = "INSERT INTO income VALUES ('', '$id_user','$pendapatan')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);



}

function ubah ($data) {
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $income = htmlspecialchars($data["income"]);

    
    $query = "UPDATE budget SET    
                nama = '$nama',
                pengeluaran = '$income'
            WHERE id_budget = $id
    ";

mysqli_query($conn, $query);
return mysqli_affected_rows($conn);


}


function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM budget WHERE id_budget = $id");
    return mysqli_affected_rows($conn);
}










?>