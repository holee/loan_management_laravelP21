<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::view('/home', 'home');


Route::get('/', function () {

    $name = "Phanun";
    $gender = "Male";
    $marks = [1, 2, 3, 4, 5, 6, 7, 8, 9];
    return view('welcome', compact('name', 'gender', 'marks'));
    // return view('welcome', [
    //     'name' => $name,
    //     'gender' => $gender,
    //     'marks' => $marks
    // ]);
});

Route::prefix('category')->group(function () {

    Route::get("/", function () {
        $cats = DB::table('categories')->get();

        //return $cats;
        return view('categories.index', compact('cats'));
    })->name('category.index');


    Route::get("create", function () {
        return view("categories.create");
    })->name('category.create');


    Route::post("/", function (Request $req) {

        $data = $req->only(['name', 'description']);
        $created = DB::table("categories")->insert($data);
        if ($created) {
            return redirect("/category");
        }
        return back();
    });

    //Get Data for edit
    Route::get("{id}/edit", function ($id) {
        $cat = DB::table('categories')->where("id", $id)->first();
        if ($cat)
            return view('categories.edit', compact('cat'));
        else
            return abort(404);
    })->whereNumber('id')
        ->name('category.edit');
    //send data to server when post
    Route::put("{id}/edit", function (Request $req, $id) {
        $data = $req->except(['_token', '_method']);
        $updated = DB::table("categories")->where("id", $id)->update($data);
        if ($updated) {
            return to_route('category.index');
            //return redirect()->route('category.index');
        }
        return back();
        //return redirect()->back();
        // return back()->withInput(['name' => $req->name]);
    });


    Route::delete("delete/{id}", function ($id) {

        $deleted = DB::table("categories")->where("id", $id)->delete();
        if ($deleted) {
            return redirect("/category");
        }
        return back();
    });
});

Route::prefix('employee')->group(function () {
    Route::controller(EmployeeController::class)->group(function () {
        Route::get('/', 'index')->name('employee.index');
        Route::get('{id}/edit', 'edit')->name('employee.edit')
            ->whereNumber('id');
        Route::put('{id}', 'update')->name('employee.update')
            ->whereNumber('id');
    });
});










Route::get("customer", function () {
    echo "this is customer page.";
});
Route::get("customer/create", function () {
    echo "this is customer create page.";
});
Route::post("customer", function () {
    echo "this is customer page.";
});
Route::get("customer/{id}/edit", function ($id) {
    echo "this is customer edit page with" . $id;
});
Route::put("customer/{id}", function ($id) {
    echo "this is customer page.";
});
