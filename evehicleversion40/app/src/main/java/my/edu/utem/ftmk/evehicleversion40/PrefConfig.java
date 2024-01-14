package my.edu.utem.ftmk.evehicleversion40;

import android.content.Context;
import android.content.SharedPreferences;
import android.preference.PreferenceManager;

import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import java.lang.reflect.Type;
import java.util.ArrayList;

public class PrefConfig {

    private static final String LIST_KEY = "list_key100";

    public static void writeListInPref(Context context, ArrayList<Trip> tripArrayList) {
        Gson gson = new Gson();
        String jsonString = gson.toJson(tripArrayList);

        SharedPreferences pref = PreferenceManager.getDefaultSharedPreferences(context);
        SharedPreferences.Editor editor = pref.edit();
        editor.putString(LIST_KEY, jsonString);
        editor.apply();
    }

    public static ArrayList<Trip> readListFromPref(Context context) {
        SharedPreferences pref = PreferenceManager.getDefaultSharedPreferences(context);
        String jsonString = pref.getString(LIST_KEY, "");

        Gson gson = new Gson();
        Type type = new TypeToken<ArrayList<Trip>>() {}.getType();
        ArrayList<Trip> list = gson.fromJson(jsonString, type);
        return list;
    }

}
