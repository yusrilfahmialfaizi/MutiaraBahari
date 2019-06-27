package com.example.android.mutiarabaru;

public class Cart  {
	public static String id_barang,nama_barang;
	public static int qty,harga;

	public static String getId_barang() {
		return id_barang;
	}

	public static void setId_barang(String id_barang) {
		Cart.id_barang = id_barang;
	}

	public static String getNama_barang() {
		return nama_barang;
	}

	public static void setNama_barang(String nama_barang) {
		Cart.nama_barang = nama_barang;
	}

	public static int getQty() {
		return qty;
	}

	public static void setQty(int qty) {
		Cart.qty = qty;
	}

	public static int getHarga() {
		return harga;
	}

	public static void setHarga(int harga) {
		Cart.harga = harga;
	}
}
