package com.example.android.mutiarabaru;

public class Cart {
	int total_harga;
	String id_user, jenis_pembayaran, jenis_pengiriman, status_pesanan;

	public String getId_user() {
		return id_user;
	}

	public void setId_user(String id_user) {
		this.id_user = id_user;
	}

	public int getTotal_harga() {
		return total_harga;
	}

	public void setTotal_harga(int total_harga) {
		this.total_harga = total_harga;
	}

	public String getJenis_pembayaran() {
		return jenis_pembayaran;
	}

	public void setJenis_pembayaran(String jenis_pembayaran) {
		this.jenis_pembayaran = jenis_pembayaran;
	}

	public String getJenis_pengiriman() {
		return jenis_pengiriman;
	}

	public void setJenis_pengiriman(String jenis_pengiriman) {
		this.jenis_pengiriman = jenis_pengiriman;
	}

	public String getStatus_pesanan() {
		return status_pesanan;
	}

	public void setStatus_pesanan(String status_pesanan) {
		this.status_pesanan = status_pesanan;
	}
}
