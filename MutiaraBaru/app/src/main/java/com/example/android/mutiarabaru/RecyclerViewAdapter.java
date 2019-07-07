package com.example.android.mutiarabaru;

import android.content.Context;
import android.content.Intent;
import android.net.Uri;
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

import java.io.File;
import java.util.ArrayList;
import java.util.HashMap;

import static com.bumptech.glide.load.resource.drawable.DrawableTransitionOptions.withCrossFade;

public class RecyclerViewAdapter extends
        RecyclerView.Adapter<RecyclerViewAdapter.ViewHolder> {

    private Context mContext;
    private ArrayList<HashMap<String, String>> mData;

    public RecyclerViewAdapter(Beranda mainActivity, ArrayList<HashMap<String,String>> mData) {
        this.mContext = mainActivity.getActivity();
        this.mData = mData;
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
    	View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.cardview_item, null);
    	return new ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(ViewHolder holder,final int position) {
		Glide.with(mContext)
				.load("http://192.168.43.37/mutiarabahari/upload/" + mData.get(position).get("gambar"))
				.transition(withCrossFade())
				.placeholder(R.mipmap.no_image)
				.into(holder.img_gambar_merek);

        holder.text_merek.setText(mData.get(position).get("merek"));
        holder.img_gambar_merek.setOnClickListener( new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(mContext, ListBarang.class);
                intent.putExtra("id_merek", mData.get(position).get("id_merek"));
                mContext.startActivity(intent);
            }
        });
    }

    @Override
    public int getItemCount() {
        return mData.size();
    }

    public static class ViewHolder extends RecyclerView.ViewHolder
    {

        TextView text_merek;
        ImageView img_gambar_merek;

        public ViewHolder(View itemView) {
            super(itemView);

            text_merek = (TextView) itemView.findViewById(R.id.merek);
            img_gambar_merek = (ImageView) itemView.findViewById(R.id.gambar_merek);
        }
    }
}
