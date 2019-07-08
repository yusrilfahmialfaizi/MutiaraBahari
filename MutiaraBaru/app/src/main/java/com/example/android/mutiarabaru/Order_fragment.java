package com.example.android.mutiarabaru;


import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;
import android.widget.Toast;

import java.lang.reflect.Array;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.HashMap;

import static java.lang.System.out;


/**
 * A simple {@link Fragment} subclass.
 */
public class Order_fragment extends Fragment {

	RecyclerView cartRecyclerView;
	ArrayList<ModelProducts> modelProductsArrayList;
	TextView textView;
	TestList testList;
	OrderViewAdapter adapter;
	View v;
	public Order_fragment() {
		// Required empty public constructor
	}


	@Override
	public View onCreateView(LayoutInflater inflater, ViewGroup container,
							 Bundle savedInstanceState) {
		// Inflate the layout for this fragment
		v = inflater.inflate(R.layout.content_order, container, false);
		cartRecyclerView = (RecyclerView) v.findViewById(R.id.recyclerview_cart);
		textView = (TextView) v.findViewById(R.id.asdasd);
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
