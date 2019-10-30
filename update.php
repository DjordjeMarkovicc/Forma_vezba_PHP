<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Forma</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    body {
        padding-top: 70px;
        background: aqua;
        }
.help-block {
            color: red;
        }
    .glavni{
        background: white;
        margin: auto;
        width: 80%;
        border: 5px solid black;
        height: auto;
        }
    h1{
        text-align: center;
        text-shadow: 2px 2px 8px gray;
}
.centar{
    padding: 60px;
}

}
</style>
<?php

function TextForm($Ime, $Error){
    if(empty($Ime)){
        return ' &#42;morate popuniti polje';       
    }
    else if(strlen($Ime)<=4){
        return ' &#42;Ovo polje mora imati vise od 4 karaktera';
    }
    else {
        return '';
    };
    return $Error;
};
$niz= [
$errorName='',
$errorEmail='',
$errorComment='',
$errorGender='',
$errorYears='',
$errorChekbox=''
];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!empty($_GET['id'])) {
        $_id = (int)$_GET['id'];
        // $id = $_id;
        require 'db.php';
        $sql = "SELECT * FROM osobe_komentari WHERE id=$_id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $personData = $result->fetch_assoc();
        } else {
            die("Strana nije pronadjena");
        }
    }
} 
// var_dump($personData);
// die();


else if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $ime1 = $_POST['ime'];
    $email1 = $_POST['email'];
    $poruka1 = $_POST['poruka'];
    $PolPoruka = '';


$errorName= TextForm($ime1, $errorName);
$errorEmail= TextForm($email1, $errorEmail);
$errorComment= TextForm($poruka1, $errorComment);



    if(!isset($_POST['pol'])){
        $errorGender = ' &#42;morate izabrati pol';
    }
    else if($_POST['pol'] == 'M'){
        $PolPoruka= 'Dobar dan Gospodine.';
    }
    else if($_POST['pol'] == 'Z'){
        $PolPoruka= 'Dobar dan Gospodjo.';
    }
    if(isset($_POST['godine']) == ''){
        $errorYears = ' &#42;morate izabrati koliko imate godina';
    }
    if(!isset($_POST['cb'])){
        $errorChekbox = ' &#42;morate se sloziti sa uslovima koriscenja';
    }
    if ($errorName === '' && $errorEmail == '' && $errorComment == '' 
    && $errorGender == '' && $errorYears == '' && $errorChekbox == ''){
        $Pid = $_POST['id'];
        $_ime = $_POST['ime'];
        $_email = $_POST['email'];
        $_poruka = $_POST['poruka'];
        $_pol = $_POST['pol'];
        $_god = $_POST['godine'];
        require 'db.php';
        
        $time = time();

        $sql1 = "UPDATE osobe_komentari SET ime_prezime='$_ime',
         email='$_email', komentar='$_poruka', pol='$_pol', god='$_god', created_at='$time' 
         WHERE id='$Pid'";

        if ($conn->query($sql1) !== true) {
            die("Error updating record: " . $conn->error);
        }
        header("Location: http://localhost/cet/Vezba/formaNew/forma.php");
        die('');
    // die('' . $PolPoruka . '
    // <p>Hvala Vam <strong>' .$_ime .'</strong> na popunjenom obrascu i na vasem komentaru: 
    // </p><pre> '.$_poruka.'</pre> <p>Odgovoricemo Vam sto pre na vas e-mail: 
    // <em>'.$_email.'</em></p>');
    };
};

?>
</head>
<body>
    <div class="container glavni">
    <br><br><h1>FORMA</h1>

<div class="row centar">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
<div class="form-group">
    <fieldset><legend><strong>Izmenite podatke</strong></legend><br>
    <input type="hidden" id="custId" name="id" value="<?= !empty($personData) ? $personData['id'] : '' ?>">
        <p><label>Ime i prezime: </label> <input type="text" name="ime" size="20" maxlength="40" 
        value="<?= !empty($personData) ? $personData['ime_prezime'] : ''  ?>">
            <span class='help-block'><?= $errorName;?></span></p><br>

        <p><label>E-mail adresa: </label> <input type="email" name="email" size="20" maxlength="40"
        value="<?= !empty($personData) ? $personData['email'] : ''  ?>">
            <span class='help-block'><?= $errorEmail;?></span></p><br>

        <p><label for="pol">Izaberite pol: </label>
            <input type="radio" name="pol" value="M"> Musko
             <input type="radio" name="pol" value="Z"> Zensko
             <span class='help-block'><?= $errorGender;?></span></p><br>


        <p><label>Koliko imate godina: </label> <select name="godine">
            <option value="" selected disabled ></option>
            <option value="0-29">Manje od 30</option>
            <option value="30-60">Od 30 do 60</option>
            <option value="60+">Vise od 60</option>
        </select><span class='help-block'><?= $errorYears;?></span></p><br>


        <p><label>Posaljite nam poruku:</label><br><textarea rows="6" cols="40" name="poruka"
        ><?= !empty($personData) ? $personData['komentar'] : ''  ?></textarea>
        <span class='help-block'><?= $errorComment;?></span></p><br>
        <p><input type="checkbox" name="cb" value="Yes"> Slazem se sa uslovima
        <span class='help-block'><?= $errorChekbox;?></span></p><br>
    </fieldset>
        <p ><input id="centar" type="submit" name="submint" value="Submint"></p>
</form>
</div>
</div>
    </div>
</body>
</html>