package com.example.android.mutiarabaru;

import android.content.Context;
import android.content.SharedPreferences;

import java.util.ArrayList;

public class SessionCart {
	private static final String PREF_NAME = "CartSession";
	private static final String KEY_ID_BARANG = "id_barang";
	private static final String KEY_NAMA_BARANG = "nama_barang";
	private static final String KEY_QTY = "qty";
	private static final String KEY_HARGA = "harga";
	private static final String KEY_EMPTY = "";
	private static ArrayList<ModelProducts> arrayCartDetail = new ArrayList<ModelProducts>();
	private Context mContext;
	private SharedPreferences.Editor mEditor;
	private SharedPreferences mPreferences;

	public SessionCart(Context mContext)
	{
		this.mContext = mContext;
		mPreferences = mContext.getSharedPreferences(PREF_NAME, Context.MODE_PRIVATE);
		this.mEditor = mPreferences.edit();
	}

	public void inCart(ArrayList<ModelProducts> cart) {
//		mEditor.putString(KEY_ID_BARANG, id_barang);
//		mEditor.putString(KEY_NAMA_BARANG, nama_barang);
//		mEditor.putInt(KEY_QTY, qty);
//		mEditor.putInt(KEY_HARGA, harga);
//		mEditor.putString(cart,)
		mEditor.commit();
	}
	
//	public Cart_detail getCartDetails() {
//		Cart_detail Cart_detail = new Cart_detail();
//		Cart_detail.setId_barang(mPreferences.getString(KEY_ID_BARANG, KEY_EMPTY));
//		Cart_detail.setNama_barang(mPreferences.getString(KEY_NAMA_BARANG, KEY_EMPTY));
//		Cart_detail.setQty(mPreferences.getInt(KEY_QTY, 0));
//		Cart_detail.setHarga(mPreferences.getInt(KEY_HARGA, 0));
//		arrayCartDetail.add(Cart_detail);
//		return Cart_detail;
//	}

	/**
	 * Logs out Cart_detail by clearing the session
	 */
	public void logoutCart(){
		mEditor.clear();
		mEditor.commit();
	}
}
