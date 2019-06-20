package com.example.android.mutiarabahari;

import android.content.Context;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.bumptech.glide.Glide;

import java.util.ArrayList;
import java.util.HashMap;

import static com.bumptech.glide.load.resource.drawable.DrawableTransitionOptions.withCrossFade;

public class BarangViewAdapter extends RecyclerView.Adapter<BarangViewAdapter.ViewHolder>
{

	private Context mContext;
	private ArrayList<HashMap<String, String>> mBarang;

	public BarangViewAdapter(ListBarang barang, ArrayList<HashMap<String,String>> mBarang) {
		this.mContext = barang;
		this.mBarang = mBarang;
	}

	@Override
	public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType)
	{
		View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.cardview_barang,null);

		return new ViewHolder(view);
	}

	@Override
	public void onBindViewHolder(ViewHolder holder, final int position)
	{
//        holder.text_merek.setText(mData.get(position).getMerek());
//        holder.img_gambar_merek.setImageResource(mData.get(position).getGambar());
		Glide.with(mContext)
				.load("http://192.168.43.37/mutiarabahari/upload/" + mBarang.get(position).get("gambar"))
				.transition(withCrossFade())
				.placeholder(R.mipmap.ic_launcher)
				.into(holder.img_gambar_barang);
		holder.text_barang.setText(mBarang.get(position).get("nama_barang"));
		holder.img_gambar_barang.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View v) {
				Toast.makeText(mContext, "ID Barang : " + mBarang.get(position).get("id_barang"), Toast.LENGTH_SHORT).show();
//				AppCompatActivity activity = (AppCompatActivity) v.getContext();
//				Barang barang = new Barang();
//				Bundle bundle=new Bundle();
//				bundle.putString("id_merek",mBarang.get(position).get("id_merek"));
//				barang.setArguments(bundle);
//				activity.getSupportFragmentManager().beginTransaction().replace(R.id.fragment_container, new Barang()).commit();
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
		ImageView img_gambar_barang;

		public ViewHolder(View itemView) {
			super(itemView);

			text_barang = (TextView) itemView.findViewById(R.id.barang);
			img_gambar_barang = (ImageView) itemView.findViewById(R.id.gambar_barang);
		}
	}

}
