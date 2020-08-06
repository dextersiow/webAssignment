<style>
    .row{
        padding-bottom: 10px;  
    }
    .mini-header{
        margin-left: 25px;
        color: black;
    }
    .mini-header:hover{
        color: lightgreen;
        text-decoration:none;
    }  

    #link-nav-right{
        color: white;
    }

    .nav-item:hover, .navbar-brand:hover{
        font-weight: bold;
    }
</style>

<div class="container-header">
    <img src="pics/logo.jpeg" class="mx-auto d-block"> 
    <p></p>
</div>

<nav class="navbar navbar-expand-md bg-warning navbar-dark">
    <a class="navbar-brand" href="index.php">CHELL'S FRUITS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">What's NEW<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Promotion</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="admin_login.php">Admin</a>
            </li> 
            <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="product.php" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="product.php">All</a>
          <a class="dropdown-item" href="#">Seasonal fruits</a>
          <a class="dropdown-item" href="#">Stone fruits</a>
          <a class="dropdown-item" href="#">Berries</a>
          <a class="dropdown-item" href="#">Tropical and exotic</a>          
          <a class="dropdown-item" href="#">Others</a>
        </div>
        </li>
        </ul>
        <ul class="nav justify-content-end">
            <li class="nav-item active">
                <a class="nav-link" id="link-nav-right" href="signin.php">Sign In/Register</a>    
            </li>
            <li class="nav-item active">
                <a class="nav-link" id="link-nav-right" href="cart.php">Cart</a>
            </li>
        </ul>
    </div>
</nav>
