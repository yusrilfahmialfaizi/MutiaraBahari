package com.example.android.mutiarabaru;

import android.content.Context;
import android.content.SharedPreferences;

import java.util.Date;

public class SessionHandler {
    private static final String PREF_NAME = "UserSession";
    private static final String KEY_ID_USER = "id_user";
    private static final String KEY_NAMA = "nama";
    private static final String KEY_ALAMAT = "alamat";
    private static final String KEY_NO_TELEPON = "no_telepon";
	private static final String KEY_STATUS = "status";
	private static final String KEY_EXPIRES = "expires";
    private static final String KEY_EMPTY = "";
    private Context mContext;
    private SharedPreferences.Editor mEditor;
    private SharedPreferences mPreferences;

    public SessionHandler(Context mContext)
    {
        this.mContext = mContext;
        mPreferences = mContext.getSharedPreferences(PREF_NAME, Context.MODE_PRIVATE);
        this.mEditor = mPreferences.edit();
    }

    public void loginUser(String id_user, String nama,String alamat, String no_telepon, String status) {
        mEditor.putString(KEY_ID_USER, id_user);
        mEditor.putString(KEY_NAMA, nama);
        mEditor.putString(KEY_ALAMAT, alamat);
        mEditor.putString(KEY_NO_TELEPON, no_telepon);
        mEditor.putString(KEY_STATUS, status);
        Date date = new Date();

        //Set user session for next 7 days
        long millis = date.getTime() + (7 * 24 * 60 * 60 * 1000);
        mEditor.putLong(KEY_EXPIRES, millis);
        mEditor.commit();
    }

    public boolean isLoggedIn() {
        Date currentDate = new Date();

        long millis = mPreferences.getLong(KEY_EXPIRES, 0);

        /* If shared preferences does not have a value
         then user is not logged in
         */
        if (millis == 0) {
            return false;
        }
        Date expiryDate = new Date(millis);

        /* Check if session is expired by comparing
        current date and Session expiry date
        */
        return currentDate.before(expiryDate);
    }
    public User getUserDetails() {
        //Check if user is logged in first
        if (!isLoggedIn()) {
            return null;
        }
        User user = new User();
        user.setId_user(mPreferences.getString(KEY_ID_USER, KEY_EMPTY));
        user.setNama(mPreferences.getString(KEY_NAMA, KEY_EMPTY));
        user.setAlamat(mPreferences.getString(KEY_ALAMAT, KEY_EMPTY));
        user.setNo_telepon(mPreferences.getString(KEY_NO_TELEPON, KEY_EMPTY));
        user.setStatus(mPreferences.getString(KEY_STATUS, KEY_EMPTY));
        user.setSessionExpiryDate(new Date(mPreferences.getLong(KEY_EXPIRES, 0)));

        return user;
    }

    /**
     * Logs out user by clearing the session
     */
    public void logoutUser(){
        mEditor.clear();
        mEditor.commit();
    }
}
