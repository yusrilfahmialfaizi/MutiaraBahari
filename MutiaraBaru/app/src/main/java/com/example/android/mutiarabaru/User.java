package com.example.android.mutiarabaru;

import java.util.Date;

public class User {
    String id_user;
	String nama;
	String alamat;
	String no_telepon;

	public String getNama() {
		return nama;
	}

	public String getAlamat() {
		return alamat;
	}

	public String getNo_telepon() {
		return no_telepon;
	}

	public void setNama(String nama) {
		this.nama = nama;
	}

	public void setAlamat(String alamat) {
		this.alamat = alamat;
	}

	public void setNo_telepon(String no_telepon) {
		this.no_telepon = no_telepon;
	}

	String status;
    Date sessionExpiryDate;

    public void setId_user(String id_user)
    {
        this.id_user = id_user;
    }
    public void setStatus(String status)
    {
        this.status = status;
    }
    public  void setSessionExpiryDate(Date sessionExpiryDate)
    {
        this.sessionExpiryDate = sessionExpiryDate;
    }
    public String getId_user()
    {
        return id_user;
    }
    public  String getStatus()
    {
        return status;
    }

    public Date getSessionExpiryDate() {
        return sessionExpiryDate;
    }
}

