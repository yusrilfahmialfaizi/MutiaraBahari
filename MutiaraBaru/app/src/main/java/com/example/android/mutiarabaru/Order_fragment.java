package com.example.android.mutiarabaru;


import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import java.util.ArrayList;
import java.util.HashMap;


/**
 * A simple {@link Fragment} subclass.
 */
public class Order_fragment extends Fragment {

	RecyclerView cartRecyclerView;
	ArrayList<HashMap<String,String>> data;
	View view;
	public Order_fragment() {
		// Required empty public constructor
	}


	@Override
	public View onCreateView(LayoutInflater inflater, ViewGroup container,
							 Bundle savedInstanceState) {
		// Inflate the layout for this fragment
		view =  inflater.inflate(R.layout.content_order, container, false);
		cartRecyclerView = (RecyclerView) view.findViewById(R.id.recyclerview_cart);
		LinearLayoutManager llm=new LinearLayoutManager(this.getActivity());
		llm.setOrientation(LinearLayoutManager.VERTICAL);
		cartRecyclerView.setLayoutManager(llm);


		final Controller ct = (Controller) view.getContext();
		for(int i = 0; i<ct.getCart().getCartsize();i++){
			HashMap<String,String> map = new HashMap<String, String>();
			map.put("id_barang",ct.getProducts(i).getId_barang());
			map.put("nama_barang",ct.getProducts(i).getNama_barang());
			map.put("qty", String.valueOf(ct.getProducts(i).getQty()));
			map.put("hargasatuan", String.valueOf(ct.getProducts(i).getHargasatuan()));
			data.add(map);
			OrderViewAdapter adapter = new OrderViewAdapter(Order_fragment.this, data);
			cartRecyclerView.setAdapter(adapter);
		}
		return view;
	}

}
