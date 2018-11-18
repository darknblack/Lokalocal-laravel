<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MobileUsers;
use App\Transactions;
use App\Products;
use App\User;
use Auth;

class MobileController extends Controller {

	public function get_products(Request $request) {
		$prod = Products::all();
		return response()->json([
			'products' => $prod
		]);
	}

	public function get_usertransaction(Request $request) {
		$user_id = $request->user_id;
		$transac = Transactions::where("mobile_user_id", $user_id)->get();

		$data = [];
		foreach($transac as $e) {
			$prod = Products::where("id", $e['product_id'])->first();


			$data[] = [
				"id" => $e['id'],
				"prod_name" => $prod->title,
				"timestamp" => $e['created_at'],
				"price" => $e['product_price'],
			];
		}

		return response()->json([
			"user_id" => $user_id,
			"transaction" => $data
		]);
	}

	public function get_userinfo(Request $request) {
		$user_id = $request->user_id;
		$user = MobileUsers::where("id", $user_id)->first();

		return response()->json([
			"user" => $user
		]);
	}

	public function claim(Request $request) {
		$prod_id = $request->prod_id;
		$user_id = $request->user_id;

		$prod = Products::where("id", $prod_id)->first();
		$user = MobileUsers::where("id", $user_id)->first();

		$prod_price = (float) $prod->discountedprice;
		$user_balance = (float) $user->balance;

		$new_balance = $user_balance - $prod_price;

		$user->balance = $new_balance;
		$user->save();

		$vendor = $prod->vendor;
		$seller = User::where("company", $vendor)->first();
		$seller->credits = $seller->credits + $prod_price;
		$seller->save();

		$transac = new Transactions;
		$transac->mobile_user_id = $user_id;
		$transac->product_id = $prod_id;
		$transac->product_price = $prod_price;
		$transac->mobile_user_new_balance = $new_balance;
		$transac->save();

		$transaction_time = now();

		return response()->json([
			'status' => "success",
			'new_balance' => $new_balance,
			'time' => $transaction_time
		]);
	}

	public function redeem(Request $request) {
		$prod_id = $request->prod_id;
		$user_id = $request->user_id;

		$prod = Products::where("id", $prod_id)->first();
		$user = MobileUsers::where("id", $user_id)->first();

		$prod_price = (float) $prod->discountedprice;
		$user_balance = (float) $user->bal;

		$possible_for_claiming = $prod_price >= $user_balance;

		return response()->json([
			'prod_id' => $prod_id,
			'product' => $prod,
			'user' => $user,
			'possible_for_claiming' => $possible_for_claiming,
		]);
	}

    public function register(Request $request) {
    	$name = $request->name;
    	$contact = $request->contact;
    	$email = $request->email;
    	$password = $request->password;

    	$mob = new MobileUsers;
    	$mob->name = $name;
    	$mob->contact = $contact;
    	$mob->email = $email;
    	$mob->balance = 1000;
    	$mob->password = $password;
    	$mob->save();

        return response()->json([
		    'name' => $name,
		    'contact' => $contact,
		    'email' => $email,
		    'password' => $password,
		]);
    }
}
