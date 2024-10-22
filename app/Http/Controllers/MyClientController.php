<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redis;

use App\Models\MyClient;

class MyClientController extends Controller
{
    public function index(){
        $data = MyClient::get();

        $response = array(
            'data' => $data
        );

        return response()->json($response);
    }

    public function create(Request $request){
        $input = $request->all();
        $create = MyClient::create($input);

        Storage::disk('s3')->put('avatars/1', $create->client_logo);
        Redis::set($create->slug, $create);

        $response = array(
            'data' => $create
        );

        return response()->json($response);
    }

    public function update(Request $request){
        $id = $request->id;
        $input = $request->except('id');
        $old_slug = MyClient::where('id', $id)->first()->old_slug;
        $update = MyClient::where('id', $id)->update($input);

        $data = MyClient::find($id);
        Redis::del($old_slug);
        Redis::set($data->slug, $data);

        $response = array(
            'data' => $update
        );

        return response()->json($response);
    }

    public function delete(Request $request){
        $id = $request->id;
        $old_slug = MyClient::where('id', $id)->first()->old_slug;
        $delete = MyClient::where('id',$id)->delete();

        Redis::del($old_slug);

        $response = array(
            'data' => $delete
        );

        return response()->json($response);
    }
}
