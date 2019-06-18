package com.example.android.mutiarabahari;


import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;


/**
 * A simple {@link Fragment} subclass.
 */
public class Barang extends Fragment {

	View myViewBarang;
	public Barang() {
		// Required empty public constructor
	}


	@Override
	public View onCreateView(LayoutInflater inflater, ViewGroup container,
							 Bundle savedInstanceState) {
		// Inflate the layout for this fragment
		myViewBarang = inflater.inflate(R.layout.fragment_barang, container, false);
		return myViewBarang;
	}

}
