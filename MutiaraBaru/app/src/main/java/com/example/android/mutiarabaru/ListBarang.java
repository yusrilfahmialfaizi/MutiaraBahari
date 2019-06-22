package com.example.android.mutiarabaru;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
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
import java.util.Map;

public class ListBarang extends AppCompatActivity {
    private static final String data_url = "http://192.168.43.37/mutiarabahari/user/agen/DashboardAndroid/getNamaBarang/"; // kasih link prosesnya contoh : http://domainname or ip/folderproses/namaproses
    private RecyclerView grid;
    private ArrayList<HashMap<String,String>> mBarang;

    private RequestQueue requestQueue;
    private StringRequest stringRequest;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list_barang);
        Intent intent = getIntent();
        final String name = intent.getStringExtra("id_merek");
        grid = (RecyclerView) findViewById(R.id.recyclerview_barang);
        GridLayoutManager llm=new GridLayoutManager(this,1);
        llm.setOrientation(LinearLayoutManager.VERTICAL);
        grid.setLayoutManager(llm);
//		load();
//		Toast.makeText(this,name,Toast.LENGTH_SHORT);

        requestQueue = Volley.newRequestQueue(this);
        mBarang = new ArrayList<HashMap<String, String>>();
        stringRequest = new StringRequest(Request.Method.POST, data_url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    JSONObject jsonObject = new JSONObject(response);
                    JSONArray jsonArray = jsonObject.getJSONArray("data");
                    for (int i = 0; i < jsonArray.length(); i++) {
                        JSONObject json = jsonArray.getJSONObject(i);
                        HashMap<String, String> map = new HashMap<String, String>();
                        map.put("id_barang", json.getString("id_barang"));
                        map.put("nama_barang", json.getString("nama_barang"));
                        map.put("harga", json.getString("harga"));
                        map.put("jumlah_stok", json.getString("jumlah_stok"));
                        map.put("hrg_grosir1", json.getString("hrg_grosir1"));
                        map.put("hrg_grosir2", json.getString("hrg_grosir2"));
                        map.put("hrg_grosir3", json.getString("hrg_grosir3"));
                        map.put("id_merek", json.getString("id_merek"));
                        map.put("gambar", json.getString("gambar"));
                        mBarang.add(map);
                        BarangViewAdapter adapter = new BarangViewAdapter(ListBarang.this, mBarang);
                        grid.setAdapter(adapter);
                    }
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(ListBarang.this, error.getMessage(), Toast.LENGTH_SHORT).show();
                    }
                })
        {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("id_merek", name);
                return params;
            }
        };
        requestQueue.add(stringRequest);
    }
    public void load()
    {
        }

    }
