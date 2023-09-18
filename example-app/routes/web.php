<?php

use App\Http\Controllers\CreateController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use App\Http\Controllers\UserController;

// use PSpell\Dictionary;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route bài 1
Route::get('/login', function () {

    return view('bai1.login');
});

// Route::post('/login', function (Request $request) {
//     $username = $request->username;
//     $password = $request->password;
//     if (
//         $username == 'admin'
//         && $password == 'admin123'
//     ) {
//         return view('bai1.welcome');
//     }
//     return view('bai1.login_error');
// });

// // Route bài 2
// Route::get('/calculator', function () {

//     return view('bai2.calculator');
// });
// Route::post('/calculator', function (Request $request) {
//     $description = $request->description;
//     $price = $request->price;
//     $percent = $request->percent;
//     $amount = $price * $percent * 0.1;
//     return view('bai2.show', compact(['amount', 'description', 'price', 'percent']));
// });

// // Route bài 3
// Route::get('/dictionary', function () {

//     return view('bai3.dictionary');
// });
// Route::post('/dictionary', function (Request $request) {
//     $dictionary = array(
//         "apple" => "quả táo",
//         "banana" => "quả chuối",
//         "cat" => "con mèo",
//         "dog" => "con chó"
//     );

//     $inputText = $request->text;
//     foreach ($dictionary as $english => $vietnamese) {
//         if ($english == $inputText) {
//             return view('bai3.show', compact('vietnamese'));
//             break;
//         }
//         if ($vietnamese == $inputText) {
//             echo "Từ bạn tìm kiếm có nghĩa tiếng Anh là " . '"' . $english . '"';

//             break;
//         }
//     }

//     if ($english !== $inputText && $vietnamese !== $inputText) {
//         echo "Từ bạn tìm kiếm không có trong từ điển, hãy cập nhật tôi để thêm từ này vào ";
//     }
// });


// // Router bài routing- thực hành xem giờ time_zone
// Route::get('/time', function () {
//     return view('routing_timezone.index');
// });
// Route::post('/time', function (Request $request) {
//     if (isset($request->location)) {
//         $location = $request->location;
//         $todayDate = Carbon::now($location)->format('Y-m-d h:i:s');
//         echo "thời gian hiện tại của $location : " . $todayDate;
//     }
// });


// // truyền tham số bắt buộc
// // Route::get('/users/{id}/post/{postId}',function($id,$postId){
// // echo 'user id '.$id*$postId;
// // });
// // Route::get('/users/{id?}/post/{postId?}',function($id=null,$postId=null){
// // if(isset($id,$postId)){
// //     $result= $id + $postId;
// //     echo $result;

// // }
// // if($id==null||$postId==null){
// //     echo "khog ton tai";
// // }

// // });


// //Route Task Management
// Route::prefix('tasks')->group( function(){
// Route::get('/', function(){
// return view('Manager.index');
// });

// Route::get('/user', [CreateController::class, 'getCreate'])->name('user');
// // Route::get('/user/store', [CreateController::class, 'getCreate'])->name('user.store');
// });





// // Route liệt kê
// Route::get('/user',[UserController::class,'index'])->name('user.index');
// //Route thêm mới
// Route::get('/user/create',[UserController::class,'create'])->name('user.create');
// Route::post('/user/create',[UserController::class,'store'])->name('user.store');
// Route::put('/user/{id}',[UserController::class,'update'])->name('user.update');

// //Ruote sửa
// Route::get('/user/edit/{id}',[UserController::class,'edit'])->name('user.edit');
// // xoa dữ liệu
// Route::delete('user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
// Route::get('user/show/{id}', [UserController::class, 'show'])->name('user.show');

Route::get('/restricted', function () {
    return 'bạn đã đủ 18 tuổi dể vào trang web này';
})->middleware('checkage1');

Route::get('/', function () {
    return 'bạn không đủ tuổi để vào';
});

Route::get('/restricted', function () {
    return 'chào mừng bạn đến với trang web';
})->middleware('checkemail');
Route::get('/', function () {
    return 'email không đúng định dạng';
});

Route::get('/restricted', function () {
    return 'chào mừng bạn đến với trang web';
})->middleware('checknumber');
Route::get('/', function () {
    return 'chương trình lỗi';
});
