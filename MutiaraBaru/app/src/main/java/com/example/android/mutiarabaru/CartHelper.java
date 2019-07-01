package com.example.android.mutiarabaru;

public class CartHelper {
	private static Cart_detail cartDetail = new Cart_detail();

	public static Cart_detail getCartDetail(){
		if (cartDetail == null){
			cartDetail = new Cart_detail();
		}
		return cartDetail;
	}
}
