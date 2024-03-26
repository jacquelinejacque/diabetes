


     <header>
                <a href="/" class="text-decoration-none" style="text-transform: uppercase; padding-left: 1rem" ><b>Diacare</b></a>
                   <ul style="padding-right: 1rem;" >
                       <?php
                       if(isset($_SESSION['role']) && $_SESSION['role'] == 'doctor'){
                           echo '<li><a href="/Doctor/index.php">Dashboard</a></li>';
                           echo '<li><a href="../logout.php">Logout</a></li>';
                       }
                       else if(isset($_SESSION['role']) && $_SESSION['role'] == 'patient'){
                           echo '<li><a href="../Patient/index.php">Dashboard</a></li>';
                           echo '<li><a href="../logout.php">Logout</a></li>';
                       }
                       else {
                           echo '<li><a href="login.php">Login</a></li>';
                           echo '<li><a href="redirect.php">Register</a></li>';
                       }
                       ?>

                   </ul>

    </header>
     <style>
         header{
             background:white;
             display:flex;
             justify-content: space-between;
             align-items: center;
         }
         ul {
             display:flex;
             list-style: none;
         }
         ul li {

         }
         ul li a {
             padding: 0.5rem 1rem;
             text-decoration: none;
             text-transform: uppercase;
         }
         ul li a:hover{
             background-color: #80bdff;
             cursor: pointer;
         }
     </style>