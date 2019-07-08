//package com.example.android.mutiarabaru;
//
//import android.app.Activity;
//import android.app.AlertDialog;
//import android.content.DialogInterface;
//import android.content.Intent;
//import android.os.Bundle;
//import android.se.omapi.Session;
//import android.support.annotation.NonNull;
//import android.support.annotation.Nullable;
//import android.support.v4.app.Fragment;
//import android.text.Editable;
//import android.text.TextWatcher;
//import android.view.LayoutInflater;
//import android.view.Menu;
//import android.view.MenuInflater;
//import android.view.MenuItem;
//import android.view.View;
//import android.view.ViewGroup;
//import android.widget.AdapterView;
//import android.widget.Button;
//import android.widget.ListView;
//import android.widget.SearchView;
//import android.widget.TextView;
//import android.widget.Toast;
//
//import com.android.volley.Request;
//import com.android.volley.RequestQueue;
//import com.android.volley.Response;
//import com.android.volley.VolleyError;
//import com.android.volley.toolbox.StringRequest;
//import com.android.volley.toolbox.Volley;
//import com.dyp.androidpos.Activity.ShopCartActivity;
//import com.dyp.androidpos.Adapter.KategoriProdukListAdapter;
//import com.dyp.androidpos.Adapter.ProdukListAdapter;
//import com.dyp.androidpos.Library.FormatMataUang;
//import com.dyp.androidpos.Model.KategoriProdukModel;
//import com.dyp.androidpos.Model.ShopCartModel;
//import com.dyp.androidpos.Model.ProdukModel;
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
//public class PointOfsale2 extends Fragment {
//    public PointOfsale2() {
//    }
//
//    //Deklarasi Objek (Digunakan Untuk Mengambil method)
//    ApiURL apiURL = new ApiURL();
//    FormatMataUang formatMataUang = new FormatMataUang();
//    TestList testList = new TestList();
//    SessionCart sessionCart = new SessionCart();
//    //URL
//    private String url_produk = apiURL.getUrl()+"produkapi";
//    private String url_kategoriproduk = apiURL.getUrl()+"kategoriprodukapi";
//    private String url_simpan_penjualan = apiURL.getUrl()+"penjualan?type=1";
//    private String url_simpan_detail_penjualan = apiURL.getUrl()+"penjualan?type=2";
//
//    private ListView list_produk;
//    ArrayList<ProdukModel> produkArrayList;
//
//    private ProdukListAdapter produkListAdapter;
//    public static Button button_bayar;
//    private String id_produk,nama_produk;
//    private int harga_jual,qty;
//    private int subtotal; //
//    private int takeaway_type; // Tipe Takeaway Penjualan
//
//
//
//    ArrayList<KategoriProdukModel> kategoriProdukModelArrayList;
//    @Nullable
//    public void onCreate(@Nullable Bundle savedInstanceState) {
//        super.onCreate(savedInstanceState);
//        setHasOptionsMenu(true);
//    }
//
//    @Override
//    public void onCreateOptionsMenu(Menu menu, MenuInflater inflater) {
//        super.onCreateOptionsMenu(menu, inflater);
//        inflater.inflate(R.menu.navigation_pos, menu);
//        MenuItem item = menu.findItem(R.id.search_pos);
//        SearchView sv = (SearchView) item.getActionView();
//        sv.setOnQueryTextListener(new SearchView.OnQueryTextListener() { //Pencarian
//            @Override
//            public boolean onQueryTextSubmit(String keyword) {
//                Toast.makeText(getActivity(), keyword, Toast.LENGTH_SHORT).show();
//                fetchDataProdukFiltered(keyword);
//                return true;
//            }
//
//            @Override
//            public boolean onQueryTextChange(String keyword) {
//                Toast.makeText(getActivity(), keyword, Toast.LENGTH_SHORT).show();
//                fetchDataProdukFiltered(keyword);
//                return true;
//            }
//        });
//
//
//    }
//
//    @Override
//    public boolean onOptionsItemSelected(MenuItem item) {
//        int id = item.getItemId();
//
//        if (id == R.id.filter_pos) {
//            fetchDataKategoriProduk();
//        }else if(id == R.id.cart_pos){
//            Intent intent = new Intent(getActivity(), ShopCartActivity.class);
//            startActivity(intent);
//        }
//        return super.onOptionsItemSelected(item);
//    }
//    @Override
//    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
//        return inflater.inflate(R.layout.fragment_pointofsale2,container,false);
//    }
//
//    @Override
//    public void onViewCreated(@NonNull View view, @Nullable Bundle savedInstanceState) {
//        super.onViewCreated(view, savedInstanceState);
//        getActivity().setTitle("Point Of Sale");
//        list_produk =view.findViewById(R.id.list_produk);
//        button_bayar = view.findViewById(R.id.button_bayar);
//        ubahTombolGrandTotal("+",0);
//        fetchDataProduk();
//        list_produk.setOnItemClickListener(new AdapterView.OnItemClickListener() { //Jika List Produk Di-klik
//            public void onItemClick(AdapterView<?> list, View v, int pos, long id) {
//                id_produk = produkArrayList.get(pos).getId_produk();
//                nama_produk = produkArrayList.get(pos).getNama_produk();
//                harga_jual = Integer.parseInt(produkArrayList.get(pos).getHarga_jual());
//                qty = 1;
//                subtotal = harga_jual * qty;
//                takeaway_type = 1;
//
//                //Ubah Stok
//                int temp = Integer.parseInt(produkArrayList.get(pos).getStok()) - 1;
//                produkArrayList.get(pos).setStok(String.valueOf(temp));
//                TextView stok= (TextView) v.findViewById(R.id.tv_lv_stok);
//                stok.setText(String.valueOf(temp));
//
//                addToCart(id_produk,nama_produk,harga_jual,qty,subtotal,takeaway_type);
//                ubahTombolGrandTotal("+",harga_jual);//Fokus Ke Tombol
//            }
//        });
//        button_bayar.setOnClickListener(new View.OnClickListener() { //Jika Button Bayar Di Klik
//            @Override
//            public void onClick(View view) {
//                openPaymentDialog();
//            }
//        });
//    }
//
//
//    private void fetchDataKategoriProduk(){
//        StringRequest stringRequest = new StringRequest(Request.Method.GET, url_kategoriproduk,
//                new Response.Listener<String>() {
//                    @Override
//                    public void onResponse(String response) {
//                        try{
//                            JSONObject jsonObject = new JSONObject(response);
//                            if(jsonObject.optString("success").equals("1")){
//                                if(jsonObject.getString("jumlah_data").equals("0")){
//                                    Toast.makeText(getActivity(), "Data Tidak Ditemukan", Toast.LENGTH_SHORT).show();
//                                }else {
//                                    kategoriProdukModelArrayList = new ArrayList<>();
//                                    JSONArray jsonArray = jsonObject.getJSONArray("data");
//
//                                    KategoriProdukModel kategoriProdukModell = new KategoriProdukModel();
//                                    kategoriProdukModell.setId_kategori_produk("0");
//                                    kategoriProdukModell.setNama_kategori("Tanpa Filter");
//                                    kategoriProdukModelArrayList.add(kategoriProdukModell);
//                                    for (int i = 0; i < jsonArray.length(); i++) {
//                                        JSONObject dataObj = jsonArray.getJSONObject(i);
//                                        KategoriProdukModel kategoriProdukModel = new KategoriProdukModel();
//                                        kategoriProdukModel.setId_kategori_produk(dataObj.getString("id_kategori_produk"));
//                                        kategoriProdukModel.setNama_kategori(dataObj.getString("nama_kategori"));
//                                        kategoriProdukModelArrayList.add(kategoriProdukModel);
//                                    }
//                                    final CharSequence[] items = new CharSequence[kategoriProdukModelArrayList.size()];
//                                    for(int i=0;i<kategoriProdukModelArrayList.size();i++){
//                                        items[i] = kategoriProdukModelArrayList.get(i).getNama_kategori();
//                                    }
//                                    AlertDialog.Builder builder = new AlertDialog.Builder(getActivity());
//                                    builder.setTitle("Pilih Kategori");
//                                    builder.setItems(items, new DialogInterface.OnClickListener() {
//                                        public void onClick(DialogInterface dialog, int item) {
//                                            String id_kategori_produk =kategoriProdukModelArrayList.get(item).getId_kategori_produk();
//                                            if(id_kategori_produk.equals("0")){
//                                                fetchDataProduk();
//                                            }else {
//                                                fetchDataProdukByKategori(id_kategori_produk);
//                                            }
//                                            dialog.dismiss();
//
//                                        }
//                                    }).show();
//
//                                }
//                            }
//                        }catch (JSONException e){
//                            Toast.makeText(getActivity(), "Error"+e.getMessage(), Toast.LENGTH_SHORT).show();
//                        }
//                    }
//                },
//                new Response.ErrorListener() {
//                    @Override
//                    public void onErrorResponse(VolleyError error) {
//                        Toast.makeText(getActivity(), "Error Volley"+error.getMessage(), Toast.LENGTH_SHORT).show();
//                    }
//                }
//        );
//        RequestQueue requestQueue = Volley.newRequestQueue(getActivity().getApplicationContext());
//        requestQueue.add(stringRequest);
//    }
//    private void fetchDataProduk(){
//        emptyListView();
//        StringRequest stringRequest = new StringRequest(Request.Method.GET, url_produk,
//                new Response.Listener<String>() {
//                    @Override
//                    public void onResponse(String response) {
//                        try{
//                            JSONObject jsonObject = new JSONObject(response);
//                            if(jsonObject.optString("success").equals("1")){
//                                if(jsonObject.getString("jumlah_data").equals("0")){
//                                    Toast.makeText(getActivity(), "Data Tidak Ditemukan", Toast.LENGTH_SHORT).show();
//                                }else {
//                                    produkArrayList = new ArrayList<>();
//                                    JSONArray jsonArray = jsonObject.getJSONArray("data");
//                                    for (int i = 0; i < jsonArray.length(); i++) {
//                                        JSONObject dataObj = jsonArray.getJSONObject(i);
//                                        ProdukModel produkModel = new ProdukModel();
//                                        produkModel.setId_produk(dataObj.getString("id_produk"));
//                                        produkModel.setNama_produk(dataObj.getString("nama_produk"));
//                                        produkModel.setHarga_jual(dataObj.getString("harga_jual"));
//                                        produkModel.setTipe_stok(dataObj.getString("tipe_stok"));
//                                        produkModel.setStok(dataObj.getString("stok"));
//                                        produkModel.setImage_produk(dataObj.getString("image_produk"));
//                                        produkArrayList.add(produkModel);
//                                    }
//                                    setupListView();
//                                }
//                            }
//                        }catch (JSONException e){
//                            Toast.makeText(getActivity(), "Error"+e.getMessage(), Toast.LENGTH_SHORT).show();
//                        }
//                    }
//                },
//                new Response.ErrorListener() {
//                    @Override
//                    public void onErrorResponse(VolleyError error) {
//                        Toast.makeText(getActivity(), "Error Volley"+error.getMessage(), Toast.LENGTH_SHORT).show();
//                    }
//                }
//        );
//        RequestQueue requestQueue = Volley.newRequestQueue(getActivity().getApplicationContext());
//        requestQueue.add(stringRequest);
//    }
//    private void fetchDataProdukFiltered(String keyword){
//        emptyListView();
//        StringRequest stringRequest = new StringRequest(Request.Method.GET, url_produk +"?search=1&value="+keyword,
//                new Response.Listener<String>() {
//                    @Override
//                    public void onResponse(String response) {
//                        try{
//                            JSONObject jsonObject = new JSONObject(response);
//                            if(jsonObject.optString("success").equals("1")){
//                                if(jsonObject.getString("jumlah_data").equals("0")){
//                                    Toast.makeText(getActivity(), "Data Tidak Ditemukan", Toast.LENGTH_SHORT).show();
//                                }else {
//                                    produkArrayList = new ArrayList<>();
//                                    JSONArray jsonArray = jsonObject.getJSONArray("data");
//                                    for(int i=0;i<jsonArray.length();i++){
//                                        JSONObject dataObj = jsonArray.getJSONObject(i);
//                                        ProdukModel produkModel = new ProdukModel();
//                                        produkModel.setId_produk(dataObj.getString("id_produk"));
//                                        produkModel.setNama_produk(dataObj.getString("nama_produk"));
//                                        produkModel.setHarga_jual(dataObj.getString("harga_jual"));
//                                        produkModel.setTipe_stok(dataObj.getString("tipe_stok"));
//                                        produkModel.setStok(dataObj.getString("stok"));
//                                        produkArrayList.add(produkModel);
//                                    }
//                                    setupListView();
//                                }
//                            }
//                        }catch (JSONException e){
//                            Toast.makeText(getActivity(), "Error"+e.getMessage(), Toast.LENGTH_SHORT).show();
//                        }
//                    }
//                },
//                new Response.ErrorListener() {
//                    @Override
//                    public void onErrorResponse(VolleyError error) {
//                        Toast.makeText(getActivity(), "Error Volley"+error.getMessage(), Toast.LENGTH_SHORT).show();
//                    }
//                }
//        );
//        RequestQueue requestQueue = Volley.newRequestQueue(getActivity().getApplicationContext());
//        requestQueue.add(stringRequest);
//    }
//    private void fetchDataProdukByKategori(String id_kategori){
//        emptyListView();
//        StringRequest stringRequest = new StringRequest(Request.Method.GET, url_produk +"?filter=1&id_kategori_produk="+id_kategori,
//                new Response.Listener<String>() {
//                    @Override
//                    public void onResponse(String response) {
//                        try{
//                            JSONObject jsonObject = new JSONObject(response);
//                            if(jsonObject.optString("success").equals("1")){
//                                if(jsonObject.getString("jumlah_data").equals("0")){
//                                    Toast.makeText(getActivity(), "Data Tidak Ditemukan", Toast.LENGTH_SHORT).show();
//                                }else {
//                                    produkArrayList = new ArrayList<>();
//                                    JSONArray jsonArray = jsonObject.getJSONArray("data");
//                                    for(int i=0;i<jsonArray.length();i++){
//                                        JSONObject dataObj = jsonArray.getJSONObject(i);
//                                        ProdukModel produkModel = new ProdukModel();
//                                        produkModel.setId_produk(dataObj.getString("id_produk"));
//                                        produkModel.setNama_produk(dataObj.getString("nama_produk"));
//                                        produkModel.setHarga_jual(dataObj.getString("harga_jual"));
//                                        produkModel.setTipe_stok(dataObj.getString("tipe_stok"));
//                                        produkModel.setStok(dataObj.getString("stok"));
//                                        produkArrayList.add(produkModel);
//                                    }
//                                    setupListView();
//                                }
//                            }
//                        }catch (JSONException e){
//                            Toast.makeText(getActivity(), "Error"+e.getMessage(), Toast.LENGTH_SHORT).show();
//                        }
//                    }
//                },
//                new Response.ErrorListener() {
//                    @Override
//                    public void onErrorResponse(VolleyError error) {
//                        Toast.makeText(getActivity(), "Error Volley"+error.getMessage(), Toast.LENGTH_SHORT).show();
//                    }
//                }
//        );
//        RequestQueue requestQueue = Volley.newRequestQueue(getActivity().getApplicationContext());
//        requestQueue.add(stringRequest);
//    }
//    private void setupListView(){
//        produkListAdapter = new ProdukListAdapter(getActivity().getApplicationContext(),produkArrayList);
//        list_produk.setAdapter(produkListAdapter);
//    }
//    private void emptyListView(){
//        list_produk.setAdapter(null);
//    }
//    public void addToCart(String id_produk,String nama_produk,int harga_jual,int qty, int subtotal,int takeaway_type){
//        int temp_position=-1;
//        if(testList.keranjangBelanjaList.size() == 0){ //Melakukan Pengecekan Apakah ID sudah ada atau belum
//            ShopCartModel keranjangBelanjaModel = new ShopCartModel(id_produk,nama_produk,harga_jual, qty, subtotal,takeaway_type);
//            testList.keranjangBelanjaList.add(keranjangBelanjaModel);
//        }else{ //Jika Size Tidak Sama Dengan 0
//            for(int i=0;i<testList.keranjangBelanjaList.size();i++){ //Loop Isi KeranjangBelanjaList
//                if(id_produk == testList.keranjangBelanjaList.get(i).getId_produk()){ //Melakukan Pengecekan apakah ada ID Yang Sama
//                    if(testList.keranjangBelanjaList.get(i).getTakeaway_type() == takeaway_type){ //Melakukan Pengecekan apakah ada type takeaway yang sama
//                        temp_position = i; //Jika ada yang sama, maka temp akan menunjuk sesuai hasil looping
//                        break;
//                    }
//                }
//            }
//            if(temp_position == -1){ //Insert Data Baru
//                ShopCartModel keranjangBelanjaModel = new ShopCartModel(id_produk,nama_produk,harga_jual, qty, subtotal,takeaway_type);
//                testList.keranjangBelanjaList.add(keranjangBelanjaModel);
//            }else{ //Temp position didapatkan dari for dari pengecekan diatas
//                int qty_temp = testList.keranjangBelanjaList.get(temp_position).getQty() + 1;
//                testList.keranjangBelanjaList.get(temp_position).setQty(qty_temp);
//            }
//        }
//    }
//    private void ubahTombolGrandTotal(String tipe,int jumlah){
//        if(tipe == "+"){
//            SessionCart.grand_total+=jumlah;
//        }else if(tipe == "-"){
//            SessionCart.grand_total-=jumlah;
//        }
//        button_bayar.setText(formatMataUang.formatRupiah(SessionCart.grand_total));
//
//    }
//    private void ubahStok(int index,String tipe,int nilai){
//        int int_temp = Integer.parseInt(produkArrayList.get(index).getHarga_jual());
//        int jumlah ;
//        if(tipe == "+"){
//            jumlah = int_temp + nilai;
//        }else if(tipe == "-"){
//            jumlah = int_temp - nilai;
//        }
//        String str_temp = String.valueOf(int_temp);
//        produkArrayList.get(index).setHarga_jual(str_temp);
//    }
//    private void openPaymentDialog(){
//        AlertDialog.Builder dialog = new AlertDialog.Builder(getActivity());
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
//                            if(success.equals("1")){
//                                String id_penjualan = jsonObject.getString("id"); //Id Hasil Simpan Akan Digunakan kembali
//                                simpanDetailPenjualan(id_penjualan);
//                                Toast.makeText(getActivity(), "Berhasil", Toast.LENGTH_SHORT).show();
//
//                            }else{
//                                Toast.makeText(getActivity(), "Gagal Menyimpan", Toast.LENGTH_SHORT).show();
//                            }
//                        }catch(JSONException e){
//                            Toast.makeText(getActivity(), e.toString(), Toast.LENGTH_SHORT).show();
//                        }
//                    }
//                },
//                new Response.ErrorListener() {
//                    @Override
//                    public void onErrorResponse(VolleyError error) {
//                        error.printStackTrace();
//                        Toast.makeText(getActivity(), error.toString(), Toast.LENGTH_SHORT).show();
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
//        RequestQueue requestQueue = Volley.newRequestQueue(getActivity().getApplicationContext());
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
////                                            Toast.makeText(getActivity(), "Berhasil", Toast.LENGTH_SHORT).show();
//                                    //Ubah Grand Total Jadi 0
//                                    SessionCart.grand_total = 0;
//                                    button_bayar.setText(formatMataUang.formatRupiah(0));
//                                    //Kosongkan ArrayList
//                                    TestList.keranjangBelanjaList.clear();
//                                } else {
//                                    Toast.makeText(getActivity(), "Gagal", Toast.LENGTH_SHORT).show();
//                                }
//                            } catch (JSONException e) {
//                                e.printStackTrace();
//                                Toast.makeText(getActivity(), e.toString(), Toast.LENGTH_SHORT).show();
//                            }
//                        }
//                    },
//                    new Response.ErrorListener() {
//                        @Override
//                        public void onErrorResponse(VolleyError error) {
//                            error.getMessage();
//                            Toast.makeText(getActivity(), error.toString(), Toast.LENGTH_SHORT).show();
//                        }
//                    }
//            ){
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
//            RequestQueue requestQueue1 = Volley.newRequestQueue(getActivity());
//            requestQueue1.add(stringRequest1);
//        }
//    }
//
//}
