package com.example.android.mutiarabaru;

import android.app.ProgressDialog;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class RegisterActivity extends AppCompatActivity {
    private static final String KEY_STATUS = "status";
    private static final String KEY_MESSAGE = "message";
    private static final String KEY_FULL_NAME = "full_name";
    private static final String KEY_USERNAME = "username";
    private static final String KEY_PASSWORD = "password";
    private static final String KEY_EMPTY = "";
    private EditText etUsername;
    private EditText etPassword;
    private EditText etConfirmPassword;
    private EditText etFullName,alamat,no_telepon;
    private String email,alamata,no_telepona;
    private String password;
    private String confirmPassword;
    private String fullName;
    private ProgressDialog pDialog;
    private String register_url = "http://192.168.43.37/mutiarabahari/user/login/daftarandroid";
    private SessionHandler session;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);
        session = new SessionHandler(getApplicationContext());

        etUsername = findViewById(R.id.email);
        etPassword = findViewById(R.id.Password);
        etConfirmPassword = findViewById(R.id.ConfirmPassword);
        etFullName = findViewById(R.id.nama);
        alamat = findViewById(R.id.alamat);
        no_telepon = findViewById(R.id.no_telepon);

        Button login = findViewById(R.id.btnRegisterLogin);
        Button register = findViewById(R.id.btnRegister);

        //menuju halaman login ketika tombol diklik
        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(RegisterActivity.this, LoginActivity.class);
                startActivity(i);
                finish();
            }
        });

        register.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //mengambil data yang dimasukkan dalam teks edit
                email = etUsername.getText().toString().toLowerCase().trim();
                password = etPassword.getText().toString().trim();
                confirmPassword = etConfirmPassword.getText().toString().trim();
                fullName = etFullName.getText().toString().trim();
                alamata = alamat.getText().toString().trim();
                no_telepona = no_telepon.getText().toString().trim();
                if (validateInputs()) {
                    registerUser();
                }
            }
        });
    }

    private void displayLoader() {
        pDialog = new ProgressDialog(RegisterActivity.this);
        pDialog.setMessage("Signing Up.. Please wait...");
        pDialog.setIndeterminate(false);
        pDialog.setCancelable(false);
        pDialog.show();

    }
    /**
     * Launch Dashboard Activity on Successful Sign Up
     */
    private void loadMainActivity() {
        Intent i = new Intent(getApplicationContext(), LoginActivity.class);
        startActivity(i);
        finish();

    }

    private void registerUser() {
        displayLoader();
		StringRequest request = new StringRequest(Request.Method.POST, register_url,
				new Response.Listener<String>() {
					@Override
					public void onResponse(String response) {
						try {
							pDialog.dismiss();
							JSONObject jsonObject = new JSONObject(response);
							String rs = jsonObject.getString("status");
							if (rs.equals("0")){
								Toast.makeText(RegisterActivity.this,jsonObject.getString("pesan"),Toast.LENGTH_SHORT).show();
							}else if (rs.equals("1")){
								Toast.makeText(RegisterActivity.this,jsonObject.getString("pesan"),Toast.LENGTH_SHORT).show();
							}else if (rs.equals("2")){
								Toast.makeText(RegisterActivity.this,jsonObject.getString("pesan"),Toast.LENGTH_SHORT).show();
								Intent intent = new Intent(RegisterActivity.this, LoginActivity.class);
								startActivity(intent);
								finish();
							}
						} catch (JSONException e) {
							e.printStackTrace();
						}
//							System.out.println(response);
//							String nama 		= jsonObject.getString("nama");
//							String alamat 		= jsonObject.getString("alamat");
//							String no_telepon 	= jsonObject.getString("no_telepon");
//							String respon 		= jsonObject.getString("email");
//							String id_user 		= jsonObject.getString("id_user");
//							String status 		= jsonObject.getString("status");

//							if(respon.equals("0")) {
//								session.loginUser(id_user,nama,alamat,no_telepon,status);
//							}
//							if(respon.equals("1")) {
////                                pDialog.dismiss();
//								Toast.makeText(LoginActivity.this,"password salah",Toast.LENGTH_SHORT).show();
//							}
					}
				},
				new Response.ErrorListener() {
					@Override
					public void onErrorResponse(VolleyError error) {
						pDialog.dismiss();
//                        //Display error message whenever an error occurs
                        Toast.makeText(getApplicationContext(),
                                error.getMessage(), Toast.LENGTH_SHORT).show();
					}
				})
		{
			@Override
			protected Map<String, String> getParams()
			{
				Map<String, String> params = new HashMap<>();
				params.put("nama",fullName);
				params.put("alamat",alamata);
				params.put("no_telepon",no_telepona);
				params.put("email",email);
				params.put("password", password );
				return  params;
			}
		};

		RequestQueue requestQueue = Volley.newRequestQueue(this);
		requestQueue.add(request);
////        Log.i("tagconvertstr", "["+result+"]");
//        JSONObject request = new JSONObject();
//        try {
//            //Populate the request parameters
//            request.put(KEY_USERNAME, username);
//            request.put(KEY_PASSWORD, password);
//            request.put(KEY_FULL_NAME, fullName);
//
//        } catch (JSONException e) {
//            e.printStackTrace();
//        }
//        JsonObjectRequest jsArrayRequest = new JsonObjectRequest
//                (Request.Method.POST, register_url, request, new Response.Listener<JSONObject>() {
//                    @Override
//                    public void onResponse(JSONObject response) {
//                        pDialog.dismiss();
//                        try {
//                            //Check if user got registered successfully
//                            if (response.getInt(KEY_STATUS) == 0) {
//                                //Set the user session
////                                session.loginUser(username,fullName);
//                                loadMainActivity();
//
//                            }else if(response.getInt(KEY_STATUS) == 1){
//                                //Display error message if username is already existsing
//                                etUsername.setError("Username already taken!");
//                                etUsername.requestFocus();
//
//                            }else{
//                                Toast.makeText(getApplicationContext(),
//                                        response.getString(KEY_MESSAGE), Toast.LENGTH_SHORT).show();
//
//                            }
//                        } catch (JSONException e) {
//                            e.printStackTrace();
//                        }
//                    }
//                }, new Response.ErrorListener() {
//
//                    @Override
//                    public void onErrorResponse(VolleyError error) {
//                        pDialog.dismiss();
//                        //Display error message whenever an error occurs
//                        Toast.makeText(getApplicationContext(),
//                                error.getMessage(), Toast.LENGTH_SHORT).show();
//                    }
//                });
//        // Access the RequestQueue through your singleton class.
//        MySingleton.getInstance(this).addToRequestQueue(jsArrayRequest);
    }
    private boolean validateInputs() {
        if (KEY_EMPTY.equals(fullName)) {
            etFullName.setError("Nama tidak boleh kosong");
            etFullName.requestFocus();
            return false;

        }
        if (KEY_EMPTY.equals(alamata)) {
            etFullName.setError("Alamat tidak boleh kosong");
            etFullName.requestFocus();
            return false;

        }
        if (KEY_EMPTY.equals(no_telepona)) {
            etFullName.setError("No telepon tidak boleh kosong");
            etFullName.requestFocus();
            return false;

        }
        if (KEY_EMPTY.equals(email)) {
            etUsername.setError("Email tidak boleh kosong");
            etUsername.requestFocus();
            return false;
        }
        if (KEY_EMPTY.equals(email)) {
            etUsername.setError("Email tidak boleh kosong");
            etUsername.requestFocus();
            return false;
        }
        if (KEY_EMPTY.equals(password)) {
            etPassword.setError("Password tidak boleh kosong");
            etPassword.requestFocus();
            return false;
        }

        if (KEY_EMPTY.equals(confirmPassword)) {
            etConfirmPassword.setError("Confirm Password tidak boleh kosong");
            etConfirmPassword.requestFocus();
            return false;
        }
        if (!password.equals(confirmPassword)) {
            etConfirmPassword.setError("Password and Confirm Password does not match");
            etConfirmPassword.requestFocus();
            return false;
        }

        return true;
    }
}
