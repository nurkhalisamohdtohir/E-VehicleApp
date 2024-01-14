package my.edu.utem.ftmk.evehicleversion40;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.loader.app.LoaderManager;
import androidx.loader.content.Loader;

import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.util.Patterns;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.io.StringReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLEncoder;
import java.util.HashMap;
import java.util.Map;
import java.util.regex.Pattern;

public class LoginActivity extends AppCompatActivity  {

    private EditText editTextId, editTextPass;
    private String Staff_ID, Staff_Password;

    private String URL = "http://192.168.1.109/androidevehicle/login.php";

    SharedPreferences sharedPreferences;
    private static final String SHARED_PREF_NAME="mypref";
    private static final String KEY_ID="Staff_ID";


    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        Staff_ID = Staff_Password = "";
        editTextId = (EditText) findViewById(R.id.txtId);
        editTextPass = (EditText) findViewById(R.id.txtPassword);

        sharedPreferences=getSharedPreferences(SHARED_PREF_NAME,MODE_PRIVATE);
        String Staff_ID=sharedPreferences.getString(KEY_ID,null);


    }

    public void login(View view) {
        final ProgressDialog progressDialog=new ProgressDialog(this);
        progressDialog.setMessage("Please wait....");
        progressDialog.show();
        Staff_ID = editTextId.getText().toString().trim();
        Staff_Password = editTextPass.getText().toString().trim();
        if (!Staff_ID.equals("") && !Staff_Password.equals("")) {
            StringRequest stringRequest = new StringRequest(Request.Method.POST, URL, new Response.Listener<String>() {

                @Override
                public void onResponse(String response) {
                    progressDialog.dismiss();

                    Log.d("res", response);
                    if (response.equals("login successfully")) {
                        SharedPreferences.Editor editor=sharedPreferences.edit();
                        editor.putString(KEY_ID,editTextId.getText().toString());
                        editor.apply();
                        startActivity(new Intent(LoginActivity.this,MenuActivity.class));

                        finish();
                    } else if (response.equals("failure")) {
                        Toast.makeText(LoginActivity.this, "Invalid Login Id/Password", Toast.LENGTH_SHORT).show();
                    }
                }

            }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    Toast.makeText(LoginActivity.this, error.toString().trim(), Toast.LENGTH_SHORT).show();
                }
            }) {
                @Override
                protected Map<String, String> getParams() throws AuthFailureError {
                    Map<String, String> data = new HashMap<>();
                    data.put("Staff_ID", Staff_ID);
                    data.put("Staff_Password", Staff_Password);
                    return data;
                }
            };
            RequestQueue requestQueue = Volley.newRequestQueue(getApplicationContext());
            requestQueue.add(stringRequest);
        } else {
            Toast.makeText(this, "Field can not be empty!", Toast.LENGTH_SHORT).show();
        }

    }

}











