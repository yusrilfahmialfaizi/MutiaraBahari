package com.example.android.mutiarabaru;

import java.util.ArrayList;

public class ModelCart {
	private ArrayList<ModelProducts> cartItems = new ArrayList<ModelProducts>();
	public ModelProducts getProducts(int position){
		return cartItems.get(position);
	}
	public void setProducts(ModelProducts Products){
		cartItems.add(Products);
	}
	public int getCartsize(){
		return cartItems.size();
	}
	public boolean CheckProductInCart(ModelProducts aproducts){
		return cartItems.contains(aproducts);
	}
}
