package com.example.android.mutiarabaru;


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

import com.android.volley.RequestQueue;
import com.android.volley.toolbox.StringRequest;

import java.util.ArrayList;
import java.util.HashMap;


/**
 * A simple {@link Fragment} subclass.
 */
public class Barang extends Fragment {

    private static final String data_url = "http://192.168.43.70/mutiarabahari/user/agen/DashboardAndroid/getNamaBarang"; // kasih link prosesnya contoh : http://domainname or ip/folderproses/namaproses
    private RecyclerView grid;
    private ArrayList<HashMap<String, String>> mBarang;

    private RequestQueue requestQueue;
    private StringRequest stringRequest;

    View myViewBarang;

    @Override
    public void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        if (getArguments() != null) {
//			Toast.makeText(getContext(),getArguments().getString("id_merek"),Toast.LENGTH_SHORT).show();
        }
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        myViewBarang = inflater.inflate(R.layout.fragment_barang, container, false);
        grid = (RecyclerView) myViewBarang.findViewById(R.id.recyclerview_barang);
        GridLayoutManager llm = new GridLayoutManager(this.getActivity(), 3);
        llm.setOrientation(LinearLayoutManager.VERTICAL);
        grid.setLayoutManager(llm);
        Bundle bundle = getArguments();
        if (bundle != null) {
            Toast.makeText(getContext(), "" + bundle.getString("id"), Toast.LENGTH_SHORT).show();
        }
        Toast.makeText(getContext(), "" + bundle, Toast.LENGTH_SHORT).show();
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

    public void load() {
    }
}
