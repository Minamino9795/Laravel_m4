<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use PSpell\Dictionary;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', function () {
    
    return view('bai1.login');
});



Route::post('/login', function (Request $request) {
$username=$request->username;
$password=$request->password;
if ($username =='admin'
&& $password == 'admin123'){
    return view( 'bai1.welcome');
}
    return view('bai1.login_error');

});

// Route bài 2
Route::get('/calculator', function () {
    
    return view('bai2.calculator');
});
Route::post('/calculator',function(Request $request){
$description=$request->description;
$price=$request->price;
$percent=$request->percent;
$amount=$price*$percent*0.1;
return view('bai2.show',compact(['amount', 'description', 'price', 'percent']));

});

// Route bài 3
Route::get('/dictionary', function () {
    
    return view('bai3.dictionary');
});
Route::post('/dictionary',function(Request $request){
    $dictionary = array(
        "apple" => "quả táo",
        "banana" => "quả chuối",
        "cat" => "con mèo",
        "dog" => "con chó"
    );
    
    $inputText = $request->text;
    foreach ($dictionary as $english => $vietnamese) {
        if ($english == $inputText) {
            return view('bai3.show', compact('vietnamese'));
            break;
        }
        if ($vietnamese == $inputText) {
            echo "Từ bạn tìm kiếm có nghĩa tiếng Anh là " . '"' . $english . '"';
         
            break; 
        }
       
    }
   
    if ($english !== $inputText && $vietnamese !== $inputText ){
        echo "Từ bạn tìm kiếm không có trong từ điển, hãy cập nhật tôi để thêm từ này vào ";
    }
});


