<?php include("connection.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Gaurishankar Fashion & Trade Industries Pvt. Ltd.</title>
    <link href="layout/css/bootstrap.min.css" rel="stylesheet">
    <link href="layout/css/font-awesome.min.css" rel="stylesheet">
    <link href="layout/css/prettyPhoto.css" rel="stylesheet">
    <link href="layout/css/price-range.css" rel="stylesheet">
    <link href="layout/css/animate.css" rel="stylesheet">
	<link href="layout/css/main.css" rel="stylesheet">
	<link href="layout/css/responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head><!--/head-->
<body>
	<?php include("include/header.php"); ?>
	<section id="slider"><!--slider-->
	<div class="container">
	<div class="row">
	<div class="col-sm-12">
	<div id="slider-carousel" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
<li data-target="#slider-carousel" data-slide-to="0" class=""></li>
<li data-target="#slider-carousel" data-slide-to="1" class=""></li>
<li data-target="#slider-carousel" data-slide-to="2" class="active"></li>
	</ol>
	    <div class="carousel-inner">
		<div class="item">
		<div class="col-sm-6">
			<h2>Men's Clothing</h2>
			<p>Shop with us. </p>
<a href="clothes.php" class="btn btn-default get">Get it now
</a>
		</div>
		<div class="col-sm-6">
<img src="images/jacket.jpg" class="girl img-responsive" alt="">
		</div></div>

		<div class="item">
		<div class="col-sm-6">
<h2>Many more</h2>
<p>We bring to your doorsteps a wide range of products. </p>
<a href="clothes.php" class="btn btn-default get">Get it now
</a>
		</div>
		<div class="col-sm-6">
<img src="images/girl2.jpg" class="girl img-responsive" alt="">
		</div></div>
							
		<div class="item active">
		<div class="col-sm-6">
<h2>Women’s Clothing</h2>
<p>Women’s clothing offered by Lets Shop is ideal for all occasions, seasons and moods.</p>
<a href="clothes.php" class="btn btn-default get">Get it now
</a>
		</div>
		<div class="col-sm-6">
<img src="images/redjacket.jpg" class="girl img-responsive" alt="">
		</div>
		</div>
		</div>
						
<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
<i class="fa fa-angle-left"></i></a>
<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next"><i class="fa fa-angle-right"></i>
		</a>
		</div></div>
		</div></div>
	    </section><!--/slider-->
	
	<section>
	<div class="container">
    <div class="row">
	<div class="col-sm-3">
	<div class="left-sidebar">
<h2>Category</h2>
	<div class="panel-group category-products" id="accordian"><!--category-productsr-->
	 <div class="panel panel-default">
	<div class="panel-heading">
<h4 class="panel-title"><a href="link_form.php?link=dress">WOMENS</a></h4></div></div>

    <div class="panel panel-default">
	<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordian" 
href="#sportswear">

         <span class="badge pull-right">
         <i class="fa fa-plus"></i>
         </span>Mens</a>
</h4>
	</div>
	<div id="sportswear" class="panel-collapse collapse">
	<div class="panel-body">
		<ul>
			<li><a href="link_form.php?link=tshirt">Tsshirt </a></li>
			<li><a href="link_form.php?link=dressshirt">Pants </a></li>
			<li><a href="link_form.php?link=jeanspant">Hats </a></li>
			<li><a href="link_form.php?link=dresspant">Jacket</a></li>
		</ul>
	</div></div>
	</div>
	<div class="panel panel-default">
	<div class="panel-heading">
<h4 class="panel-title"><a href="link_form.php?link=summer">Summer</a></h4>
		 </div>
		</div>
         <div class="panel panel-default">
		 <div class="panel-heading">
<h4 class="panel-title"><a href="link_form.php?link=winter">Winter</a></h4>
		 </div>
		</div>
		</div><!--/category-products-->
		</div></div>
				
		<div class="col-sm-9 padding-right">
		<div class="features_items"><!--features_items-->
<h2 class="title text-center">New Items</h2>
		<?php 
$cosmetics=mysqli_query($connection,"select product_id, product_name, image, price, c_price from products  where product_type like '%dress%' order by rand() ,time Desc LIMIT 0,12")or die("Query 1 is inncorrect..........");
$shoes=mysqli_query($connection,"select product_id, product_name, image, price, c_price from products  where product_type like '%Shoes%' order by rand() ,time Desc LIMIT 0,12")or die("Query 1 is inncorrect..........");
while(list($product_id,$product_name,$image,$price,$c_price)=mysqli_fetch_array($cosmetics))
{
echo"
<div class='col-sm-3'>
		<div class='product-image-wrapper'>
		<div class='single-products'>
		<div class='productinfo text-center'>
<a href='product_details.php?id=$product_id' class='thumbnail'><img src='images/products/$image' alt='' style='width:250px; height:250px'></a>
<h2>Rs: $price <span><strike><p>Rs: $c_price</p></strike></span></h2>
<p>$product_name</p>
<a href='link_cart.php?id=$product_id' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>
		</div>
		<img src='images/new.jpg' class='new' alt=''></div>
		</div></div>
";
}
 ?>
        </div><!--features_items-->
					
			<div class="category-tab"><!--category-tab-->
		
        </div>
        
        <img style="width:100%" src="images/aaa copy.jpg">
        </div><!--/category-tab-->
	</div></div>				
	<div class="recommended_items"><!--recommended_items-->
<h2 class="title text-center">
Recommended Items</h2>
		<?php include("include/recomended.php");?>
        </div><!--/recommended_items-->
</div>
</section><br>
	
<?php include("include/footer.php"); ?>
    <script src="layout/js/jquery.js"></script>
	<script src="layout/js/bootstrap.min.js"></script>
	<script src="layout/js/jquery.scrollUp.min.js"></script>
	<script src="layout/js/price-range.js"></script>
    <script src="layout/js/jquery.prettyPhoto.js"></script>
    <script src="layout/js/main.js"></script>
<a id="scrollUp" href="#top" style="display: none; position: fixed; z-index: 2147483647;">
<i class="fa fa-angle-up">
</i></a>
</body>
</html>