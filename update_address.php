<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

if(isset($_POST['submit'])){

   $pin_code = $_POST['pin_code'];
   $pin_code = filter_var($pin_code, FILTER_SANITIZE_STRING);

   if(strlen($pin_code) !== 8 || !ctype_digit($pin_code)){
      $message[] = 'CEP inválido! Certifique se contém 8 dígitos.';
   } else {
      
      $address = $_POST['flat'] .', '. $_POST['city'] .', '. $_POST['state'] .', '. $_POST['country'] .' - '. $pin_code;
      $address = filter_var($address, FILTER_SANITIZE_STRING);

      $update_address = $conn->prepare("UPDATE `users` SET address = ? WHERE id = ?");
      $update_address->execute([$address, $user_id]);

      $message[] = 'Endereço salvo!';
   }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Endereço</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php' ?>

<section class="form-container">

   <form action="" method="post">
      <h3>Seu endereço</h3>
      <input type="text" class="box" placeholder="endereço" required maxlength="50" name="street">
      <input type="number" class="box" placeholder="cep" min="0" maxlength="8" minlength="8" pattern="[0-9]{8}" name="pin_code">
      <input type="text" class="box" placeholder="cidade" required maxlength="50" name="city">
      <input type="text" class="box" placeholder="estado" required maxlength="50" name="state">
      <input type="text" class="box" placeholder="pais" required maxlength="50" name="country">
      <input type="text" class="box" placeholder="complemento (ap, nome do condominio, etc)." required maxlength="50" name="flat">
      <input type="submit" value="Salvar endereço" name="submit" class="btn">
   </form>

</section>

<?php include 'components/footer.php' ?>


<script src="js/script.js"></script>

</body>
</html>