package my.edu.utem.ftmk.evehicleversion40;

public class Trip
{
    private String book_no, trip_no,date_out, date_in,time_in, time_out, destination, vehicle_plate;

    public Trip()
    {

    }

    public Trip(String book_no, String trip_no, String date_out, String date_in,String time_in, String time_out, String destination, String vehicle_plate)
    {

        this.book_no = book_no;
        this.trip_no=trip_no;
        this.date_in = date_in;
        this.date_out = date_out;
        this.time_in = time_in;
        this.time_out = time_out;
        this.destination = destination;
        this.vehicle_plate=vehicle_plate;
    }



    public String getBook_no() {
        return book_no;
    }

    public void setBook_no(String book_no) {
        this.book_no = book_no;
    }

    public String getTrip_no() {
        return trip_no;
    }

    public void setTrip_no(String trip_no) {
        this.trip_no = trip_no;
    }

    public String getDate_in() {
        return date_in;
    }

    public void setDate_in(String date_in) {
        this.date_in = date_in;
    }

    public String getDate_out() {
        return date_out;
    }

    public void setDate_out(String date_out) {
        this.date_out = date_out;
    }

    public String getTime_in() {
        return time_in;
    }

    public void setTime_in(String time_in) {
        this.time_in = time_in;
    }

    public String getTime_out() {
        return time_out;
    }

    public void setTime_out(String time_out) {
        this.time_in = time_out;
    }

    public String getDestination() {
        return destination;
    }

    public void setDestination(String destination) {
        this.destination = destination;
    }

    public String getVehicle_plate() {
        return vehicle_plate;
    }

    public void setVehicle_plate(String vehicle_plate) {
        this.vehicle_plate= vehicle_plate;
    }
}
/*public class Trip
{
    String date_u, destination_u;

    public String getDate_u() {
        return date_u;
    }

    public String getDestination_u() {
        return destination_u;
    }
}*/
