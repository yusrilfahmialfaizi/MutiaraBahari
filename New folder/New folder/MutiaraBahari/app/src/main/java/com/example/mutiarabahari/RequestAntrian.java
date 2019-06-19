package com.example.mutiarabahari;

import android.content.Context;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.toolbox.Volley;

public class RequestAntrian {
    private static RequestAntrian mInstance;
    private RequestQueue mRequestQueue;
    private static Context mCtx;;

    private RequestAntrian (Context context)
    {
        mCtx = context;
        mRequestQueue = getRequestQueue();
    }

    public static synchronized RequestAntrian getInstance(Context context)
    {
        if (mInstance == null)
        {
            mInstance =new RequestAntrian(context);
        }
        return mInstance;
    }

    private RequestQueue getRequestQueue()
    {
        if(mRequestQueue == null)
        {
            mRequestQueue = Volley.newRequestQueue(mCtx.getApplicationContext());
        }
        return  mRequestQueue;
    }

    public <T> void addToRequestQueue(Request<T> req)
    {
        getRequestQueue().add(req);
    }

}
