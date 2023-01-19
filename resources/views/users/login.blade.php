<x-layout>
    <div class="login-area  pt-80 pb-80">
        <div class="container">
            
    
                <div class="row">
                    <div class="col-lg-6">
                        <form action="/users/authenticate" method="POST">
                            @csrf

                            <div class="customer-login text-left">
                                <h4 class="title-1 title-border text-uppercase mb-30">Registered customers</h4>
                                <p class="text-gray">If you have an account with us, Please login!</p>
                                
                                <input type="text" placeholder="Email here..." name="email" value="{{old('email')}}">
                                @error('email')
                                <p style="color:red"  class="text-xs mt-1">{{$message}}<p>
                                @enderror

                                <input type="password" placeholder="Password" name="password" value="{{old('password')}}">
                                @error('password')
                                <p style="color:red" class="text-xs mt-1">{{$message}}<p>
                                @enderror

                                <button type="submit" data-text="login" class="button-one submit-button mt-15">login</button>
                            </div>
                    </form>					
                    </div>
                    
                    <div class="col-lg-6">
                        <form action="/register" method="POST">
                            @csrf
                        
                        @if(Session::has('is_created'))
                        <div class="thank-recieve bg-white mb-30">
                            <p>User account created successfully.</p>
                        </div>
                        @endif
                            
                        <div class="customer-login text-left">
                            <h4 class="title-1 title-border text-uppercase mb-30">new customers</h4>
                            <p class="text-gray">If you have an account with us, Please login!</p>
                            <input type="text" placeholder="Your name here..." name="user_name" value="{{old('name')}}">
                            @error('user_name')
                            <p style="color:red"  class="text-xs mt-1">{{$message}}<p>
                            @enderror
                            
                            <input type="text" placeholder="Email address here..." name="user_email" value="{{old('email')}}">
                            @error('user_email')
                            <p style="color:red"  class="text-red-500 text-xs mt-1">{{$message}}<p>
                            @enderror
                            
                            <input type="password" placeholder="Password" name="user_password">
                            @error('user_password')
                            <p style="color:red"  class="text-red-500 text-xs mt-1">{{$message}}<p>
                            @enderror

                            <input type="password" placeholder="Confirm password" name="password_confirmation">
                            @error('password_confirmation')
                            <p style="color:red"  class="text-red-500 text-xs mt-1">{{$message}}<p>
                            @enderror

                            <button type="submit" data-text="regiter" class="button-one submit-button mt-15">regiter</button>
                        </div>	
                       </form>
                				
                    </div>
                </div>
            
        </div>
    </div>
</x-layout>