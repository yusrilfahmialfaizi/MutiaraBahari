package com.example.android.mutiarabaru;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.v4.app.FragmentActivity;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.HashMap;
import com.example.android.mutiarabaru.TestList;
import static java.lang.System.out;

public class OrderViewAdapter extends RecyclerView.Adapter<OrderViewAdapter.ViewHolder> {
	private Context mContext;
	TestList testList;
	private ArrayList<ModelProducts> modelProductsArrayList;
	ArrayList<HashMap<String,String>> hashMaps;

	public OrderViewAdapter(Order_fragment orderActivity, ArrayList<ModelProducts> modelProductsArrayList){
		this.mContext = orderActivity.getActivity();
		this.modelProductsArrayList = modelProductsArrayList;
	}
	@Override
	public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
		View v = LayoutInflater.from(parent.getContext()).inflate(R.layout.cardview_cart,null);
		return new ViewHolder(v);
	}

	@Override
	public void onBindViewHolder(ViewHolder holder, int position) {
//		holder.textView.setText("Asdaasd");
//		Toast.makeText(mContext,hashMaps.get(position).get("id_barang"),Toast.LENGTH_SHORT).show();
//		holder.nama_barang.setText(hashMaps.get(position).get("nama_barang"));
//		holder.harga.setText(hashMaps.get(position).get("harga"));
//		holder.qty.setText(hashMaps.get(position).get("qty"));
		holder.nama_barang.setText(modelProductsArrayList.get(position).getNama_barang());
//		Toast.makeText(mContext,testList.keranjangBelanjaList.get(position).getId_barang(),Toast.LENGTH_SHORT).show();
//		holder.qty.setText(String.valueOf(modelProductsArrayList.get(position).getQty()));
		holder.harga.setText(String.valueOf(modelProductsArrayList.get(position).getHargasatuan()));
		holder.qty.setText(String.valueOf(modelProductsArrayList.get(position).getQty()));
	}

	@Override
	public int getItemCount() {
		return testList.keranjangBelanjaList.size();
	}

	public class ViewHolder extends RecyclerView.ViewHolder {
		ImageView img;
		TextView nama_barang;
		TextView harga;
		EditText qty;
		TextView textView;
		public ViewHolder(View itemView) {
			super(itemView);
			img = (ImageView) itemView.findViewById(R.id.gambar_cart);
			nama_barang = (TextView) itemView.findViewById(R.id.nama_barang_cart);
			harga = (TextView) itemView.findViewById(R.id.harga_cart);
			qty = (EditText) itemView.findViewById(R.id.cart_qty);
			textView = (TextView) itemView.findViewById(R.id.asdasd);
		}
	}
}
