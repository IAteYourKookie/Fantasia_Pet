<!----------------------- PHP ----------------------->
<?php
include("templates/header.php");
include("templates/conexao.php");
if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        case "add":
            if(!empty($_POST["quantity"])) {
                $productByCode = mysqli_query($bdOpen,"SELECT * FROM produtos WHERE code='" . $_GET["code"] . "'");
                $productByCode= mysqli_fetch_array($productByCode);
                $itemArray = array($productByCode["code"]=>array('name'=>$productByCode["name"], 'code'=>$productByCode["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode["price"], 'image'=>$productByCode["image"]));
                if(!empty($_SESSION["cart_item"])) {
                    if(in_array($productByCode["code"],array_keys($_SESSION["cart_item"]))) {
                        foreach($_SESSION["cart_item"] as $k => $v) {
                                if($productByCode["code"] == $k) {
                                    if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                        $_SESSION["cart_item"][$k]["quantity"] = 0;
                                    }
                                    $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                                }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
        break;
        case "remove":
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                        if($_GET["code"] == $k)
                            unset($_SESSION["cart_item"][$k]);				
                        if(empty($_SESSION["cart_item"]))
                            unset($_SESSION["cart_item"]);
                }
            }
        break;
        case "empty":
            unset($_SESSION["cart_item"]);
        break;	
    }
    }
?>

<!----------------------- Content ----------------------->
<div id="shopping-cart">

<!----------------------- Empty Cart ----------------------->
<a id="btnEmpty" href="cart.php?action=empty">Esvaziar carrinho</a>
<a id="btnBuy" href="templates/placeholder.html">Comprar</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>

<!----------------------- Cart ----------------------->
<div class="cart">
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Nome</th>
<th style="text-align:right;" width="5%">Quantidade</th>
<th style="text-align:right;" width="10%">Preço Unidade</th>
<th style="text-align:right;" width="10%">Preço total</th>
<th style="text-align:center;" width="5%">Remover</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "R$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "R$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="imagens/icon-delete.png" alt="Remover item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "R$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table></div>
  <?php
} else {
?>

<!----------------------- Empty cart ----------------------->
<div class="no-records"></div>
<?php 
}
?>
</div>

<!----------------------- Produtos ----------------------->
<div>
<div id="product-grid">
	<?php
	$product_array = mysqli_query($bdOpen,"SELECT * FROM produtos ORDER BY id ASC");
	if (!empty($product_array)) {
		foreach($product_array as $key=>$value){
            
	?>
		<div class="product-item">
			<form method="post" action="cart.php?action=add&code=<?php echo $value["code"]; ?>">
			<p class="boxp"><img class="boximgs" src="<?php echo $value["image"];?>"><br><span class="boxp1"><?php echo $value["name"]; ?><br></span><span class="boxp2"><meta itemprop="priceCurrency" content="BRL"><?php echo "R$".$value["price"]; ?></span>
			<input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Adicionar" class="buttoncarrinho" /></p>
			</form>
		</div>
	<?php
        
		}
        
	}
	?>
</div></div>

<!----------------------- Footer ----------------------->
<?php
include("templates/footer.php");
?>