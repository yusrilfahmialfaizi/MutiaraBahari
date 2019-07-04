package com.example.android.mutiarabaru;

public class ModelProducts
{
	public static String id_barang, nama_barang;
	public static int qty, hargasatuan;

	public ModelProducts(String id_barang, String nama_barang, int qty, int hargasatuan){
		this.id_barang = id_barang;
		this.nama_barang = nama_barang;
		this.qty = qty;
		this.hargasatuan = hargasatuan;
	}

	public static String getId_barang() {
		return id_barang;
	}

	public static void setId_barang(String id_barang) {
		ModelProducts.id_barang = id_barang;
	}

	public static String getNama_barang() {
		return nama_barang;
	}

	public static void setNama_barang(String nama_barang) {
		ModelProducts.nama_barang = nama_barang;
	}

	public static int getQty() {
		return qty;
	}

	public static void setQty(int qty) {
		ModelProducts.qty = qty;
	}

	public static int getHargasatuan() {
		return hargasatuan;
	}

	public static void setHargasatuan(int hargasatuan) {
		ModelProducts.hargasatuan = hargasatuan;
	}
}
