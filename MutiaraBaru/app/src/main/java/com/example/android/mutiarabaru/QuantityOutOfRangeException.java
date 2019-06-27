package com.example.android.mutiarabaru;

public class QuantityOutOfRangeException extends RuntimeException {
	private static final String data_url = "http://192.168.43.37/";


	private static final String DEFAULT_MESSAGE = "Quantity is out of range";

	public QuantityOutOfRangeException() {
		super(DEFAULT_MESSAGE);
	}

	public QuantityOutOfRangeException(String message) {
		super(message);
	}
}
