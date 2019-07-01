package com.example.android.mutiarabaru;

import java.util.ArrayList;
import java.util.HashMap;

public class Cart_detail {
	public static String id_barang,nama_barang;
	public static int qty;
	public static int harga;

	public static String getId_barang() {
		return id_barang;
	}

	public static void setId_barang(String id_barang) {
		Cart_detail.id_barang = id_barang;
	}

	public static String getNama_barang() {
		return nama_barang;
	}

	public static void setNama_barang(String nama_barang) {
		Cart_detail.nama_barang = nama_barang;
	}

	public static int getQty() {
		return qty;
	}

	public static void setQty(int qty) {
		Cart_detail.qty = qty;
	}

	public static int getHarga() {
		return harga;
	}

	public static void setHarga(int harga) {
		Cart_detail.harga = harga;
	}
}
