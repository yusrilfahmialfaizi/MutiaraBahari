package com.example.android.mutiarabaru;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;

public class Edit_Profil extends AppCompatActivity implements View.OnClickListener {
	private ImageView imageView;
	private EditText email, password, fullname, phone, address;
	private Button btn_save;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_edit_profil);

		email = (EditText)findViewById(R.id.etLoginUsername);
		password = (EditText)findViewById(R.id.etLoginPassword);
		fullname = (EditText)findViewById(R.id.etFullName);
		phone = (EditText)findViewById(R.id.etPhone);
		address = (EditText)findViewById(R.id.etAddress);

		btn_save = (Button)findViewById(R.id.btn_save);

		btn_save.setOnClickListener(this);
	}

	@Override
	public void onClick(View v) {
	}
}
