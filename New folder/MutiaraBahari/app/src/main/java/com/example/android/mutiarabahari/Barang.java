package com.example.android.mutiarabahari;


import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;


/**
 * A simple {@link Fragment} subclass.
 */
public class Barang extends Fragment {

	private static final String data_url = "http://192.168.43.37/mutiarabahari/user/agen/DashboardAndroid/getNamaBarang"; // kasih link prosesnya contoh : http://domainname or ip/folderproses/namaproses
	private RecyclerView grid;
	private ArrayList<HashMap<String,String>> mBarang;

	private RequestQueue requestQueue;
	private StringRequest stringRequest;

	View myViewBarang;

	@Override
	public void onCreate(@Nullable Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		if (getArguments() != null)
		{
//			Toast.makeText(getContext(),getArguments().getString("id_merek"),Toast.LENGTH_SHORT).show();
		}
	}

	@Override
	public View onCreateView(LayoutInflater inflater, ViewGroup container,
							 Bundle savedInstanceState) {
		// Inflate the layout for this fragment
		myViewBarang = inflater.inflate(R.layout.fragment_barang, container, false);
		grid = (RecyclerView) myViewBarang.findViewById(R.id.recyclerview_barang);
		GridLayoutManager llm=new GridLayoutManager(this.getActivity(),3);
		llm.setOrientation(LinearLayoutManager.VERTICAL);
		grid.setLayoutManager(llm);
		Bundle bundle = getArguments();
		if (bundle != null)
		{
			Toast.makeText(getContext(),""+ bundle.getString("id") ,Toast.LENGTH_SHORT).show();
		}
		Toast.makeText(getContext(),""+ bundle ,Toast.LENGTH_SHORT).show();
		load();
//		Bundle arguments = getArguments();
//
//		if (arguments != null)
//		{
//			String id_merek = arguments.get("id_merek").toString();
//			Toast.makeText(getActivity(),"" +arguments+" berhasi",Toast.LENGTH_LONG).show();
//
//		}else {
//			Toast.makeText(getActivity(),"" +arguments+" gagal",Toast.LENGTH_LONG).show();
//
//		}
		return myViewBarang;
	}

	public void load()
	{
//		requestQueue = Volley.newRequestQueue(this.getActivity());
//		mBarang = new ArrayList<HashMap<String, String>>();
//		stringRequest = new StringRequest(Request.Method.POST, data_url, new Response.Listener<String>() {
//			@Override
//			public void onResponse(String response) {
//				try {
//					JSONObject jsonObject = new JSONObject(response);
//					JSONArray jsonArray = jsonObject.getJSONArray("data");
//					for (int i = 0; i < jsonArray.length(); i++) {
//						JSONObject json = jsonArray.getJSONObject(i);
//						HashMap<String, String> map = new HashMap<String, String>();
//						map.put("id_barang", json.getString("id_barang"));
//						map.put("nama_barang", json.getString("nama_barang"));
//						map.put("harga", json.getString("harga"));
//						map.put("jumlah_stok", json.getString("jumlah_stok"));
//						map.put("hrg_grosir1", json.getString("hrg_grosir1"));
//						map.put("hrg_grosir2", json.getString("hrg_grosir2"));
//						map.put("hrg_grosir3", json.getString("hrg_grosir3"));
//						map.put("id_merek", json.getString("id_merek"));
//						map.put("gambar", json.getString("gambar"));
//						mBarang.add(map);
//						BarangViewAdapter adapter = new BarangViewAdapter(ListBarang.this, mBarang);
//						grid.setAdapter(adapter);
//
//					}
//				} catch (JSONException e) {
//					e.printStackTrace();
//				}
//			}
//		},
//					new Response.ErrorListener() {
//				@Override
//				public void onErrorResponse(VolleyError error) {
//					Toast.makeText(getActivity(), error.getMessage(), Toast.LENGTH_SHORT).show();
//				}
//		});
//		requestQueue.add(stringRequest);
	}
}
