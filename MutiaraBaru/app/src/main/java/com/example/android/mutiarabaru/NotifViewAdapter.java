package com.example.android.mutiarabaru;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import java.util.ArrayList;
import java.util.HashMap;

public class NotifViewAdapter extends RecyclerView.Adapter<NotifViewAdapter.ViewHolder> {
	private Context mContext;
	private ArrayList<HashMap<String, String>> mNotif;
	private SessionHandler sessionHandler;

	public NotifViewAdapter(Notifikasi notifikasi, ArrayList<HashMap<String, String>> mNotif) {
		this.mContext = notifikasi;
		this.mNotif = mNotif;
	}

	@NonNull
	@Override
	public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
		View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.card_notif,null);
		return new ViewHolder(view);
	}

	@Override
	public void onBindViewHolder(@NonNull ViewHolder viewHolder, int i) {

	}

	@Override
	public int getItemCount() {
		return 0;
	}

	public static class ViewHolder extends RecyclerView.ViewHolder {

		
		public ViewHolder(@NonNull View itemView) {
			super(itemView);
		}
	}
}

