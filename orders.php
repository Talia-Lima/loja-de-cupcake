<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pedido</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   

<?php include 'components/user_header.php'; ?>


<div class="heading">
   <h3>Pedidos</h3>
   <p><a href="home.php">inicio</a> <span> / pedido</span></p>
</div>

<section class="orders">

   <h1 class="title">Seu Pedido</h1>

   <div class="box-container">

   <?php
      if($user_id == ''){
         echo '<p class="empty">Por favor, entre para ver seus pedidos!</p>';
      }else{
         $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
         $select_orders->execute([$user_id]);
         if($select_orders->rowCount() > 0){
            while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p>Data : <span><?= (new DateTime($fetch_orders['placed_on']))->format('d/m/Y'); ?></span></p>
      <p>Nome : <span><?= $fetch_orders['name']; ?></span></p>
      <p>Email : <span><?= $fetch_orders['email']; ?></span></p>
      <p>Contato : <span><?= $fetch_orders['number']; ?></span></p>
      <p>Endereço : <span><?= $fetch_orders['address']; ?></span></p>
      <p>Pagamento : <span><?= $fetch_orders['method']; ?></span></p>
      <p>Seu pedido : <span><?= $fetch_orders['total_products']; ?></span></p>
      <p>Total : <span>R$<?= $fetch_orders['total_price']; ?></span></p>
      <?php
      $status_pt = [
      'pending' => 'Pendente',
      'completed' => 'Completo'
      ];
      $cor_status = ($fetch_orders['payment_status'] == 'pending') ? 'red' : 'green';
      ?>
      <p> Status de Pagamento : <span style="color:<?= $cor_status; ?>"><?= $status_pt[$fetch_orders['payment_status']] ?? $fetch_orders['payment_status']; ?></span> </p>

   </div>
   <?php
      }
      }else{
         echo '<p class="empty">nenhum pedido feito ainda!</p>';
      }
      }
   ?>

   </div>

</section>

<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>