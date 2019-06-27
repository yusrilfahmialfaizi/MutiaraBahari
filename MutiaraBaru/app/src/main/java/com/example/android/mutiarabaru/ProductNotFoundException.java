package com.example.android.mutiarabaru;

public class ProductNotFoundException extends RuntimeException {
	private static final String data_url = "http://192.168.43.37/";

	private static final String DEFAULT_MESSAGE = "Product is not found in the shopping cart.";

	public ProductNotFoundException(){
		super(DEFAULT_MESSAGE);
	}

	public ProductNotFoundException(String message){
		super(message);
	}
}
