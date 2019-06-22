package com.example.android.mutiarabaru;


import android.content.Intent;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;


/**
 * A simple {@link Fragment} subclass.
 */
public class Logout extends Fragment {

	private SessionHandler session;

    public Logout() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
		session = new SessionHandler(getContext());
		User user = session.getUserDetails();
		session.logoutUser();
		Intent intent = new Intent(getContext(),LoginActivity.class);
		startActivity(intent);
		getActivity().finish();
        return inflater.inflate(R.layout.fragment_logout, container, false);
    }

}
