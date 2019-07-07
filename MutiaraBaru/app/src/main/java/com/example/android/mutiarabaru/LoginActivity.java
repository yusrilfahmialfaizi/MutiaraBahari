package com.example.android.mutiarabaru;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Context;
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
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class LoginActivity extends AppCompatActivity {
//    private static final String KEY_STATUS = "status";
//    private static final String KEY_MESSAGE = "message";
//    private static final String KEY_FULL_NAME = "full_name";
//    private static final String KEY_USERNAME = "username";
//    private static final String KEY_PASSWORD = "password";
	private static final String KEY_ID_USER 	= "id_user";
	private static final String KEY_NAMA_USER 	= "nama";
	private static final String KEY_ALAMAT 		= "alamat";
	private static final String KEY_NO_TELEPON	= "no_telepon";
	private static final String KEY_STATUS		= "status";
    private static final String KEY_EMPTY = "";
    private EditText etUsername;
    private EditText etPassword;
    private String username;
    private String password;
    private ProgressDialog pDialog;
    private String login_url = "http://192.168.43.37/mutiarabahari/user/agen/loginandroid/login_agen";
    private SessionHandler session;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        session = new SessionHandler(getApplicationContext());

        if(session.isLoggedIn()){
            loadMainActivity();
        }

        etUsername = findViewById(R.id.etLoginUsername);
        etPassword = findViewById(R.id.etLoginPassword);

        Button register = findViewById(R.id.btnLoginRegister);
        Button login = findViewById(R.id.btnLogin);

        //Launch Registration screen when Register Button is clicked
        register.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(LoginActivity.this, RegisterActivity.class);
                startActivity(i);
                finish();
            }
        });

        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //Retrieve the data entered in the edit texts
                username = etUsername.getText().toString().toLowerCase().trim();
                password = etPassword.getText().toString().trim();
				if (validateInputs()){
					login();
				}
            }
        });
    }

    private void loadMainActivity() {
        Intent i = new Intent(LoginActivity.this, MainActivity.class);
        startActivity(i);
        finish();
    }

    private void displayLoader() {
        pDialog = new ProgressDialog(LoginActivity.this);
        pDialog.setMessage("Logging In.. Please wait...");
        pDialog.setIndeterminate(false);
        pDialog.setCancelable(false);
        pDialog.show();
    }

    public void login() {
		displayLoader();
        StringRequest request = new StringRequest(Request.Method.POST, login_url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
						pDialog.dismiss();
						try {
							JSONObject jsonObject = new JSONObject(response);
							System.out.println(response);
							String respon 		= jsonObject.getString("respon");
							String id_user 		= jsonObject.getString("id_user");
							String nama 		= jsonObject.getString("nama");
							String alamat 		= jsonObject.getString("alamat");
							String no_telepon 	= jsonObject.getString("no_telepon");
							String status 		= jsonObject.getString("status");

							if(respon.equals("0")) {
								session.loginUser(id_user,nama,alamat,no_telepon,status);
                                Intent intent = new Intent(LoginActivity.this, MainActivity.class);
                                startActivity(intent);
                                finish();
                            }
                            if(respon.equals("1")) {
//                                pDialog.dismiss();
                                Toast.makeText(LoginActivity.this,"password salah",Toast.LENGTH_SHORT).show();
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {

                    }
                })
        {
            @Override
            protected Map<String, String> getParams()
            {
                Map<String, String> params = new HashMap<>();
                params.put("username",username );
                params.put("password", password );
                return  params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(request);
    }

    private boolean validateInputs() {
        if(KEY_EMPTY.equals(username)){
            etUsername.setError("Username cannot be empty");
            etUsername.requestFocus();
            return false;
        }
        if(KEY_EMPTY.equals(password)){
            etPassword.setError("Password cannot be empty");
            etPassword.requestFocus();
            return false;
        }
        return true;
    }
}
