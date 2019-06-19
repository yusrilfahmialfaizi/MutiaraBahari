package com.example.android.mutiarabahari;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentTransaction;
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
import java.util.List;

import static com.bumptech.glide.load.resource.drawable.DrawableTransitionOptions.withCrossFade;

public class RecyclerViewAdapter extends RecyclerView.Adapter<RecyclerViewAdapter.ViewHolder>
{

    private Context mContext;
    private ArrayList<HashMap<String, String>> mData;

    public RecyclerViewAdapter(Homepage homepage, ArrayList<HashMap<String,String>> mData) {
        this.mContext = homepage.getActivity();
        this.mData = mData;
    }

    @Override
    public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType)
    {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.cardview_item,null);

        return new ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(ViewHolder holder, final int position)
    {
//        holder.text_merek.setText(mData.get(position).getMerek());
//        holder.img_gambar_merek.setImageResource(mData.get(position).getGambar());
        Glide.with(mContext)
                .load("http://192.168.43.70/mutiarabahari/upload/" + mData.get(position).get("gambar"))
                .transition(withCrossFade())
                .placeholder(R.mipmap.ic_launcher)
                .into(holder.img_gambar_merek);
        holder.text_merek.setText(mData.get(position).get("merek"));
        holder.img_gambar_merek.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(mContext, "ID Merek : " + mData.get(position).get("id_merek"), Toast.LENGTH_SHORT).show();
				AppCompatActivity activity = (AppCompatActivity) v.getContext();
				Barang barang = new Barang();
				Bundle bundle=new Bundle();
				bundle.putString("ID_MEREK",mData.get(position).get("id_merek"));
//				bundle.putString("JOB",current.job);
				barang.setArguments(bundle);
				activity.getSupportFragmentManager().beginTransaction().replace(R.id.fragment_container, new Barang()).commit();
//				FragmentManager fragmentManager = getChildFragmentManager();
//				FragmentTransaction fragmentTransaction = fragmentManager.beginTransaction();
////				Barang barang = new Barang();
////				FragmentTransaction fragmentTransaction = getFragmentManager().beginTransaction();
////				fragmentTransaction.replace(R.id.fragment_container, barang);
////				fragmentTransaction.addToBackStack(null);
////				fragmentTransaction.commit();
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
