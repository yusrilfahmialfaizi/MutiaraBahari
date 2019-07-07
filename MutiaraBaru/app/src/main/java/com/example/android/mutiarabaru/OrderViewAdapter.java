package com.example.android.mutiarabaru;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;

import java.util.ArrayList;
import java.util.HashMap;

public class OrderViewAdapter extends RecyclerView.Adapter<OrderViewAdapter.ViewHolder> {
	private Context mContext;
	private ArrayList<HashMap<String,String>> data;
	public OrderViewAdapter(Order_fragment orderActivity, ArrayList<HashMap<String,String>> data){
		this.mContext = orderActivity.getActivity();
		this.data = data;
	}
	@Override
	public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
		View v = LayoutInflater.from(parent.getContext()).inflate(R.layout.cardview_cart,parent,false);
		return new ViewHolder(v);
	}

	@Override
	public void onBindViewHolder(ViewHolder holder, int position) {
//		holder.nama_barang.setText(data.get(position).get("nama_barang"));
		holder.nama_barang.setText("asdasdasd");
		holder.harga.setText(data.get(position).get("hargasatuan"));
		holder.qty.setText(data.get(position).get("qty"));
	}

	@Override
	public int getItemCount() {
		return data.size();
	}

	public class ViewHolder extends RecyclerView.ViewHolder {
		ImageView img;
		TextView nama_barang;
		TextView harga;
		EditText qty;
		public ViewHolder(View itemView) {
			super(itemView);
			img = (ImageView) itemView.findViewById(R.id.gambar_cart);
			nama_barang = (TextView) itemView.findViewById(R.id.nama_barang_cart);
			harga = (TextView) itemView.findViewById(R.id.harga_cart);
			qty = (EditText) itemView.findViewById(R.id.cart_qty);
		}
	}
}
