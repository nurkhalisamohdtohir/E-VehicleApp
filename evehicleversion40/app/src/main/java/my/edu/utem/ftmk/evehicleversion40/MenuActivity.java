package my.edu.utem.ftmk.evehicleversion40;

import androidx.appcompat.app.AppCompatActivity;
import androidx.cardview.widget.CardView;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

public class MenuActivity extends AppCompatActivity implements View.OnClickListener
{

    public CardView cardcalendar, cardLogout;
    TextView staffID;
    ImageView profile;
    SharedPreferences sharedPreferences;
    private static final String SHARED_PREF_NAME="mypref";
    private static final String KEY_ID="Staff_ID";

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu);

        profile=(ImageView) findViewById(R.id.imageProfile);
        profile.setOnClickListener(this);

        cardcalendar= (CardView) findViewById(R.id.cardcalendartrip);
        cardcalendar.setOnClickListener(this);
        cardLogout=(CardView) findViewById(R.id.cardLogOut);
        cardLogout.setOnClickListener(this);
        staffID=(TextView) findViewById(R.id.tvstaffID);

        sharedPreferences=getSharedPreferences(SHARED_PREF_NAME,MODE_PRIVATE);

        String Staff_ID=sharedPreferences.getString(KEY_ID,null);

        if(Staff_ID!=null) {
            staffID.setText(Staff_ID);
        }



    }


    @Override
    public void onClick(View view)
    {


        switch (view.getId())
        {

            case R.id.imageProfile:
                startActivity(new Intent(MenuActivity.this, LogoutActivity.class));
                break;
            case R.id.cardcalendartrip:
                startActivity(new Intent(MenuActivity.this,TripListActivity.class));
                break;
            case R.id.cardLogOut:
                startActivity(new Intent(MenuActivity.this, LoginActivity.class));
        }
    }
}