package com.example.android.mutiarabaru;


import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;


/**
 * A simple {@link Fragment} subclass.
 */
public class Beranda extends Fragment {
    private static final String data_url = "http://192.168.43.37/mutiarabahari/user/agen/DashboardAndroid/getMerek"; // kasih link prosesnya contoh : http://domainname or ip/folderproses/namaproses
    private ArrayList<HashMap<String,String>> mData;
    private RequestQueue requestQueue;
    private StringRequest stringRequest;
    private RecyclerView grid;
    private SessionHandler session;
    View myView;

    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        myView =  inflater.inflate(R.layout.content_main, container, false);
		session = new SessionHandler(getContext());
		User user = session.getUserDetails();
		grid = (RecyclerView) myView.findViewById(R.id.recyclerview_merek);
		GridLayoutManager llm=new GridLayoutManager(this.getActivity(),3);
		llm.setOrientation(LinearLayoutManager.VERTICAL);
		grid.setLayoutManager(llm);
        getData();
        return myView;
    }

    private void getData()
    {
        //Showing a progress dialog while our app fetches the data from url
//        final ProgressDialog loading = ProgressDialog.show(this, "Please wait...","Fetching data...",false,false);

        //Creating a json array request to get the json from our api
        requestQueue = Volley.newRequestQueue(this.getActivity());

        mData = new ArrayList<HashMap<String, String>>();

        stringRequest = new StringRequest(Request.Method.GET, data_url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                Log.d("response ", response);
                try {
                    JSONObject jsonObject = new JSONObject(response);
                    JSONArray jsonArray = jsonObject.getJSONArray("data");
                    for (int a = 0; a < jsonArray.length(); a++) {
                        JSONObject json = jsonArray.getJSONObject(a);
                        HashMap<String, String> map = new HashMap<String, String>();
                        map.put("id_merek", json.getString("id_merek"));
                        map.put("merek", json.getString("merek"));
                        map.put("gambar", json.getString("gambar"));
                        mData.add(map);
                        RecyclerViewAdapter adapter = new RecyclerViewAdapter(Beranda.this, mData);
                        grid.setAdapter(adapter);

                    }
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(getActivity(), error.getMessage(), Toast.LENGTH_SHORT).show();
            }
        });

        requestQueue.add(stringRequest);
    }
}
