//package com.example.android.mutiarabaru;
//
//import android.app.AlertDialog;
//import android.content.DialogInterface;
//import android.support.v7.app.AppCompatActivity;
//import android.os.Bundle;
//import android.support.v7.widget.LinearLayoutManager;
//import android.support.v7.widget.RecyclerView;
//import android.text.Editable;
//import android.text.TextWatcher;
//import android.view.LayoutInflater;
//import android.view.Menu;
//import android.view.MenuInflater;
//import android.view.MenuItem;
//import android.view.View;
//import android.widget.Button;
//import android.widget.TextView;
//import android.widget.Toast;
//
//import com.android.volley.Request;
//import com.android.volley.RequestQueue;
//import com.android.volley.Response;
//import com.android.volley.VolleyError;
//import com.android.volley.toolbox.StringRequest;
//import com.android.volley.toolbox.Volley;
//import com.dyp.androidpos.Activity.NavigationFragment.PointOfsale2;
//import com.dyp.androidpos.Adapter.ShopCartAdapter2;
//import com.dyp.androidpos.Library.FormatMataUang;
//import com.dyp.androidpos.Model.CustomerModel;
//import com.dyp.androidpos.R;
//import com.dyp.androidpos.Remote.ApiURL;
//import com.dyp.androidpos.Session.SessionCart;
//import com.dyp.androidpos.Session.SessionLogin;
//import com.dyp.androidpos.TestList;
//
//import org.json.JSONArray;
//import org.json.JSONException;
//import org.json.JSONObject;
//
//import java.util.ArrayList;
//import java.util.HashMap;
//import java.util.Map;
//
//
//public class ShopCartActivity extends AppCompatActivity {
//    //Inisialisasi
//    ApiURL apiURL = new ApiURL();
//    TestList testList = new TestList();
//    //URL
//    private String url_customer = apiURL.getUrl()+"customer";
//    private String url_simpan_penjualan = apiURL.getUrl()+"penjualan?type=1";
//    private String url_simpan_detail_penjualan = apiURL.getUrl()+"penjualan?type=2";
//    ShopCartAdapter2 shopCartAdapter;
//    RecyclerView shop_cart_rv;
//    FormatMataUang formatMataUang = new FormatMataUang();
//    Button button_bayar2;
//    ArrayList<CustomerModel> customerArrayList;
//    String id_customer,nama_customer;
//    //Menu Item
//    MenuItem add_customer,delete_customer;
//
//    private String id_produk,nama_produk;
//    private int harga_jual,qty;
//    private int subtotal; //
//    private int takeaway_type; // Tipe Takeaway Penjualan
//
//    @Override
//    protected void onCreate(Bundle savedInstanceState) {
//        super.onCreate(savedInstanceState);
//        setContentView(R.layout.activity_shop_cart);
//        shop_cart_rv = findViewById(R.id.shop_cart_rv);
//        button_bayar2 = findViewById(R.id.button_bayar2);
//        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
//        getSupportActionBar().setDisplayShowHomeEnabled(true);
//        if(SessionCart.cart_id_customer == null) {
//            getSupportActionBar().setTitle("Keranjang Belanja");
//        }else{
//            getSupportActionBar().setTitle("Keranjang Belanja ("+nama_customer+")");
//        }
//
//        setupRecyclerView();
//        button_bayar2.setText(formatMataUang.formatRupiah(SessionCart.grand_total));
//        button_bayar2.setOnClickListener(new View.OnClickListener() {
//            @Override
//            public void onClick(View view) {
//                openPaymentDialog();
//            }
//        });
//
//    }
//    @Override
//    public boolean onSupportNavigateUp() {
//        PointOfsale2.button_bayar.setText(formatMataUang.formatRupiah(SessionCart.grand_total));
//        onBackPressed();
//        return true;
//        //Mengubah Grand Total Di Fragment Point Of Sale
//    }
//
//    @Override
//    public boolean onCreateOptionsMenu(Menu menu) {
//        MenuInflater menuInflater = getMenuInflater();
//        menuInflater.inflate(R.menu.navigation_cart,menu);
//        add_customer = menu.findItem(R.id.cart_add_customer);
//        delete_customer = menu.findItem(R.id.cart_delete_customer);
//        delete_customer.setVisible(false);
//
//        return true;
//    }
//
//    @Override
//    public boolean onOptionsItemSelected(MenuItem item) {
//        int id = item.getItemId();
//
//        //noinspection SimplifiableIfStatement
//        if(id == R.id.cart_delete_customer){
//            SessionCart.cart_id_customer = null;
//            SessionCart.cart_name_customer = null;
//
//            delete_customer.setVisible(false);
//            add_customer.setVisible(true);
//
//            getSupportActionBar().setTitle("Keranjang Belanja");
//        }else if (id == R.id.cart_add_customer) {
//            Toast.makeText(this, "Membuka Pilihan", Toast.LENGTH_SHORT).show();
//            fetchCustomer();
//
//            add_customer.setVisible(false);
//            delete_customer.setVisible(true);
//        }
//
//        return super.onOptionsItemSelected(item);
//    }
//    private void fetchCustomer(){
//        StringRequest stringRequest = new StringRequest(Request.Method.GET, url_customer,
//                new Response.Listener<String>() {
//                    @Override
//                    public void onResponse(String response) {
//                        try{
//                            JSONObject obj = new JSONObject(response);
//                            if(obj.getString("success").equals("1")){
//                                if(obj.getString("jumlah_data").equals("0")){
//                                    Toast.makeText(getApplicationContext(), "Data Tidak Ditemukan", Toast.LENGTH_SHORT).show();
//                                }else{
//                                    customerArrayList = new ArrayList<>();
//                                    JSONArray jsonArray = obj.getJSONArray("data");
//                                    for(int i=0;i<jsonArray.length();i++){
//                                        JSONObject jsonObject = jsonArray.getJSONObject(i);
//                                        CustomerModel customerModel = new CustomerModel();
//                                        customerModel.setId_customer(jsonObject.getString("id_customer"));
//                                        customerModel.setNama_customer(jsonObject.getString("nama_customer"));
//                                        customerModel.setNo_hp(jsonObject.getString("no_hp"));
//                                        customerArrayList.add(customerModel);
//                                    }
//                                    final CharSequence[] items = new CharSequence[customerArrayList.size()];
//                                    for(int i=0;i<customerArrayList.size();i++){
//                                        items[i] = customerArrayList.get(i).getNama_customer();
//                                    }
//                                    AlertDialog.Builder builder = new AlertDialog.Builder(ShopCartActivity.this);
//                                    builder.setTitle("Pilih Customer");
//                                    builder.setItems(items, new DialogInterface.OnClickListener() {
//                                        @Override
//                                        public void onClick(DialogInterface dialogInterface, int i) {
//                                            id_customer = customerArrayList.get(i).getId_customer();
//                                            nama_customer = customerArrayList.get(i).getNama_customer();
//                                            getSupportActionBar().setTitle("Keranjang Belanja ("+nama_customer+")");
//                                            Toast.makeText(getApplicationContext(), nama_customer+" Dipilih", Toast.LENGTH_SHORT).show();
//                                            SessionCart.cart_id_customer = id_customer;
//                                            SessionCart.cart_name_customer = nama_customer;
//                                            dialogInterface.dismiss();
//
//
//
//                                        }
//                                    }).show();
//                                }
//
//                            }
//                        }catch(JSONException e){
//                            Toast.makeText(getApplicationContext(), "Error"+e.toString(), Toast.LENGTH_SHORT).show();
//                        }
//                    }
//                },
//                new Response.ErrorListener() {
//                    @Override
//                    public void onErrorResponse(VolleyError error) {
//                        Toast.makeText(getApplicationContext(), "Error Volley"+error.toString(), Toast.LENGTH_SHORT).show();
//                    }
//                }
//        );
//        RequestQueue requestQueue = Volley.newRequestQueue(getApplicationContext());
//        requestQueue.add(stringRequest);
//    }
//
//    private void setupRecyclerView(){
//        shopCartAdapter = new ShopCartAdapter2(getApplicationContext(),testList.keranjangBelanjaList, button_bayar2);
//        shop_cart_rv.setLayoutManager(new LinearLayoutManager(this));
//        shop_cart_rv.setAdapter(shopCartAdapter);
//    }
//    private void openPaymentDialog(){
//        AlertDialog.Builder dialog = new AlertDialog.Builder(this);
//        LayoutInflater layoutInflater = getLayoutInflater();
//        View dialogView = layoutInflater.inflate(R.layout.payment_popup,null);
//        dialog.setView(dialogView);
//        dialog.setCancelable(true);
//        dialog.setTitle("Pembayaran");
//
//        final TextView pay_jumlah_pembayaran = dialogView.findViewById(R.id.pay_jumlah_pembayaran);
//        final TextView pay_jumlah_uang = dialogView.findViewById(R.id.pay_jumlah_uang);
//        final TextView pay_kembalian= dialogView.findViewById(R.id.pay_kembalian);
//
//        pay_jumlah_pembayaran.setText(""+SessionCart.grand_total);
//        pay_jumlah_uang.addTextChangedListener(new TextWatcher() {
//            @Override
//            public void beforeTextChanged(CharSequence charSequence, int i, int i1, int i2) {
//            }
//            @Override
//            public void onTextChanged(CharSequence charSequence, int i, int i1, int i2) {
//            }
//            @Override
//            public void afterTextChanged(Editable editable) {
//                Integer nilai;
//                if(editable.toString().isEmpty()){
//
//                }else{
//                    int kembalian = Integer.parseInt(pay_jumlah_uang.getText().toString()) - Integer.parseInt(pay_jumlah_pembayaran.getText().toString());
//                    pay_kembalian.setText(""+kembalian);
//
//                }
//            }
//        });
//        dialog.setPositiveButton("Simpan", new DialogInterface.OnClickListener() {
//            @Override
//            public void onClick(DialogInterface dialogInterface, int i) {
//                //Simpan Penjualan
//                simpanPenjualan();
//                dialogInterface.dismiss();
//            }
//        });
//        dialog.setNegativeButton("Batal", new DialogInterface.OnClickListener() {
//            @Override
//            public void onClick(DialogInterface dialogInterface, int i) {
//                dialogInterface.dismiss();
//            }
//        });
//        dialog.show();
//
//
//    }
//    private void simpanPenjualan(){
//        StringRequest stringRequest = new StringRequest(Request.Method.POST, url_simpan_penjualan,
//                new Response.Listener<String>() {
//                    @Override
//                    public void onResponse(String response) {
//                        try{
//                            JSONObject jsonObject = new JSONObject(response);
//                            String success = jsonObject.getString("success");
//                            if(success.equals("1")) {
//                                String id_penjualan = jsonObject.getString("id"); //Id Hasil Simpan Akan Digunakan kembali
//                                simpanDetailPenjualan(id_penjualan);
//                            }
//                            Toast.makeText(getApplicationContext(), "Berhasil", Toast.LENGTH_SHORT).show();
//                        }catch(JSONException e){
//                            Toast.makeText(getApplicationContext(), e.toString(), Toast.LENGTH_SHORT).show();
//                        }
//                    }
//                },
//                new Response.ErrorListener() {
//                    @Override
//                    public void onErrorResponse(VolleyError error) {
//                        error.printStackTrace();
//                        Toast.makeText(getApplicationContext(), error.toString(), Toast.LENGTH_SHORT).show();
//                    }
//                }
//        ){
//            @Override
//            protected Map<String,String> getParams(){
//                Map<String,String> params = new HashMap<String,String>();
//                params.put("id_customer",String.valueOf(SessionCart.cart_id_customer));
//                params.put("id_staff", SessionLogin.id_staff);
//                params.put("grand_total",String.valueOf(SessionCart.grand_total));
//                return params;
//            }
//        };
//        RequestQueue requestQueue = Volley.newRequestQueue(this);
//        requestQueue.add(stringRequest);
//    }
//
//    private void simpanDetailPenjualan(final String id_penjualan){
//        for(int a=0;a<TestList.keranjangBelanjaList.size();a++) {
//            id_produk = TestList.keranjangBelanjaList.get(a).getId_produk();
//            qty = TestList.keranjangBelanjaList.get(a).getQty();
//            harga_jual = TestList.keranjangBelanjaList.get(a).getHarga();
//            subtotal = TestList.keranjangBelanjaList.get(a).getSubtotal();
//            takeaway_type = TestList.keranjangBelanjaList.get(a).getTakeaway_type();
//
//            StringRequest stringRequest1 = new StringRequest(Request.Method.POST, url_simpan_detail_penjualan,
//                    new Response.Listener<String>() {
//                        @Override
//                        public void onResponse(String response) {
//                            try {
//                                JSONObject jsonObject = new JSONObject(response);
//                                String success = jsonObject.getString("success");
//                                if (success.equals("1")) {
//                                    //Ubah Grand Total Jadi 0
//                                    SessionCart.grand_total = 0;
//                                    button_bayar2.setText(formatMataUang.formatRupiah(0));
//                                    //Kosongkan ArrayList
//                                    TestList.keranjangBelanjaList.clear();
//                                    shopCartAdapter.notifyDataSetChanged();
//                                } else {
//                                    Toast.makeText(getApplicationContext(), "Gagal", Toast.LENGTH_SHORT).show();
//                                }
//                            } catch (JSONException e) {
//                                e.printStackTrace();
//                                Toast.makeText(getApplicationContext(), e.toString(), Toast.LENGTH_SHORT).show();
//                            }
//                        }
//                    },
//                    new Response.ErrorListener() {
//                        @Override
//                        public void onErrorResponse(VolleyError error) {
//                            error.getMessage();
//                            Toast.makeText(getApplicationContext(), error.toString(), Toast.LENGTH_SHORT).show();
//                        }
//                    }
//            ) {
//                @Override
//                protected Map<String, String> getParams() {
//                    Map<String, String> params = new HashMap<String, String>();
//                    params.put("id_penjualan",""+id_penjualan);
//                    params.put("id_produk",""+id_produk);
//                    params.put("qty",""+qty);
//                    params.put("harga",""+harga_jual);
//                    params.put("subtotal",""+subtotal);
//                    params.put("takeaway_type",""+takeaway_type);
//                    return params;
//                }
//            };
//            RequestQueue requestQueue1 = Volley.newRequestQueue(this);
//            requestQueue1.add(stringRequest1);
//        }
//    }
//
//}
