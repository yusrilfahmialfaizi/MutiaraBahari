package com.example.android.mutiarabaru;

import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.MenuItem;
import android.widget.TextView;

public class Bantuan extends AppCompatActivity
		implements NavigationView.OnNavigationItemSelectedListener{
	private SessionHandler session;
	private TextView txt_help1, deskripsi1, txt_help2, txt_help3, c1, c2;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_about);
		Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
		setSupportActionBar(toolbar);

		session = new SessionHandler(getApplicationContext());
		User user = session.getUserDetails();

		DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
		ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
				this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
		drawer.addDrawerListener(toggle);
		toggle.syncState();

		NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
		navigationView.setNavigationItemSelectedListener(this);
//
//		txt_help1 = (TextView)findViewById(R.id.txt_help1);
//		deskripsi1 = (TextView)findViewById(R.id.deskripsi1);
//		txt_help2 = (TextView)findViewById(R.id.txt_help2);
//		txt_help3 = (TextView)findViewById(R.id.txt_help3);

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
				getSupportFragmentManager().beginTransaction().replace(R.id.fragment_container, new Beranda()).commit();
				break;
			case R.id.nav_profil:
				Intent profil = new Intent(Bantuan.this, ProfilActivity.class);
				startActivity(profil);
				finish();
				break;
			case R.id.nav_order:
				Intent order = new Intent(Bantuan.this, OrderActivity.class);
				startActivity(order);
				finish();
				break;
			case R.id.nav_notifikasi:
				Intent notif = new Intent(Bantuan.this, Notifikasi.class);
				startActivity(notif);
				finish();
				break;
			case R.id.nav_about:
				Intent bantuan = new Intent(Bantuan.this, Bantuan.class);
				startActivity(bantuan);
				finish();
				break;
			case R.id.nav_logout:
				session = new SessionHandler(this);
				User user = session.getUserDetails();
				session.logoutUser();
				Intent logout = new Intent(this, LoginActivity.class);
				startActivity(logout);
				finish();
		}
		DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
		drawer.closeDrawer(GravityCompat.START);
		return true;
	}
}
