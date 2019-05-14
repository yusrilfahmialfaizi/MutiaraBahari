package com.example.android.mutiarabahari;

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
        productList.add(new Product(R.drawable.belfoods, "Title 1", "This is description 1"));
        productList.add(new Product(R.drawable.belfoods, "Title 2", "This is description 2"));
        productList.add(new Product(R.drawable.belfoods, "Title 3", "This is description 3"));
        productList.add(new Product(R.drawable.belfoods, "Title 4", "This is description 4"));
        productList.add(new Product(R.drawable.belfoods, "Title 5", "This is description 5"));
        productList.add(new Product(R.drawable.belfoods, "Title 6", "This is description 6"));
        productList.add(new Product(R.drawable.belfoods, "Title 7", "This is description 7"));
        productList.add(new Product(R.drawable.belfoods, "Title 8", "This is description 8"));
        productList.add(new Product(R.drawable.belfoods, "Title 9", "This is description 9"));
        productList.add(new Product(R.drawable.belfoods, "Title 10", "This is description 10"));
        return productList;
    }

    AdapterView.OnItemClickListener onItemClick = new AdapterView.OnItemClickListener() {
        @Override
        public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
            //do any thing when user click to item
            Toast.makeText(getApplicationContext(), productList.get(position).getTitle() + " - " +
                    productList.get(position).getDescription(), Toast.LENGTH_SHORT).show();
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
            FragmentTransaction ft = getSupportFragmentManager().beginTransaction();
            ft.replace(R.id.fragment_profil, new Profil());
            ft.commit();
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
