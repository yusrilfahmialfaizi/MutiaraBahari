package com.example.android.mutiarabaru;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.TextView;

import java.util.ArrayList;
import java.util.HashMap;

import static com.bumptech.glide.load.resource.drawable.DrawableTransitionOptions.withCrossFade;

public class RiwayatViewAdapter extends RecyclerView.Adapter<RiwayatViewAdapter.ViewHolder> {
	private Context mContext;
	private ArrayList<HashMap<String, String>> mNotif;
	private SessionHandler sessionHandler;

	public RiwayatViewAdapter(Riwayat notifikasi, ArrayList<HashMap<String, String>> mNotif) {
		this.mContext = notifikasi;
		this.mNotif = mNotif;
	}

	@NonNull
	@Override
	public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
		View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.card_riwayat,null);
		return new ViewHolder(view);
	}

	@Override
	public void onBindViewHolder(final ViewHolder holder, final int position) {
//		Glide.with(mContext)
//				.load("http://192.168.43.70/mutiarabahari/upload/" + mBarang.get(position).get("gambar"))
//				.transition(withCrossFade())
//				.placeholder(R.mipmap.no_image)
//				.into(holder.img_gambar_barang);
//		holder.text_barang.setText(mBarang.get(position).get("nama_barang"));

	}

	@Override
	public int getItemCount() {

		return mNotif.size();
	}

	public static class ViewHolder extends RecyclerView.ViewHolder {

		TextView no_pesanan;
		TextView nm_agen;
		TextView title_alamat;
		TextView status;
		TextView tgl;
		TextView total_hrg;
		TextView jenis_byr;
		TextView status_brng;
		Button btn_lihat_brng;

		public ViewHolder(@NonNull View itemView) {
			super(itemView);

			no_pesanan = (TextView) itemView.findViewById(R.id.no_pesanan);
			nm_agen = (TextView) itemView.findViewById(R.id.nm_agen);
			title_alamat = (TextView) itemView.findViewById(R.id.title_alamat);
			status = (TextView) itemView.findViewById(R.id.status);
			tgl = (TextView) itemView.findViewById(R.id.tgl);
			total_hrg = (TextView) itemView.findViewById(R.id.total_hrg);
			jenis_byr = (TextView) itemView.findViewById(R.id.jenis_byr);
			status_brng = (TextView) itemView.findViewById(R.id.status_brng);
			btn_lihat_brng = (Button) itemView.findViewById(R.id.btn_lihat_brng);
		}
	}
}

