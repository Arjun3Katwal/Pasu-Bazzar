@extends('frontend.main')
@section('content')
		
		<div class="wrapper">
			<div class="row">
				<form method="get">
					<div class="col-7 col">
						<h3 class="topborder"><span>Billing Details</span></h3>
						<div class="width50 padright">
							<label for="fname">Your Name</label>
							<input type="text" name="fname" id="fname" required>
						</div>
						<div class="width50">
                        <label for="address">Address</label>
						<input type="text" name="address" id="address" required>
						</div>
						
						<label for="city">Town / City</label>
						<input type="text" name="city" id="city" required>
						<div class="width50 padright">
							<label for="province">Province</label>
							<select name="province" id="province" required>
								<option value="">Please select a province</option>
								<option value="ab">	Province No. 1</option>
								<option value="bc">	Province No. 2</option>
								<option value="mb">	Province No. 3</option>
								<option value="nb">	Province No. 4</option>
								<option value="nl">	Province No. 5</option>
								<option value="ns">	Province No. 6</option>
								<option value="on">	Province No. 7</option>
							</select>
						</div>
						<div class="width50">
							<label for="postcode">Postcode</label>
							<input type="text" name="postcode" id="postcode" required>
						</div>
						<div class="width50 padright">
							<label for="email">Email Address</label>
							<input type="text" name="email" id="email" required>
						</div>
						<div class="width50 padright">
							<label for="tel">Phone</label>
							<input type="text" name="tel" id="tel" required>
						</div>
					</div>
					<div class="col-5 col order">

						<div>
							<h3 class="topborder"><span>Payment Method</span></h3>
							<button  id="payment-button" class="btn btn-danger mb-5">Khalti Payment</button>
							<p class="padleft">
								Make your payment directly into our Khalti Payment.
							</p>
						</div>

						<div><input type="radio" value="cheque" name="payment"><p>Cash in Delivery.</p></div>
						
						<input type="submit" name="submit" value="Place Order" class="redbutton">
					</div>
				</form>
			</div>
		</div>

		<script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_f5acd81280cd406db21fbe279f1f4db4",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
                ],
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    $.ajax({
                            type : 'POST',
                            url : "{{ route('khalti.verifyPayment') }}",
                            data: {
                                token : payload.token,            
                                amount : payload.amount,
                                "_token" : "{{ csrf_token() }}"
                            },
                            success : function(res){
								alert('transaction successfull');
                                console.log(res);
                            }
                        });
                        
                    console.log(payload);
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({amount: 1000 });
        }
    </script>

@endsection