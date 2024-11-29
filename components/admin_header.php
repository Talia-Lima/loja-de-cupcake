<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <section class="flex">

      <a href="dashboard.php" class="logo">Painel<span>Admin</span></a>

      <nav class="navbar">
         <a href="dashboard.php">Início</a>
         <a href="products.php">Produtos</a>
         <a href="placed_orders.php">Pedidos</a>
         <a href="admin_accounts.php">Administrador</a>
         <a href="users_accounts.php">Usuário</a>
         <a href="messages.php">Mensagens</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `admin` WHERE id = ?");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile['name']; ?></p>
         <a href="update_profile.php" class="btn">alterar perfil</a>
         <div class="flex-btn">
            <a href="admin_login.php" class="option-btn">login</a>
            <a href="register_admin.php" class="option-btn">registrar</a>
         </div>
         <a href="../components/admin_logout.php" onclick="return confirm('tem certeza que quer sair?');" class="delete-btn">sair</a>
      </div>

   </section>

</header>