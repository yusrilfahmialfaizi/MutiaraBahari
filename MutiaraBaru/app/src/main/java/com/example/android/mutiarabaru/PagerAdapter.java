package com.example.android.mutiarabaru;

import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentStatePagerAdapter;

public class PagerAdapter extends FragmentStatePagerAdapter {
    int mNumOfTabs;
    public PagerAdapter(FragmentManager fm, int NumOfTabs){
        super(fm);
        this.mNumOfTabs = NumOfTabs;
    }
    @Override
    public Fragment getItem(int position) {
        switch (position) {
            case 0:
                return new Konfirmasi();
            case 1:
                return new Diproses();
            case 2:
                return new Dikemas();
            case 3:
                return new Dikirim();
            case 4:
                return new Diterima();
            case 5:
                return new Selesai();
            case 6:
                return new Dibatalkan();
            default:
                return null;
        }
    }

    @Override
    public int getCount() {
        return mNumOfTabs;
    }
}
