<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>sobre nós</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />


   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>


<div class="heading">
   <h3>sobre nós</h3>
   <p><a href="home.php">inicio</a> <span> / sobre nós</span></p>
</div>


<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/about.png" alt="">
      </div>

      <div class="content">
         <h3>Nossa missão</h3>
         <p>Transformar cada mordida em um momento especial. Somos apaixonados por cupcakes e adoramos criar sabores irresistíveis e decorações que fazem os olhos brilhar. Desde nossa loja online, entregamos bolinhos fresquinhos e cheios de carinho para sua casa, porque acreditamos que a vida merece um pouco mais de doçura.</p>
         <a href="menu.php" class="btn">menu</a>
      </div>

   </div>

</section>


<section class="steps">

   <h1 class="title">Seu pedido a 3 passos de distância:</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/step-1.png" alt="">
         <h3>Selecione seus cupcakes</h3>
         <p>Sabores, quantidade, etc.</p>
      </div>

      <div class="box">
         <img src="images/step-2.png" alt="">
         <h3>Entrega em até 40 minutos</h3>
         <p>*Conforme demanda de pedidos.</p>
      </div>

      <div class="box">
         <img src="images/step-3.png" alt="">
         <h3>Curta seu pedido!</h3>
         <p>Sua satisfação é a nossa alegria!</p>
      </div>

   </div>

</section>

<?php include 'components/footer.php'; ?>


<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   grabCursor: true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
      slidesPerView: 1,
      },
      700: {
      slidesPerView: 2,
      },
      1024: {
      slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>