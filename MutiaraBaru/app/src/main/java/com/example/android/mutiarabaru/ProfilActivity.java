
package com.example.android.mutiarabaru;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.MenuItem;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
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

public class ProfilActivity extends AppCompatActivity
		implements NavigationView.OnNavigationItemSelectedListener, View.OnClickListener {
	private static final String data_url = "http://192.168.43.70/";
	private SessionHandler session;
	private ArrayList<HashMap<String, String>> mProfil;
	private RequestQueue requestQueue;
	private StringRequest stringRequest;
	TextView name;
	TextView status;
	TextView alamat;
	TextView password;
	TextView no_telepon;
	Button btn_edit;
	View view;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_profil);

//		session = new SessionHandler(getApplicationContext());
//		User user = session.getUserDetails();

		Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
		setSupportActionBar(toolbar);

		DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
		ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
				this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
		drawer.addDrawerListener(toggle);
		toggle.syncState();

		NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
		view = navigationView.getHeaderView(0);
		name = (TextView) view.findViewById(R.id.nama_user);
		no_telepon = (TextView) view.findViewById(R.id.etPhone);
		alamat = (EditText) view.findViewById(R.id.etAddress);
		password = (TextView) view.findViewById(R.id.etLoginPassword);
		status = (TextView) view.findViewById(R.id.status_user);

		btn_edit = (Button) findViewById(R.id.btn_edit);

		btn_edit.setOnClickListener(this);
	}


//		String nama = user.getNama();
//		nama = nama.substring(0, 1).toUpperCase() + nama.substring(1).toLowerCase();
//		name.setText(nama);
//		String stat = user.getStatus();
//		stat = stat.substring(0, 1).toUpperCase() + stat.substring(1).toLowerCase();
//		status.setText(stat);
//		navigationView.setNavigationItemSelectedListener(this);

//		requestQueue = Volley.newRequestQueue(this);
//		mProfil = new ArrayList<HashMap<String, String>>();
//		stringRequest = new StringRequest(Request.Method.POST, data_url, new Response.Listener<String>() {
//			@Override
//			public void onResponse(String response) {
//				try {
//					JSONObject jsonObject = new JSONObject(response);
//					JSONArray jsonArray = jsonObject.getJSONArray("data");
//					for (int i = 0; i < jsonArray.length(); i++) {
//						JSONObject json = jsonArray.getJSONObject(i);
//						HashMap<String, String> map = new HashMap<String, String>();
//						map.put("imageView", json.getString("id_pesanan"));
//						map.put("etLoginUsername", json.getString("id_user"));
//						map.put("etLoginPassword", json.getString(""));
//						map.put("alamat", json.getString(""));
//						map.put("", json.getString("total_harga"));
//						map.put("jenis_pembayaran", json.getString("jenis_pembayaran"));
//						map.put("jenis_pengiriman", json.getString("jenis_pengiriman"));
//						map.put("status_pesanan", json.getString("status_pesanan"));
//					}
//				} catch (JSONException e) {
//					e.printStackTrace();
//				}
//			}
//		},  new Response.ErrorListener() {
//			@Override
//			public void onErrorResponse(VolleyError error) {
//				Toast.makeText(ProfilActivity.this, error.getMessage(), Toast.LENGTH_SHORT).show();
//			}
//		});
//	}

	@Override
	public void onBackPressed() {
		DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
		if (drawer.isDrawerOpen(GravityCompat.START)) {
			drawer.closeDrawer(GravityCompat.START);
		} else {
			super.onBackPressed();
		}
	}

//	@Override
//	public boolean onCreateOptionsMenu(Menu menu) {
//		// Inflate the menu; this adds items to the action bar if it is present.
//		getMenuInflater().inflate(R.menu.main, menu);
//		return true;
//	}
//
//	@Override
//	public boolean onOptionsItemSelected(MenuItem item) {
//		// Handle action bar item clicks here. The action bar will
//		// automatically handle clicks on the Home/Up button, so long
//		// as you specify a parent activity in AndroidManifest.xml.
//		int id = item.getItemId();
//
//		//noinspection SimplifiableIfStatement
//		if (id == R.id.action_settings) {
//			return true;
//		}
//
//		return super.onOptionsItemSelected(item);
//	}

	@SuppressWarnings("StatementWithEmptyBody")
	@Override
	public boolean onNavigationItemSelected(MenuItem item) {
		// Handle navigation view item clicks here.
		switch (item.getItemId()) {
			case R.id.nav_beranda:
				Intent beranda = new Intent(ProfilActivity.this, MainActivity.class);
				startActivity(beranda);
				finish();
				break;
			case R.id.nav_profil:
				Intent profil = new Intent(ProfilActivity.this, ProfilActivity.class);
				startActivity(profil);
				finish();
				break;
			case R.id.nav_order:
				Intent order = new Intent(ProfilActivity.this, OrderActivity.class);
				startActivity(order);
				finish();
				break;
			case R.id.nav_notifikasi:
				Intent notif = new Intent(ProfilActivity.this, Riwayat.class);
				startActivity(notif);
				finish();
				break;
			case R.id.about:
				Intent bantuan = new Intent(ProfilActivity.this, About.class);
				startActivity(bantuan);
				finish();
				break;
			case R.id.nav_logout:
				session = new SessionHandler(this);
				User user = session.getUserDetails();
				session.logoutUser();
				Intent logout = new Intent(this,LoginActivity.class);
				startActivity(logout);
				finish();
		}


		DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
		drawer.closeDrawer(GravityCompat.START);
		return true;
	}

	@Override
	public void onClick(View v) {
		Intent btn = new Intent(ProfilActivity.this, Edit_Profil.class);
		startActivity(btn);
		finish();
	}
}
