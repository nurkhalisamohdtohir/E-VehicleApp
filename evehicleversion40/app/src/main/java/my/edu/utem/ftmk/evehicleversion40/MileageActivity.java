package my.edu.utem.ftmk.evehicleversion40;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.w3c.dom.Text;

import java.lang.reflect.Array;
import java.net.URL;
import java.util.ArrayList;
import java.util.Date;
import java.util.HashMap;
import java.util.Map;

public class MileageActivity extends AppCompatActivity {

    EditText etstartmileage, etendmileage;
    TextView dateOut, destination, tv_tripNo;
    public static ArrayList<Trip> tripArrayList;

    Trip trip;

    String Start_Mileage, End_Mileage;
    int position;

    String URL="http://192.168.1.109/androidevehicle//updateMileage.php";

    SharedPreferences sharedPreferences;
    private static final String SHARED_PREF_NAME="mypref";
    //private static final String KEY_ID="Staff_ID";
    private static final String KEY_TRIPNO="Trip_No";
    private static final String KEY_VEHICLEPLATENO="Vehicle_Plate";
    private static final String KEY_DATE="Date_In";
    private static final String KEY_DESTINATION="Destination";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_mileage);

        Start_Mileage = End_Mileage = "";
        etstartmileage=(EditText)findViewById(R.id.editTextstartmileage);
        etendmileage=(EditText)findViewById(R.id.editTextEndmileage);
        dateOut=(TextView)findViewById(R.id.tvDateMileage);
        destination=(TextView)findViewById(R.id.tvDestinationMileage);
        tv_tripNo=(TextView)findViewById(R.id.tvTripNoMileage) ;


        tripArrayList = PrefConfig.readListFromPref(this);
        Intent intent =getIntent();
        position = intent.getExtras().getInt("position");

        String Date_Out=tripArrayList.get(position).getDate_out();
        dateOut.setText(Date_Out);
        String Destination=tripArrayList.get(position).getDestination();
        destination.setText(Destination);
        String TripNo=tripArrayList.get(position).getTrip_no();
        tv_tripNo.setText(TripNo);


        sharedPreferences=getSharedPreferences(SHARED_PREF_NAME,MODE_PRIVATE);


    }



    public void UpdateDetailsMileage(View view)
    {

        ProgressDialog progressDialog=new ProgressDialog(this);
        progressDialog.setMessage("Updating....");
        progressDialog.show();

        Start_Mileage=etstartmileage.getText().toString();
        End_Mileage=etendmileage.getText().toString();

        Intent intent =getIntent();
        position = intent.getExtras().getInt("position");

        String Trip_No=tripArrayList.get(position).getTrip_no();
        String Vehicle_Plate=tripArrayList.get(position).getVehicle_plate();


        if (!Start_Mileage.equals("") && !End_Mileage.equals("")) {

            StringRequest stringRequest=new StringRequest(Request.Method.POST, URL, new Response.Listener<String>() {
                @Override
                public void onResponse(String response) {
                    progressDialog.dismiss();

                    //Toast.makeText(MileageActivity.this, response, Toast.LENGTH_SHORT).show();
                    Log.d("res", response);
                    if (response.equals("succesfully"))
                    {
                        Toast.makeText(MileageActivity.this, "Succesfully update", Toast.LENGTH_SHORT).show();
                        startActivity(new Intent(MileageActivity.this,MenuActivity.class));

                    } else if (response.equals("failure")) {
                        Toast.makeText(MileageActivity.this, "Fail to update!", Toast.LENGTH_SHORT).show();
                    }

                }
            }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {

                    progressDialog.dismiss();
                    Toast.makeText(MileageActivity.this, error.getMessage().toString(), Toast.LENGTH_SHORT).show();

                }
            }) {
                @Override
                protected Map<String, String> getParams()  {
                    Map<String, String> data = new HashMap<String, String>();
                    data.put("Start_Mileage", Start_Mileage);
                    data.put("End_Mileage", End_Mileage);
                    data.put("Trip_No", Trip_No);
                    data.put("Vehicle_Plate", Vehicle_Plate);
                    return data;
                }
            };
            RequestQueue requestQueue = Volley.newRequestQueue(MileageActivity.this);
            requestQueue.add(stringRequest);

        } else {
            Toast.makeText(this, "Field can not be empty!", Toast.LENGTH_SHORT).show();
        }
    }


}
