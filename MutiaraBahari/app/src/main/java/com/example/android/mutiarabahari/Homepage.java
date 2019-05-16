package com.example.android.mutiarabahari;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v4.app.FragmentTransaction;
import android.view.View;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.view.ViewStub;
import android.widget.AdapterView;
import android.widget.GridView;
import android.widget.ListView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.List;

public class Homepage extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {
    private ViewStub stubGrid;
    private ViewStub stubList;
    private ListView listView;
    private GridView gridView;
    private ListViewAdapter listViewAdapter;
    private GridViewAdapter gridViewAdapter;
    private List<Product> productList;
    private int currentViewMode = 0;

    static final int VIEW_MODE_LISTVIEW = 0;
    static final int VIEW_MODE_GRIDVIEW = 1;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_homepage);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.addDrawerListener(toggle);
        toggle.syncState();

        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);

        stubList = (ViewStub) findViewById(R.id.stub_list);
        stubGrid = (ViewStub) findViewById(R.id.stub_grid);

        //inflate viewstub before get view
        stubList.inflate();
        stubGrid.inflate();

        listView = findViewById(R.id.mylistview);
        gridView = findViewById(R.id.mygridview);

        //get list of product
        getProductList();

        //get current view mode in share reference
        SharedPreferences sharedPreferences = getSharedPreferences("ViewMode", MODE_PRIVATE);
        currentViewMode = sharedPreferences.getInt("currentViewMode", VIEW_MODE_GRIDVIEW); //default is view gridview

        //register item click
        listView.setOnItemClickListener(onItemClick);
        gridView.setOnItemClickListener(onItemClick);

        switchView();
    }

    private void switchView() {
        if (VIEW_MODE_GRIDVIEW == currentViewMode){
            stubGrid.setVisibility(View.VISIBLE);
            stubList.setVisibility(View.GONE);
        } else{
            stubGrid.setVisibility(View.GONE);
            stubList.setVisibility(View.VISIBLE);
        }
        setAdapters();
    }

    private void setAdapters() {
        if(VIEW_MODE_GRIDVIEW == currentViewMode){
            gridViewAdapter = new GridViewAdapter(this, R.layout.grid_item, productList);
            gridView.setAdapter(gridViewAdapter);
        }else{
            listViewAdapter = new ListViewAdapter(this, R.layout.list_item, productList);
            listView.setAdapter(listViewAdapter);
        }
    }

    private List<Product> getProductList() {
        //pseudo code to get product, replace your codeto get real product here
        productList = new ArrayList<>();
        productList.add(new Product(R.drawable.ayoma, "Ayoma", ""));
        productList.add(new Product(R.drawable.belfoods, "Bahri", ""));
        productList.add(new Product(R.drawable.belfoods, "Belfoods", ""));
        productList.add(new Product(R.drawable.belfoods, "Bima", ""));
        productList.add(new Product(R.drawable.cikiwiki, "Cikiwiki", ""));
        productList.add(new Product(R.drawable.belfoods, "Crispy", ""));
        productList.add(new Product(R.drawable.belfoods, "Geboy", ""));
        productList.add(new Product(R.drawable.goldstar, "Goldstar", ""));
        productList.add(new Product(R.drawable.belfoods, "Loligo", ""));
        productList.add(new Product(R.drawable.nidia, "Nidia", ""));
        productList.add(new Product(R.drawable.okey, "Okey", ""));
        productList.add(new Product(R.drawable.belfoods, "Sera Oye", ""));
        productList.add(new Product(R.drawable.belfoods, "SJM", ""));
        productList.add(new Product(R.drawable.belfoods, "Sonice", ""));
        productList.add(new Product(R.drawable.belfoods, "Sufir", ""));
        productList.add(new Product(R.drawable.belfoods, "Sukanda", ""));
        productList.add(new Product(R.drawable.belfoods, "Top", ""));
        productList.add(new Product(R.drawable.tora, "Tora", ""));
        productList.add(new Product(R.drawable.vigo, "Vigo", ""));
        return productList;
    }

    AdapterView.OnItemClickListener onItemClick = new AdapterView.OnItemClickListener() {
        @Override
        public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
            //do any thing when user click to item
            Toast.makeText(getApplicationContext(), productList.get(position).getTitle(), Toast.LENGTH_SHORT).show();
        }
    };

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
        getMenuInflater().inflate(R.menu.homepage, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()){
            case R.id.item1:
                if(VIEW_MODE_GRIDVIEW == currentViewMode){
                    currentViewMode = VIEW_MODE_LISTVIEW;
                } else{
                    currentViewMode = VIEW_MODE_GRIDVIEW;
                }
                //switch view
                switchView();
                //save view mode in share rreference
                SharedPreferences sharedPreferences = getSharedPreferences("View mode", MODE_PRIVATE);
                SharedPreferences.Editor editor = sharedPreferences.edit();
                editor.putInt("currentViewMode", currentViewMode);
                editor.commit();
                break;
        }
        return true;
    }

    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        // Handle navigation view item clicks here.
        int id = item.getItemId();

        if (id == R.id.nav_beranda) {
        } else if (id == R.id.nav_profil) {
            Intent intent = new Intent(Homepage.this, Profil.class);
            startActivity(intent);
        } else if (id == R.id.nav_order) {
        } else if (id == R.id.nav_notifikasi) {
        } else if (id == R.id.nav_bantuan) {
        } else if (id == R.id.nav_logout) {
        } else if (id == R.id.nav_message) {
        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }
}

