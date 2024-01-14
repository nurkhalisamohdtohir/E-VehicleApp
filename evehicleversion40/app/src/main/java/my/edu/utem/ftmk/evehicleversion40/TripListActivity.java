package my.edu.utem.ftmk.evehicleversion40;

import androidx.annotation.NonNull;
import androidx.annotation.StringRes;
import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.lang.reflect.Type;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

public class TripListActivity extends AppCompatActivity
{
    ListView listView;
    TripAdapter tripAdapter;


    public static  ArrayList<Trip> tripArrayList=new ArrayList<>();

    String url="http://192.168.1.109/androidevehicle//getTripTest.php";

    Trip trip;
    TextView dID;


    SharedPreferences sharedPreferences;
    private static final String SHARED_PREF_NAME="mypref";
    private static final String KEY_ID="Staff_ID";
    private static final String KEY_TRIPNO="Trip_No";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_trip_list);

        dID=(TextView) findViewById(R.id.tvID);
        listView=findViewById(R.id.tripListView);
        tripAdapter=new TripAdapter(this,tripArrayList);
        listView.setAdapter(tripAdapter);



        sharedPreferences=getSharedPreferences(SHARED_PREF_NAME,MODE_PRIVATE);
        String cStaff_ID=sharedPreferences.getString(KEY_ID,null);

        String Trip_No=sharedPreferences.getString(KEY_TRIPNO,null);


        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, final int position, long Trip_No) {


                AlertDialog.Builder builder = new AlertDialog.Builder(view.getContext());
                ProgressDialog progressDialog = new ProgressDialog(view.getContext());

                CharSequence[] dialogItem = {"Insert Mileage"};
                builder.setTitle("Mileage for Trip No : "+tripArrayList.get(position).getTrip_no());
                builder.setItems(dialogItem, new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialogInterface, int i) {

                        switch (i) {
                            case 0:
                                PrefConfig.writeListInPref(getApplicationContext(), tripArrayList);
                                startActivity(new Intent(getApplicationContext(),MileageActivity.class)
                                        .putExtra("position",position));
                                break;
                            case 1:
                                startActivity(new Intent(getApplicationContext(),TripListActivity.class)
                                        .putExtra("position",position));
                                break;
                        }
                    }
                });

                builder.create().show();
            }
        });
        retrieveData(cStaff_ID);

    }

    public void retrieveData(String cStaff_ID)
    {
        dID.setText(cStaff_ID);
        String Staff_ID=dID.getText().toString().trim();

        if (!Staff_ID.equals("")) {
            StringRequest request = new StringRequest(Request.Method.POST, url,
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {

                            tripArrayList.clear();
                            try {
                                JSONObject jsonObject = new JSONObject(response);
                                String success = jsonObject.getString("success");
                                JSONArray jsonArray = jsonObject.getJSONArray("booking");

                                if (success.equals("1")) {

                                    for (int i = 0; i < jsonArray.length(); i++) {
                                        JSONObject object = jsonArray.getJSONObject(i);

                                        String book_no = object.getString("Book_No");
                                        String trip_no=object.getString("Trip_No");
                                        String date_out = object.getString("Date_Out");
                                        String date_in = object.getString("Date_In");
                                        String time_in = object.getString("Time_In");
                                        String time_out = object.getString("Time_Out");
                                        String destination = object.getString("Destination");
                                        String vehicle_plate=object.getString("Vehicle_Plate");

                                        trip = new Trip(book_no, trip_no,date_in, date_out, time_in, time_out, destination, vehicle_plate);
                                        tripArrayList.add(trip);
                                        tripAdapter.notifyDataSetChanged();
                                    }

                                }
                            } catch (JSONException e) {
                                e.printStackTrace();
                            }

                        }
                    }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    Toast.makeText(TripListActivity.this, error.getMessage(), Toast.LENGTH_SHORT).show();
                }
            }) {
                @Override
                protected Map<String, String> getParams()  {
                    Map<String, String> data = new HashMap<String, String>();
                    data.put("Staff_ID", Staff_ID);

                    return data;
                }
            };
            RequestQueue requestQueue = Volley.newRequestQueue(this);
            requestQueue.add(request);

        } else {
            Toast.makeText(this, "Staff Id is empty!", Toast.LENGTH_SHORT).show();
        }

    }
}
