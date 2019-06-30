package com.example.android.mutiarabaru;

import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.design.widget.TabLayout;
import android.support.v4.view.ViewPager;
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

public class Notifikasi extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {
	private static final String data_url = "http://192.168.43.37/controller/user/agen/pemesanan/"; // kasih link prosesnya contoh : http://domainname or ip/folderproses/namaproses
	private RecyclerView grid;
	private SessionHandler session;
	TextView name;
	TextView status;
	View view;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_notifikasi);
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
		view = navigationView.getHeaderView(0);
		name = (TextView) view.findViewById(R.id.nama_user);
		status = (TextView) view.findViewById(R.id.status_user);
		String nama = user.getNama();
		nama = nama.substring(0, 1).toUpperCase() + nama.substring(1).toLowerCase();
		name.setText(nama);
		String stat = user.getStatus();
		stat = stat.substring(0, 1).toUpperCase() + stat.substring(1).toLowerCase();
		status.setText(stat);
		navigationView.setNavigationItemSelectedListener(this);
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

//    @Override
//    public boolean onCreateOptionsMenu(Menu menu) {
//        // Inflate the menu; this adds items to the action bar if it is present.
//        getMenuInflater().inflate(R.menu.notifikasi, menu);
//        return true;
//    }

//    @Override
//    public boolean onOptionsItemSelected(MenuItem item) {
//        // Handle action bar item clicks here. The action bar will
//        // automatically handle clicks on the Home/Up button, so long
//        // as you specify a parent activity in AndroidManifest.xml.
//        int id = item.getItemId();
//
//        //noinspection SimplifiableIfStatement
//        if (id == R.id.action_settings) {
//            return true;
//        }
//
//        return super.onOptionsItemSelected(item);
//    }

    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        // Handle navigation view item clicks here.
        // int id = item.getItemId();
        switch (item.getItemId()) {
            case R.id.nav_beranda:
				Intent i = new Intent(Notifikasi.this, MainActivity.class);
				startActivity(i);
				finish();
                break;
            case R.id.nav_profil:
            	Intent profil = new Intent(Notifikasi.this, ProfilActivity.class);
            	startActivity(profil);
            	finish();
                break;
            case R.id.nav_order:
            	Intent order= new Intent(Notifikasi.this, OrderActivity.class);
            	startActivity(order);
            	finish();
                break;
            case R.id.nav_notifikasi:
                Intent intent = new Intent(this, Notifikasi.class);
                startActivity(intent);
                finish();
                break;
            case R.id.nav_message:
                getSupportFragmentManager().beginTransaction().replace(R.id.fragment_container, new Chat()).commit();
                break;
            case R.id.nav_bantuan:
                getSupportFragmentManager().beginTransaction().replace(R.id.fragment_container, new Bantuan()).commit();
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
}
