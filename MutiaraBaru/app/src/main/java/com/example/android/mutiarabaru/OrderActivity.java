package com.example.android.mutiarabaru;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.View;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.TextView;

import java.util.ArrayList;
import java.util.HashMap;

public class OrderActivity extends AppCompatActivity
		implements NavigationView.OnNavigationItemSelectedListener {
	private SessionHandler session;
	RecyclerView cartRecyclerView;
	TextView name;
	TextView status;
	View view;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_order);

		session = new SessionHandler(getApplicationContext());
		User user = session.getUserDetails();

		Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
		setSupportActionBar(toolbar);

//		FloatingActionButton fab = (FloatingActionButton) findViewById(R.id.fab);
//		fab.setOnClickListener(new View.OnClickListener() {
//			@Override
//			public void onClick(View view) {
//				Snackbar.make(view, "Replace with your own action", Snackbar.LENGTH_LONG)
//						.setAction("Action", null).show();
//			}
//		});

		DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
		ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
				this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
		drawer.addDrawerListener(toggle);
		toggle.syncState();

		NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
		view = navigationView.getHeaderView(0);
		name = (TextView) view.findViewById(R.id.nama_user);
		status = (TextView) view.findViewById(R.id.status_user);
		String nama  = user.getNama();
		nama = nama.substring(0,1).toUpperCase() + nama.substring(1).toLowerCase();
		name.setText(nama);
		String stat  = user.getStatus();
		stat = stat.substring(0,1).toUpperCase() + stat.substring(1).toLowerCase();
		status.setText(stat);
		navigationView.setNavigationItemSelectedListener(this);


		if  (savedInstanceState == null){
			getSupportFragmentManager().beginTransaction().replace(R.id.fragment_container,
					new Order_fragment()).commit();
			navigationView.setCheckedItem(R.id.nav_order);
		}
		
//		Cart_detail cartDetail = new Cart_detail();
//		cartDetail.setId_barang("L001");
//		cartDetail.setNama_barang("nama");
//		cartDetail.setQty(1);
//		cartDetail.setHarga(1);
////		cartDetail.setSub_total(100);
//		productsArray.add(cartDetail);
//		cartRecyclerView = (RecyclerView) findViewById(R.id.recycler_view_cart);
//		LinearLayoutManager llm=new LinearLayoutManager(OrderActivity.this);
//		llm.setOrientation(LinearLayoutManager.VERTICAL);
//		cartRecyclerView.setLayoutManager(llm);
	}

	@Override
	public void onBackPressed() {
		DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
		if (drawer.isDrawerOpen(GravityCompat.START)) {
			drawer.closeDrawer(GravityCompat.START);
		} else {
			super.onBackPressed();
		}
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}

	@Override
	public boolean onOptionsItemSelected(MenuItem item) {
		// Handle action bar item clicks here. The action bar will
		// automatically handle clicks on the Home/Up button, so long
		// as you specify a parent activity in AndroidManifest.xml.
		int id = item.getItemId();

		//noinspection SimplifiableIfStatement
		if (id == R.id.action_settings) {
			return true;
		}

		return super.onOptionsItemSelected(item);
	}

	@SuppressWarnings("StatementWithEmptyBody")
	@Override
	public boolean onNavigationItemSelected(MenuItem item) {
		// Handle navigation view item clicks here.
		switch (item.getItemId()) {
			case R.id.nav_beranda:
				Intent beranda = new Intent(OrderActivity.this, MainActivity.class);
				startActivity(beranda);
				finish();
				break;
			case R.id.nav_profil:
				Intent profil = new Intent (OrderActivity.this, ProfilActivity.class);
				startActivity(profil);
				finish();
				break;
			case R.id.nav_order:
				getSupportFragmentManager().beginTransaction().replace(R.id.fragment_container, new Order_fragment()).commit();
				break;
			case R.id.nav_notifikasi:
				Intent notif = new Intent(OrderActivity.this, Notifikasi.class);
				startActivity(notif);
				finish();
				break;
			case R.id.nav_message:
				getSupportFragmentManager().beginTransaction().replace(R.id.fragment_container, new Chat()).commit();
				break;
			case R.id.nav_bantuan:
				Intent bantuan = new Intent(OrderActivity.this, Bantuan.class);
				startActivity(bantuan);
				finish();
//				getSupportFragmentManager().beginTransaction().replace(R.id.fragment_container, new Bantuan()).commit();
				break;
			case R.id.nav_logout:
				session = new SessionHandler(this);
				User user = session.getUserDetails();
				session.logoutUser();
				Intent i = new Intent(this,LoginActivity.class);
				startActivity(i);
				finish();
		}

		DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
		drawer.closeDrawer(GravityCompat.START);
		return true;
	}
}
