package my.edu.utem.ftmk.evehicleversion40;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.recyclerview.widget.RecyclerView;

import org.w3c.dom.Text;

import java.util.ArrayList;
import java.util.List;

public class TripAdapter extends ArrayAdapter<Trip>
{
    Context context;
    List<Trip> arrayListTrip;



    public TripAdapter(@NonNull Context context, List<Trip> arrayListTrip)
    {
        super(context, R.layout.custom_list_item,arrayListTrip);

        this.context=context;
        this.arrayListTrip=arrayListTrip;
    }

    @NonNull
    @Override
    public View getView(int position, @Nullable View convertView, @NonNull ViewGroup parent)
    {
        View view=LayoutInflater.from(parent.getContext()).inflate(R.layout.custom_list_item,null,true);

        TextView tvTripNo=view.findViewById(R.id.tvTripNo);
        TextView tvBookNo=view.findViewById(R.id.tvBookNo);
        TextView tvDestination=view.findViewById(R.id.tvDestination);
        TextView tvVehiclePlate=view.findViewById(R.id.tvVehiclePlate);
        TextView tvDateIn=view.findViewById(R.id.tvDateIn);
        TextView tvDateOut=view.findViewById(R.id.tvDateOut);
        TextView tvTimeIn=view.findViewById(R.id.tvTimeIn);
        TextView tvTimeOut=view.findViewById(R.id.tvTimeOut);


        tvTripNo.setText(arrayListTrip.get(position).getTrip_no());
        tvBookNo.setText(arrayListTrip.get(position).getBook_no());
        tvDestination.setText(arrayListTrip.get(position).getDestination());
        tvVehiclePlate.setText(arrayListTrip.get(position).getVehicle_plate());
        tvDateIn.setText(arrayListTrip.get(position).getDate_in());
        tvDateOut.setText(arrayListTrip.get(position).getDate_out());
        tvTimeIn.setText(arrayListTrip.get(position).getTime_in());
        tvTimeOut.setText(arrayListTrip.get(position).getTime_out());


        return view;

    }
}

