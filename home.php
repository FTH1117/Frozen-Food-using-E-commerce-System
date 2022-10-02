<?php
// Prevent direct access to file
defined('shoppingcart') or exit;
// Get the 4 most recent added products
$stmt = $pdo->prepare('SELECT * FROM products ORDER BY date_added DESC LIMIT 4');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Home')?>

<div class="featured">
    <h2>Frozen Food Store</h2>
    <p>Your Favourite Frozen Food Online Store</p>
</div>

<br/><br/>

<div class="about">
    <div class="about2">
	<h2>Our Vision</h2>
    <p>• Share The Taste of Authentic Malaysia<br/>• Stand Out From The Crowd<br/>• Be Flexible and Open<br/>• Be Caring and Thoughtful</p>
	</div>
</div>


<br/>

<div class="recentlyadded content-wrapper">
    <h2>New Products</h2>
    <div class="products">
        <?php foreach ($recently_added_products as $product): ?>
        <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
            <?php if (!empty($product['img']) && file_exists('imgs/' . $product['img'])): ?>
            <img src="imgs/<?=$product['img']?>" width="200" height="200" alt="<?=$product['name']?>">
            <?php endif; ?>
            <span class="name"><?=$product['name']?></span>
            <span class="price">
                <?=currency_code?><?=number_format($product['price'],2)?>
                <?php if ($product['rrp'] > 0): ?>
                <span class="rrp"><?=currency_code?><?=number_format($product['rrp'],2)?></span>
                <?php endif; ?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<form method="POST" action="index.php?page=products">
<div class="buttons">
	<input type="submit" value="View More Products >>">
</div>
</form>

<div class="content content-wrapper">
	<br/>
	<div class="who">
	<h2>Who are Us?<br/>
	<p>
		Frozen Food Online Store is a leading Malaysian frozen food supplier brand that prides itself on high quality,
		frozen food products made from the finest ingredients. All products are Halal certified,
		free from trans-fats and have no added preservatives.
		On our online store, you can now buy all our
		food products online and get them delivered direct to your doorstep!
	</p>
	</h2>
	</div>
	<div class="vision">
	<h2>Buy Frozen Food Online Store now!<br/>
	<p>
		So what are you waiting for? Add all your favourite Kawan food products to
		cart and leave us a comment on your preferred delivery times for extra
		convenience. Your frozen food order will be delivered to you in a specially
		designed insulated bag to ensure the products’ temperatures are kept at its
		optimal level. Enjoy fast delivery and great customer service from Kawan Food.
	</p>
	</h2>
	</div>
	</div>

<?=template_footer()?>
