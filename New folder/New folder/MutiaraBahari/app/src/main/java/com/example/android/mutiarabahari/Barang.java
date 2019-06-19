package com.example.android.mutiarabahari;


import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;


/**
 * A simple {@link Fragment} subclass.
 */
public class Barang extends Fragment {

	View myViewBarang;
	TextView textview;
	@Override
	public View onCreateView(LayoutInflater inflater, ViewGroup container,
							 Bundle savedInstanceState) {
		// Inflate the layout for this fragment
		myViewBarang = inflater.inflate(R.layout.fragment_barang, container, false);
		textview = (TextView) myViewBarang.findViewById(R.id.text);
		return myViewBarang;
	}

	@Override
	public void onActivityCreated(@Nullable Bundle savedInstanceState) {
		super.onActivityCreated(savedInstanceState);

		Bundle arguments = getArguments();

		if (arguments != null)
		{
			String id_merek = arguments.get("ID_MEREK").toString();
			textview.setText(id_merek);
		}
	}
}
