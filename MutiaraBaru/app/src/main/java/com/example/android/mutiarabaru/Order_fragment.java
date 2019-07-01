package com.example.android.mutiarabaru;


import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import java.util.ArrayList;


/**
 * A simple {@link Fragment} subclass.
 */
public class Order_fragment extends Fragment {

	RecyclerView cartRecyclerView;
	ArrayList<Cart_detail> productsArray;
	View view;
	public Order_fragment() {
		// Required empty public constructor
	}


	@Override
	public View onCreateView(LayoutInflater inflater, ViewGroup container,
							 Bundle savedInstanceState) {
		// Inflate the layout for this fragment
		view =  inflater.inflate(R.layout.content_order, container, false);
		CartViewAdapter adapter = new CartViewAdapter(Order_fragment.this, productsArray);
		cartRecyclerView = (RecyclerView) view.findViewById(R.id.recyclerview_cart);
		LinearLayoutManager llm=new LinearLayoutManager(this.getActivity());
		llm.setOrientation(LinearLayoutManager.VERTICAL);
		cartRecyclerView.setLayoutManager(llm);
		cartRecyclerView.setAdapter(adapter);
		return view;
	}

}
