package com.example.android.mutiarabaru;


import android.content.Intent;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.lang.reflect.Array;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.HashMap;
import java.util.Map;

import static java.lang.System.out;


/**
 * A simple {@link Fragment} subclass.
 */
public class Order_fragment extends Fragment {

	RecyclerView cartRecyclerView;
	ArrayList<ModelProducts> modelProductsArrayList;
	Button textView;
	TestList testList;
	OrderViewAdapter adapter;
	View v;
	private SessionHandler sessionHandler;
	public Order_fragment() {
		// Required empty public constructor
	}


	@Override
	public View onCreateView(LayoutInflater inflater, ViewGroup container,
							 Bundle savedInstanceState) {
		// Inflate the layout for this fragment
		v = inflater.inflate(R.layout.content_order, container, false);
		cartRecyclerView = (RecyclerView) v.findViewById(R.id.recyclerview_cart);
		textView = (Button) v.findViewById(R.id.asdasd);
		textView.setOnClickListener(new View.OnClickListener() {
				@Override
				public void onClick(View v) {
//					Toast.makeText(getActivity(),"asdad",Toast.LENGTH_SHORT).show();
					String url = "http://192.168.43.37/mutiarabahari/admin/kasir/pesanan/pesananAndroid";
					StringRequest request = new StringRequest(Request.Method.POST, url,
							new Response.Listener<String>() {
								@Override
								public void onResponse(String response) {
									Toast.makeText(getActivity(),response,Toast.LENGTH_SHORT).show();
									for (int i = 0; i<modelProductsArrayList.size();i++){
										modelProductsArrayList.remove(i);

									}
//									try {
////										pDialog.dismiss();
//											JSONObject jsonObject = new JSONObject(response);
//										String rs = jsonObject.getString("status");
//										if (rs.equals("0")){
//											Toast.makeText(getActivity(),jsonObject.getString("pesan"),Toast.LENGTH_SHORT).show();
//										}else if (rs.equals("1")){
//											Toast.makeText(getActivity(),jsonObject.getString("pesan"),Toast.LENGTH_SHORT).show();
//										}else if (rs.equals("2")){
//											Toast.makeText(getActivity(),jsonObject.getString("pesan"),Toast.LENGTH_SHORT).show();
////											Intent intent = new Intent(RegisterActivity.this, LoginActivity.class);
////											startActivity(intent);
////											finish();
//										}
//									} catch (JSONException e) {
//										e.printStackTrace();
//									}
//							System.out.println(response);
//							String nama 		= jsonObject.getString("nama");
//							String alamat 		= jsonObject.getString("alamat");
//							String no_telepon 	= jsonObject.getString("no_telepon");
//							String respon 		= jsonObject.getString("email");
//							String id_user 		= jsonObject.getString("id_user");
//							String status 		= jsonObject.getString("status");

//							if(respon.equals("0")) {
//								session.loginUser(id_user,nama,alamat,no_telepon,status);
//							}
//							if(respon.equals("1")) {
////                                pDialog.dismiss();
//								Toast.makeText(LoginActivity.this,"password salah",Toast.LENGTH_SHORT).show();
//							}
								}
							},
							new Response.ErrorListener() {
								@Override
								public void onErrorResponse(VolleyError error) {
//									pDialog.dismiss();
//                        //Display error message whenever an error occurs
									Toast.makeText(getActivity(),
											error.getMessage(), Toast.LENGTH_SHORT).show();
								}
							})
					{
						@Override
						protected Map<String, String> getParams()
						{
							Map<String, String> params = new HashMap<>();
							for (int i = 0; i<modelProductsArrayList.size();i++){
								params.put("id_barang",modelProductsArrayList.get(i).getId_barang());
								params.put("qty", String.valueOf(modelProductsArrayList.get(i).getQty()));
								params.put("harga", String.valueOf(modelProductsArrayList.get(i).getHargasatuan()));
//								params.put("email",email);

							}
							sessionHandler = new SessionHandler(getContext());
							User user = sessionHandler.getUserDetails();
							params.put("id_user", user.getId_user());
							return  params;
						}
					};

					RequestQueue requestQueue = Volley.newRequestQueue(getActivity());
					requestQueue.add(request);
				}
			});
		LinearLayoutManager llm = new LinearLayoutManager(this.getActivity());
		llm.setOrientation(LinearLayoutManager.VERTICAL);
		cartRecyclerView.setLayoutManager(llm);
		modelProductsArrayList = new ArrayList<>();
		ArrayList<HashMap<String,String>> hash = new ArrayList<>();
		for (int i = 0; i<testList.keranjangBelanjaList.size(); i++){
			HashMap<String, String> map = new HashMap<>();
			map.put("id_barang", testList.keranjangBelanjaList.get(i).getId_barang());
			map.put("nama_barang", testList.keranjangBelanjaList.get(i).getNama_barang());
			map.put("qty", String.valueOf(testList.keranjangBelanjaList.get(i).getQty()));
			map.put("harga", String.valueOf(testList.keranjangBelanjaList.get(i).getHargasatuan()));
//			modelProductsArrayList.get(i).getId_barang();
//			modelProductsArrayList.get(i).getNama_barang();
//			modelProductsArrayList.get(i).getQty();
//			modelProductsArrayList.get(i).getHargasatuan();
////			textView.setText(modelProductsArrayList.size());
////
//					modelProductsArrayList = testList.keranjangBelanjaList;
			Toast.makeText(getActivity(),testList.keranjangBelanjaList.get(i).getId_barang(),Toast.LENGTH_SHORT).show();
			hash.add(map);
		}
		out.println(testList.keranjangBelanjaList.size());
//		out.print(Arrays.toString(testList.keranjangBelanjaList.toArray()));
//		shopCartAdapter = new ShopCartAdapter2(getApplicationContext(),testList.keranjangBelanjaList, button_bayar2);
//		shop_cart_rv.setLayoutManager(new LinearLayoutManager(this));
//		shop_cart_rv.setAdapter(shopCartAdapter);
		adapter = new OrderViewAdapter(Order_fragment.this, TestList.keranjangBelanjaList);
		cartRecyclerView.setAdapter(adapter);
		return  v;
	}

}
