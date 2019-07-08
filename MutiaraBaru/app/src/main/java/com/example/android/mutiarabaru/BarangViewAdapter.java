package com.example.android.mutiarabaru;

import android.content.Context;
import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;

import com.bumptech.glide.Glide;

import java.util.ArrayList;
import java.util.HashMap;

import static com.bumptech.glide.load.resource.drawable.DrawableTransitionOptions.withCrossFade;
import static com.example.android.mutiarabaru.ModelProducts.hargasatuan;
import static com.example.android.mutiarabaru.ModelProducts.id_barang;
import static com.example.android.mutiarabaru.ModelProducts.nama_barang;

public class BarangViewAdapter extends RecyclerView.Adapter<BarangViewAdapter.ViewHolder> {

    private Context mContext;
    private ArrayList<HashMap<String, String>> mBarang;
    public static ArrayList<ModelProducts> modelProductsArrayList = new ArrayList<>();
    Controller controller ;
    ModelProducts modelProducts;
    private SessionHandler sessionHandler;
    TestList testList = new TestList();


	public BarangViewAdapter(ListBarang barang, ArrayList<HashMap<String,String>> mBarang) {
        this.mContext = barang;
        this.mBarang = mBarang;
    }

    @Override
    public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.cardview_barang,null);
        return new ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(final ViewHolder holder, final int position) {

        Glide.with(mContext)
                .load("http://192.168.43.70/mutiarabahari/upload/" + mBarang.get(position).get("gambar"))
                .transition(withCrossFade())
                .placeholder(R.mipmap.no_image)
                .into(holder.img_gambar_barang);
        holder.text_barang.setText(mBarang.get(position).get("nama_barang"));


		sessionHandler = new SessionHandler(mContext);
        final User user = sessionHandler.getUserDetails();
        if (user.getStatus().equals("agen")){
			holder.harga.setText("Rp. "+mBarang.get(position).get("hrg_grosir1"));
		}else if(user.getStatus().equals("pelanggan biasa")){
			holder.harga.setText("Rp. "+mBarang.get(position).get("harga"));
		}
		holder.pesan.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View v) {
				int temp_position=-1;
				String id_barang = mBarang.get(position).get("id_barang");
				String nama_barang = mBarang.get(position).get("nama_barang");
				int qty = Integer.valueOf(String.valueOf(holder.qty.getText()));

				if(testList.keranjangBelanjaList.size() == 0){ //Melakukan Pengecekan Apakah ID sudah ada atau belum
					if (qty <= 750 && user.getStatus().equals("agen")){
					int hargasatuan1 = Integer.parseInt((mBarang.get(position).get("hrg_grosir1")));
						ModelProducts keranjangBelanjaModel = new ModelProducts(id_barang,nama_barang,qty, hargasatuan1);
						testList.keranjangBelanjaList.add(keranjangBelanjaModel);
//						modelProducts = new ModelProducts(id_barang,nama_barang,qty,hargasatuan1);
					}else if (qty >750 && qty<1000 && user.getStatus().equals("agen")){
						int hargasatuan2 = Integer.parseInt((mBarang.get(position).get("hrg_grosir2")));
						ModelProducts keranjangBelanjaModel = new ModelProducts(id_barang,nama_barang,qty, hargasatuan2);
						testList.keranjangBelanjaList.add(keranjangBelanjaModel);
//						modelProducts = new ModelProducts(id_barang,nama_barang,qty,hargasatuan2);
					}else if (qty >= 1000 && user.getStatus().equals("agen")){
						int hargasatuan3 = Integer.parseInt((mBarang.get(position).get("hrg_grosir3")));
						ModelProducts keranjangBelanjaModel = new ModelProducts(id_barang,nama_barang,qty, hargasatuan3);
						testList.keranjangBelanjaList.add(keranjangBelanjaModel);
//						modelProducts = new ModelProducts(id_barang,nama_barang,qty,hargasatuan3);
					}else if (user.getStatus().equals("pelanggan biasa")){
						int hargasatuan = Integer.parseInt((mBarang.get(position).get("harga")));
						ModelProducts keranjangBelanjaModel = new ModelProducts(id_barang,nama_barang,qty, hargasatuan);
						testList.keranjangBelanjaList.add(keranjangBelanjaModel);
//						modelProducts = new ModelProducts(id_barang,nama_barang,qty,hargasatuan);
					}
//					ModelProducts keranjangBelanjaModel = new ModelProducts(id_barang,nama_barang,qty, hargasatuan);
				}
				else{ //Jika Size Tidak Sama Dengan 0
//					for(int i=0;i<testList.keranjangBelanjaList.size();i++){ //Loop Isi KeranjangBelanjaList
//						if(id_barang == testList.keranjangBelanjaList.get(i).getId_barang()){ //Melakukan Pengecekan apakah ada ID Yang Sama
////							if(testList.keranjangBelanjaList.get(i).getTakeaway_type() == takeaway_type){ //Melakukan Pengecekan apakah ada type takeaway yang sama
//								temp_position = i; //Jika ada yang sama, maka temp akan menunjuk sesuai hasil looping
//								break;
////							}
//						}
//					}
					if(temp_position == -1){ //Insert Data Baru
						if (qty <= 750 && user.getStatus().equals("agen")){
							int hargasatuan1 = Integer.parseInt((mBarang.get(position).get("hrg_grosir1")));
							ModelProducts keranjangBelanjaModel = new ModelProducts(id_barang,nama_barang,qty, hargasatuan1);
							testList.keranjangBelanjaList.add(keranjangBelanjaModel);
//						modelProducts = new ModelProducts(id_barang,nama_barang,qty,hargasatuan1);
						}else if (qty >750 && qty<1000 && user.getStatus().equals("agen")){
							int hargasatuan2 = Integer.parseInt((mBarang.get(position).get("hrg_grosir2")));
							ModelProducts keranjangBelanjaModel = new ModelProducts(id_barang,nama_barang,qty, hargasatuan2);
							testList.keranjangBelanjaList.add(keranjangBelanjaModel);
//						modelProducts = new ModelProducts(id_barang,nama_barang,qty,hargasatuan2);
						}else if (qty >= 1000 && user.getStatus().equals("agen")){
							int hargasatuan3 = Integer.parseInt((mBarang.get(position).get("hrg_grosir3")));
							ModelProducts keranjangBelanjaModel = new ModelProducts(id_barang,nama_barang,qty, hargasatuan3);
							testList.keranjangBelanjaList.add(keranjangBelanjaModel);
//						modelProducts = new ModelProducts(id_barang,nama_barang,qty,hargasatuan3);
						}else if (user.getStatus().equals("pelanggan biasa")){
							int hargasatuan = Integer.parseInt((mBarang.get(position).get("harga")));
							ModelProducts keranjangBelanjaModel = new ModelProducts(id_barang,nama_barang,qty, hargasatuan);
							testList.keranjangBelanjaList.add(keranjangBelanjaModel);
//						modelProducts = new ModelProducts(id_barang,nama_barang,qty,hargasatuan);
						}
//						ModelProducts keranjangBelanjaModel = new ModelProducts(id_produk,nama_produk,harga_jual, qty, subtotal,takeaway_type);
//						testList.keranjangBelanjaList.add(keranjangBelanjaModel);
					}
//					else{ //Temp position didapatkan dari for dari pengecekan diatas
//						int qty_temp = testList.keranjangBelanjaList.get(temp_position).getQty() + qty;
//						testList.keranjangBelanjaList.get(temp_position).setQty(qty_temp);
//					}
				}
//				modelProductsArrayList = new ArrayList<ModelProducts>();
//				Controller ct = (Controller) mContext.getApplicationContext();
//				modelProducts = null;
//				String id_barang = mBarang.get(position).get("id_barang");
//				String nama_barang = mBarang.get(position).get("nama_barang");
//				int qty = Integer.valueOf(String.valueOf(holder.qty.getText()));
//				if (qty <= 750 && user.getStatus().equals("agen")){
//					int hargasatuan1 = Integer.parseInt((mBarang.get(position).get("hrg_grosir1")));
//					modelProducts = new ModelProducts(id_barang,nama_barang,qty,hargasatuan1);
//				}else if (qty >750 && qty<1000 && user.getStatus().equals("agen")){
//					int hargasatuan2 = Integer.parseInt((mBarang.get(position).get("hrg_grosir2")));
//					modelProducts = new ModelProducts(id_barang,nama_barang,qty,hargasatuan2);
//				}else if (qty >= 1000 && user.getStatus().equals("agen")){
//					int hargasatuan3 = Integer.parseInt((mBarang.get(position).get("hrg_grosir3")));
//					modelProducts = new ModelProducts(id_barang,nama_barang,qty,hargasatuan3);
//				}else if (user.getStatus().equals("pelanggan biasa")){
//					int hargasatuan = Integer.parseInt((mBarang.get(position).get("harga")));
//					modelProducts = new ModelProducts(id_barang,nama_barang,qty,hargasatuan);
//				}
//				ct.setProducts(modelProducts);
//
//				for (int i = 0; i<ct.getCart().getCartsize();i++){
//					System.out.println(ct.getCart().getProducts(i).getId_barang());
//				}

//				String id_barang = mBarang.get(position).get("id_barang");
//				String nama_barang = mBarang.get(position).get("nama_barang");
//
//				int qty = Integer.valueOf(String.valueOf(holder.qty.getText()));
//				if (qty <= 750 && user.getStatus().equals("agen")){
//					int hargasatuan1 = Integer.parseInt((mBarang.get(position).get("hrg_grosir1")));
//					modelProducts = new ModelProducts(id_barang,nama_barang,qty,hargasatuan1);
//				}else if (qty >750 && qty<1000 && user.getStatus().equals("agen")){
//					int hargasatuan2 = Integer.parseInt((mBarang.get(position).get("hrg_grosir2")));
//					modelProducts = new ModelProducts(id_barang,nama_barang,qty,hargasatuan2);
//				}else if (qty >= 1000 && user.getStatus().equals("agen")){
//					int hargasatuan3 = Integer.parseInt((mBarang.get(position).get("hrg_grosir3")));
//					modelProducts = new ModelProducts(id_barang,nama_barang,qty,hargasatuan3);
//				}else if (user.getStatus().equals("pelanggan biasa")){
//					int hargasatuan = Integer.parseInt((mBarang.get(position).get("harga")));
//					modelProducts = new ModelProducts(id_barang,nama_barang,qty,hargasatuan);
//				}
//				modelProductsArrayList.add(modelProducts);
				Intent i = new Intent(mContext, OrderActivity.class);
				mContext.startActivity(i);
			}
		});
    }
    @Override
    public int getItemCount() {
        return mBarang.size();
    }

    public static class ViewHolder extends RecyclerView.ViewHolder
    {

        TextView text_barang;
        TextView harga;
        EditText qty;
        Button pesan;
        ImageView img_gambar_barang;

        public ViewHolder(View itemView) {
            super(itemView);

            text_barang = (TextView) itemView.findViewById(R.id.barang);
            harga = (TextView) itemView.findViewById(R.id.harga);
            qty = (EditText) itemView.findViewById(R.id.qty);
            img_gambar_barang = (ImageView) itemView.findViewById(R.id.gambar_barang);
            pesan = (Button) itemView.findViewById(R.id.Pesan);
			final Controller ct = (Controller) itemView.getApplicationWindowToken();

        }
    }

}
