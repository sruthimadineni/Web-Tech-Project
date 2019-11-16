<html>
	<head>
		<title>Order</title>
		<style>
body{
background-image:url("finalbackground_pic.jpg");
background-repeat:no-repeat;
background-position:center;
background-size:cover;
}
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}
		</style>
		<script>
		<!--
		-->
		</script>
	</head>
	<body>
<pre>
<?php session_start();
#cart.php - A simple shopping cart with add to cart, and remove links
 //---------------------------
 //initialize sessions

//Define the products and cost
$products = array("Caprese Salad with Pesto", "Panzenella", "Bruschetta","Focaccia Bread","Pasta Carbonara","Margherita Pizza","Mushroom Risotto","Pasta Con Pomodoro E Basilico","Lasagna","Pistachio Panna Cotta","chicken and cheese salad", "crispy calamari rings", "paneer steak","poached pear salad","prawn pie","quick salted caramel pie","sticky toffee pudding","sweet potato pie","yorkshire lamb patties","Brunswick stew","clam chowder","Hamburgers","Hot dogs","London broil","sloppy joe sandwich","tex mex","london broil","spring rolls","fried tofu","dismus","hot sour soup","noodles","fried rice","pancakes","veggies","beef burrito","chicken quesadillas","enchiladas","fabulous fajitas","guacamole","guilt free chicken","mexican chicken chillie","red snapper","masala cocktail","almond milk thandai","virgin mojito","rose mastani","pink lemonade","pina colada","paan thandai","kiwi margarita");
$amounts = array("100", "100", "100","100","100","100","100","100","100","100","100", "100", "100","100","100","100","100","100","100","100","100","100","100","100","100","100","100","100","100","100","100","100","100","100","100","100","100","100","100","100","100","100","100","100","100","100","100","100","100","100","100","100");

//Load up session
 if ( !isset($_SESSION["total"]) ) {
   $_SESSION["total"] = 0;
   for ($i=0; $i< count($products); $i++) {
    $_SESSION["qty"][$i] = 0;
   $_SESSION["amounts"][$i] = 0;
  }
 }

 //---------------------------
 //Reset
 if ( isset($_GET['reset']) )
 {
 if ($_GET["reset"] == 'true')
   {
   unset($_SESSION["qty"]); //The quantity for each product
   unset($_SESSION["amounts"]); //The amount from each product
   unset($_SESSION["total"]); //The total cost
   unset($_SESSION["cart"]); //Which item has been chosen
   }
 }

 //---------------------------
 //Add
 if ( isset($_GET["add"]) )
   {
   $i = $_GET["add"];
   $qty = $_SESSION["qty"][$i] + 1;
   $_SESSION["amounts"][$i] = $amounts[$i] * $qty;
   $_SESSION["cart"][$i] = $i;
   $_SESSION["qty"][$i] = $qty;
 }

  //---------------------------
  //Delete
  if ( isset($_GET["delete"]) )
   {
   $i = $_GET["delete"];
   $qty = $_SESSION["qty"][$i];
   $qty--;
   $_SESSION["qty"][$i] = $qty;
   //remove item if quantity is zero
   if ($qty == 0) {
    $_SESSION["amounts"][$i] = 0;
    unset($_SESSION["cart"][$i]);
  }
 else
  {
   $_SESSION["amounts"][$i] = $amounts[$i] * $qty;
  }
 }
 ?>
  <h2>List of All Items</h2>
 <table>
   <tr>
   <th>Product</th>
   <th width="10px">&nbsp;</th>
   <th>Amount</th>
   <th width="10px">&nbsp;</th>
   <th>Action</th>
   </tr>
 <?php
 for ($i=0; $i< count($products); $i++) {
   ?>
   <tr>
   <td><?php echo($products[$i]); ?></td>
   <td width="10px">&nbsp;</td>
   <td><?php echo($amounts[$i]); ?></td>
   <td width="10px">&nbsp;</td>
   <td><a href="?add=<?php echo($i); ?>">Place Order</a></td>
   </tr>
   <?php
 }
 ?>
 <tr>
 <td colspan="5"></td>
 </tr>
 <tr>
 <td colspan="5"><a href="?reset=true">Reset Order</a></td>
 </tr>
 </table>
 <?php
 if ( isset($_SESSION["cart"]) ) {
 ?>
 <br/><br/><br/>
 <h2>Cart</h2>
 <table>
 <tr>
 <th>Product</th>
 <th width="10px">&nbsp;</th>
 <th>Qty</th>
 <th width="10px">&nbsp;</th>
 <th>Amount</th>
 <th width="10px">&nbsp;</th>
 <th>Action</th>
 </tr>
 <?php
 $total = 0;
 foreach ( $_SESSION["cart"] as $i ) {
 ?>
 <tr>
 <td><?php echo( $products[$_SESSION["cart"][$i]] ); ?></td>
 <td width="10px">&nbsp;</td>
 <td><?php echo( $_SESSION["qty"][$i] ); ?></td>
 <td width="10px">&nbsp;</td>
 <td><?php echo( $_SESSION["amounts"][$i] ); ?></td>
 <td width="10px">&nbsp;</td>
 <td><a href="?delete=<?php echo($i); ?>">Delete the order</a></td>
 </tr>
 <?php
 $total = $total + $_SESSION["amounts"][$i];
 }
 $_SESSION["total"] = $total;
 ?>
 <tr>
 <td colspan="7">Total : <?php echo($total); ?></td>
 </tr>
 </table>
 <?php
 }
 ?>		</pre>
		<br/>
		<button> <a href="thumbs.html">Place Order</a></button>
	</body>
</html>

