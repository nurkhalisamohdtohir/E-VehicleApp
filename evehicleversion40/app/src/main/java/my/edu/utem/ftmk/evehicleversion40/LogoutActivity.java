package my.edu.utem.ftmk.evehicleversion40;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class LogoutActivity extends AppCompatActivity implements View.OnClickListener{

    private Button logoutButton;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_logout);

        logoutButton=(Button) findViewById(R.id.logout_button);
        logoutButton.setOnClickListener(this);

    }

    @Override
    public void onClick(View view)
    {
        switch (view.getId())
        {
            case R.id.logout_button:
                startActivity(new Intent(LogoutActivity.this, LoginActivity.class));
                break;
        }

    }
}