<style>
    *{
     margin:0;
     padding: 0;
     box-sizing: border-box;
     font-family: 'Roboto', sans-serif;
 }
 section{
     position: relative;
     width: 100%;
     height: 100vh;
     display: flex;
 }
 section .img-bg{
     position: relative;
     width: 50%;
     height: 100%;
 }
 section .img-bg img{
     position: absolute;
     top: 0;
     left: 0;
     width: 100%;
     height: 100%;
     object-fit: cover;
 }
 section .noi-dung{
     display: flex;
     justify-content: center;
     align-items: center;
     width: 50%;
     height: 100%;
 }
 section .noi-dung .form{
     width: 50%;
 }
 section .noi-dung .form h2{
     color: #607D8B;
     font-weight: 500;
     font-size: 1.5em;
     text-transform: uppercase;
     margin-bottom: 20px;
     border-bottom: 4px solid #6694E9;
     display: inline-block;
     letter-spacing: 1px;
 }
 section .noi-dung .form .input-form{
      margin-bottom: 20px;
  }
 section .noi-dung .form .input-form span{
      font-size: 16px;
      margin-bottom: 5px;
      display: inline-block;
      color: #607DB8;
      letter-spacing: 1px;
       }
 section .noi-dung .form .input-form input{
      width: 100%;
      padding: 10px 20px;
      outline: none;
      border: 1px solid #607D8B;
      font-size: 16px;
      letter-spacing: 1px;
      color: #607D8B;
      background: transparent;
      border-radius: 30px;
      }
  section .noi-dung .form .input-form input[type="submit"]{
      background: #6694E9;
      color: #fff;
      outline: none;
      border: none;
      font-weight: 500;
      cursor: pointer;
      box-shadow: 0 1px 1px rgba(0,0,0,0.12),
                 0 2px 2px rgba(0,0,0,0.12),
                 0 4px 4px rgba(0,0,0,0.12),
                0 8px 8px rgba(0,0,0,0.12),
                0 16px 16px rgba(0,0,0,0.12);
  }
 section .noi-dung .form .input-form input[type="submit"]:hover{
      background: #6694E9;
  }
  section .noi-dung .form .nho-dang-nhap{
      margin-bottom: 10px;
      color: #607D8B;
      font-size: 14px;
  }
  section .noi-dung .form .input-form p{
      color: #607D8B;
  }
 section .noi-dung .form .input-form p a{
      color: #FFB3B3;
  }
 section .noi-dung .form h3{
      color: #607D8B;
      text-align: center;
      margin: 80px 0 10px;
      font-weight: 500;
  }
 section .noi-dung .form .icon-dang-nhap{
      display: flex;
      justify-content: center;
      align-items: center;
  }
 section .noi-dung .form .icon-dang-nhap li{
      list-style: none;
      cursor: pointer;
      width: 50px;
      height: 50px;
      display: flex;
      justify-content: center;
      align-items: center;
  }
  section .noi-dung .form .icon-dang-nhap li:nth-child(1){
      color: #3B5999;
  }
  section .noi-dung .form .icon-dang-nhap li:nth-child(2){
      color: #DD4B39;
  }
  section .noi-dung .form .icon-dang-nhap li:nth-child(3){
      color: #55ACEE;
  }
  section .noi-dung .form .icon-dang-nhap li i{
      font-size: 24px;
  }
 @media (max-width: 768px){
     section .img-bg{
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
     }
     section .noi-dung{
         display: flex;
         justify-content: center;
         align-items: center;
         width: 100%;
         height: 100%;
         z-index: 1;
     }
     section .noi-dung .form{
         width: 100%;
         padding: 40px;
         background: rgba(255 255 255 / 0.9);
         margin: 50px;
     }
     section .noi-dung .form h3{
         color: #607D8B;
         text-align: center;
         margin: 30px 0 10px;
         font-weight: 500;
     }
 }
 </style>
 <section>
     <!--Bắt Đầu Phần Hình Ảnh-->
     <div class="img-bg">
         <img src="https://media.istockphoto.com/id/1299730469/vi/anh/n%C3%BAt-x%C3%A1c-th%E1%BB%B1c-sinh-tr%E1%BA%AFc-h%E1%BB%8Dc-v%C3%A2n-tay-kh%C3%A1i-ni%E1%BB%87m-b%E1%BA%A3o-m%E1%BA%ADt-k%E1%BB%B9-thu%E1%BA%ADt-s%E1%BB%91.jpg?b=1&s=612x612&w=0&k=20&c=_ckOoAP0jhq7DXZ6pfyheHYmuDaObYqr8Hw_9D6Huxo=" alt="Hình Ảnh Minh Họa">
     </div>
     <!--Kết Thúc Phần Hình Ảnh-->
     <!--Bắt Đầu Phần Nội Dung-->
     <div class="noi-dung">
         <div class="form">
             <h2>Trang Đăng Nhập</h2>
             <form action="{{ route('postlogin') }}" method="POST" >
                @csrf
                 <div class="input-form">
                     <span>Email</span>
                     <input type="text" name="email">
                     @if ($errors->any())
                     <p style="color:red">{{ $errors->first('email') }}</p>
                 @endif
                 </div>
                 <div class="input-form">
                     <span>Password</span>
                     <input type="password" name="password">
                     @if ($errors->any())
                     <p style="color:red">{{ $errors->first('password') }}</p>
                 @endif
                 </div>
                 <div class="nho-dang-nhap">
                     <label><input type="checkbox" name=""> Nhớ Đăng Nhập</label>
                     <a href="">Quên Mật Khẩu</a>
                 </div>
                 <div class="input-form">
                     <input type="submit" value="Đăng Nhập">
                 </div>
             </form>
         </div>
     </div>
     <!--Kết Thúc Phần Nội Dung-->
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script>
    @php
    if(Session::has('okmail')){
    @endphp
    Swal.fire({
         icon: 'success',
         title: 'Lấy mật khẩu thành công!',
         text: "Bạn chưa nhận được Email? Liên hệ SuperAdmin để xin cấp lại mật khẩu nhé!!! LH:0376301480 Email: tpnshop247@gmail.com",
         showClass: {
         popup: 'swal2-show'
             }
         })
     @php
    }
     @endphp
     </script>
 </section>