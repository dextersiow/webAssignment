<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
       <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="generator" content="Jekyll v4.0.1">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/starter-template/">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>  
    
    <link href="assets/css/bootstrap.css" rel="stylesheet">   
    <link href="assets/css/homepage.css" rel="stylesheet">    
    <script src="assets/javascript/bootstrap.bundle.js"></script>
      
    <title>CHELL'S FRUIT</title>
  
    <style>
                 
        
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      
      div.img {
    margin:30px 30px 50px;
    border: 1px solid #ccc;
    width: 160px;
   float: left;

}	

div.img:hover {
    border: 1px solid #777;
}

div.img img {
    width: 100%;
    height: 200px;
}

div.desc {
    padding: 25px;
    text-align: center;
    font-family:"Tw Cen MT";
}


.content-product
{
	display:block;
	color: black;
	margin-top:30px;
	font-family: "Tw Cen MT";
	padding:5px 0px 5px 20px;
	
}
   
    </style>
    </head>
    <body>
        <?php include'header.php' ?>
        
        <div class="jumbotron text-center">
            <h1>Products</h1>
        </div>
        
        <div class="container-fluid filter-toolbar">
            <label for="filter">Filter by: </label>
            <select name="filter">
                <option value="">All product</option>
                <option value="">Seasonal Fruit</option>
                <option value="">Stone Fruits</option>
                <option value="">Berries</option>
            </select>
        </div>
        
        <div class="content-product">
            <div class="img">
                <a target="_blank" href="#">
                    <img src="./pics/products/aiwen_mango.jpg"></img>
                </a>
                <div class="desc">Aiwen Mango<br/>RM 10.00</div>
            </div>
            <div class="img">
                <a target="_blank" href="#">
                    <img src="./pics/products/autumn_royal_black_grapes.jpg"></img>
                </a>
                <div class="desc">Aiwen Mango<br/>RM 10.00</div>
            </div>
            <div class="img">
                <a target="_blank" href="#">
                    <img src="./pics/products/hokkaido_honeydew.jpg"></img>
                </a>
                <div class="desc">Aiwen Mango<br/>RM 10.00</div>
            </div>
            <div class="img">
                <a target="_blank" href="#">
                    <img src="./pics/products/hokkaido_honeydew.jpg"></img>
                </a>
                <div class="desc">Aiwen Mango<br/>RM 10.00</div>
            </div>
            <div class="img">
                <a target="_blank" href="#">
                    <img src="./pics/products/hokkaido_honeydew.jpg"></img>
                </a>
                <div class="desc">Aiwen Mango<br/>RM 10.00</div>
            </div>
            <div class="img">
                <a target="_blank" href="#">
                    <img src="./pics/products/hokkaido_honeydew.jpg"></img>
                </a>
                <div class="desc">Aiwen Mango<br/>RM 10.00</div>
            </div>
        </div>
         <?php include'footer.php' ?>
    </body>
</html>
