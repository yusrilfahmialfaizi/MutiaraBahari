package com.example.android.mutiarabaru;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.v4.app.FragmentActivity;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.android.mutiarabaru.TestList;

import org.json.JSONException;
import org.json.JSONObject;

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
	private ArrayList<HashMap<String,String>> data;
//	public OrderViewAdapter(Order_fragment orderActivity, ArrayList<HashMap<String,String>> data){
//		this.mContext = orderActivity.getActivity();
//		this.data = data;
//	}
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
//		holder.textView.setOnClickListener(new View.OnClickListener() {
//			@Override
//			public void onClick(View v) {
//				String url = "http://httpbin.org/post";
//
//				StringRequest postRequest = new StringRequest(Request.Method.POST, url,
//						new Response.Listener<String>() {
//							@Override
//							public void onResponse(String response) {
//								try {
//									JSONObject jsonResponse = new JSONObject(response).getJSONObject("form");
//									String site = jsonResponse.getString("site"),
//											network = jsonResponse.getString("network");
//									System.out.println("Site: "+site+"\nNetwork: "+network);
//								} catch (JSONException e) {
//									e.printStackTrace();
//								}
//							}
//						},
//						new Response.ErrorListener() {
//							@Override
//							public void onErrorResponse(VolleyError error) {
//								error.printStackTrace();
//							}
//						}
//				) {
//					@Override
//					protected Map<String, String> getParams()
//					{
//						Map<String, String> params = new HashMap<>();
//						// the POST parameters:
//						for (int i = 0;i < modelProductsArrayList.size();i++){
//
//							params.put("id_barang", modelProductsArrayList.get(i).getId_barang());
//							params.put("qty", "tutsplus");
//							return params;
//						}
//					}
//				};
//				Volley.newRequestQueue(mContext.getApplicationContext()).add(postRequest);
//			}
//		});
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
		Button textView;
		public ViewHolder(View itemView) {
			super(itemView);
			img = (ImageView) itemView.findViewById(R.id.gambar_cart);
			nama_barang = (TextView) itemView.findViewById(R.id.nama_barang_cart);
			harga = (TextView) itemView.findViewById(R.id.harga_cart);
			qty = (EditText) itemView.findViewById(R.id.cart_qty);
			textView = (Button) itemView.findViewById(R.id.asdasd);

//			textView.setOnClickListener(new View.OnClickListener() {
//				@Override
//				public void onClick(View v) {
//					Toast.makeText(mContext,"asdad",Toast.LENGTH_SHORT).show();
//				}
//			});
		}
	}
}
