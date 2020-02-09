<?php
	/*
		loop through array of $_SESSION['cart'][med_id] => number
		get id => take from database => take medicine price
		price * number (quantity)
		return sum of price
	*/
	function total_price($cart){
		$price = 0.0;
		if(is_array($cart)){
		  	foreach($cart as $id => $qty){
		  		$medprice = getMedprice($id);
		  		if($medprice){
		  			$price += $medprice * $qty;
		  		}
		  	}
		}
		return $price;
	}

	/*
		loop through array of $_SESSION['cart'][med_id] => number
		$_SESSION['cart'] is associative array which is [book_isbn] => number of medicines for each med_id
		calculate sum of medicines 
	*/
	function total_items($cart){
		$items = 0;
		if(is_array($cart)){
			foreach($cart as $id => $qty){
				$items += $qty;
			}
		}
		return $items;
	}
?>