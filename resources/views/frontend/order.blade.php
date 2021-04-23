@extends('frontend.layout')
@section('body')
    <section>
        <div class="container mt-5">
            <div class="row mt-5">
                <h1 class="text-center p-5">Complete Order</h1>
                @if(!$cart)
                    <p class="text-center">No products added to cart!</p>
                @else
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart as $cart_product)
                            <tr>
                                <td>{{$cart_product->product->title}}</td>
                                <td>{{$cart_product->product->price}}</td>
                                <td>{{$cart_product->quantity}}</td>
                                <td>{{$cart_product->price}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td class="text-center" colspan="4">TOTAL = ${{$total}}</td>
                        </tr>
                        </tfoot>
                    </table>
                    <div class="form-group row">
                        <label for="coupon_code" class="col-sm-1 col-form-label">Coupon :</label>
                        <div class="col-sm-2">
                          <input type="text" form="checkout-form" class="form-control" id="coupon_code" name="coupon_code" placeholder="Code">
                        </div>
                    </div>
                @endif
                <h4 class="mt-5">Enter your delivery address:</h4>
                <form id="checkout-form" action="/checkout" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="delivery_address">Street Address</label>
                        <input type="text" id="delivery_address" name="delivery_address" class="form-control" >
                        <small class="text-left text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" class="form-control" >
                        <small class="text-left text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="state">State</label>
                        <input type="text" id="state" name="state" class="form-control" >
                        <small class="text-left text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="zip">ZIP</label>
                        <input type="text" id="zip" name="zip" class="form-control" >
                        <small class="text-left text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" id="country" name="country" class="form-control" >
                        <small class="text-left text-danger"></small>
                    </div>
                    <h4>Enter Student ID for discount (Optional)</h4>
                    <div class="form-group">
                        <label for="student_id">Student ID</label>
                        <input type="text" id="student_id" name="student_id" class="form-control">
                    </div>
                    <hr>
                    <div class="form-group">
                        <button id="submit-btn" type="button" class="btn" style="background: #009970; color: white; border-radius: 20px; padding: 8px 25px; margin-right:20px; font-size: 13px;">Complete Order</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @include('frontend.components.footer')
@endsection

@section('script')
    <script>
        document.querySelector("#submit-btn").addEventListener('click',(element)=>{
            element.preventDefault();
            console.log('first');

            let delivery_address = document.querySelector("#delivery_address");
            let city = document.querySelector("#city");
            let state = document.querySelector("#state");
            let zip = document.querySelector("#zip");
            let country = document.querySelector("#country");

            if (delivery_address.value!='' && city.value!='' && state.value!='' && zip.value!='' && country.value!='') {
                document.querySelector("#checkout-form").submit();
            }
            else{

                // validate input fields
                if (delivery_address.value==''){
                    delivery_address.style.border = '1px solid red';
                    delivery_address.nextElementSibling.innerHTML = '* Street Address Is Required';
                    
                }
                else{
                    delivery_address.style.border = '1px solid #ced4da';
                    delivery_address.nextElementSibling.innerHTML = '';
                }
                if (city.value==''){
                    city.style.border = '1px solid red';
                    city.nextElementSibling.innerHTML = '* city Is Required';
                }
                else{
                    city.style.border = '1px solid #ced4da';
                    city.nextElementSibling.innerHTML = '';
                }
                if (state.value==''){
                    state.style.border = '1px solid red';
                    state.nextElementSibling.innerHTML = '* state Is Required';
                }
                else{
                    state.style.border = '1px solid #ced4da';
                    state.nextElementSibling.innerHTML = '';
                }
                if (zip.value==''){
                    zip.style.border = '1px solid red';
                    zip.nextElementSibling.innerHTML = '* zip Is Required';
                }
                else{
                    zip.style.border = '1px solid #ced4da';
                    zip.nextElementSibling.innerHTML = '';
                }
                if (country.value==''){
                    country.style.border = '1px solid red';
                    country.nextElementSibling.innerHTML = '* country Is Required';
                }
                else{
                    country.style.border = '1px solid #ced4da';
                    country.nextElementSibling.innerHTML = '';
                }
            }

        })
    </script>
@endsection
