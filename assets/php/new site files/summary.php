<script type="text/javascript">

jQuery(document).ready(function ($) {
	var vehicle_price = $('#vehicle-price');
	var main_fees = $('.fees-main');
	var down_payment = $('.down-payment');
	var total_finance_amount = $('.total-finance-amount');
	var output_info  = $('.output-info');
	var monthly_small = $('.monthly_small');
	var apr_value_small = $('.apr_value_small');
	var apr_value_big = $('.apr_value_big');
	var monthly_big = $('.monthly_big');

	var price;
	var true_price;
	var sales_tax;
	var all_fees;
	var true_down_payment = 0;
	var term;
	var apr_small;
	var apr_big;
	var true_finance_amount;

	function setRegularPrice() {
		price = $('.single-regular-price .h3').text();
		$(vehicle_price).text(price);

		console.log("The regular price of this vehicle is : " + price );

		return price;
	}

	function calculatePrice() {
		var price_calc = price.replace("$", "");

		price_calc = price_calc.replace("*", "");

		price_calc = price_calc.replace(",", "");

		price_calc = parseInt(price_calc);

		true_price = price_calc;

		return true_price;
	}

function calculateFees() {
		var registration_fee;
		var license_fee = 21;
		var state_emission_fee = 8.25;
		var smog_test_fee = 50;
		var processing_fee = 65;
		var true_price = calculatePrice();

console.log('the current listed price is: ' + true_price);

		var sales_tax = ( ( true_price + processing_fee + smog_test_fee ) * .095 );
console.log('sales tax is: ' + sales_tax );

		var total_fees = ( sales_tax  + processing_fee + smog_test_fee + license_fee + state_emission_fee );

console.log('total fees are: ' + total_fees );

		all_fees = total_fees;
		console.log("The total calculated fees are: " + all_fees );

		return all_fees;
	}

	function setEstimatedFees() {
		all_fees = parseFloat(all_fees).toPrecision(6);
		$(main_fees).text(all_fees);

		// console.log("The total calulated fees have been set to : " + $(main_fees).text() );

		return main_fees;
	}

	function setDownPayment() {

		$.fn.digits = function(){ 
		    return this.each(function(){ 
		        $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
		    })
		}
			var field = $('#input_4_3');
		      $(field).keyup( function() {
		      	$(down_payment).text(function( ) {
				  return "$" + ( $(field).val() );
				});


		      	true_down_payment = $(down_payment).text();
		      	calculateDownPayment( true_down_payment );
		      	calculateTotalFinance();
		      	$(down_payment).digits();

		});

		    return true_down_payment;
	}

function calculateDownPayment( payment ) {
		payment = payment.replace("$", "");

		payment = payment.replace(",", "");

		payment = parseInt(payment);

        true_down_payment = payment;

		// console.log("The total calulated down payment has been set to: " + true_down_payment );

		return true_down_payment;
	}


	function calculateTotalFinance() {
		if ( isNaN(true_down_payment) ) {
			true_down_payment = 0;
			console.log('true down payment not set');

		} else {
			var finance_amount = ( ( parseFloat(true_price) + parseFloat(all_fees) ) - parseFloat(true_down_payment) );
			total_finance_amount.text(function( ) {
					  return "$" + ( finance_amount );
					});

			true_finance_amount = parseFloat(finance_amount);
			return true_finance_amount;
		}

		return true_down_payment;
	}

	function calculateTerm() {

	var month_term = $('#field_4_4 select').val();
	parseFloat(month_term);

	$('#gform_4').find('#field_4_4 select').on('change', function(){
	    month_term = this.value;
	    parseFloat(month_term);

	    calculateMonthlyPaymentSmall(month_term, apr_small);
	    calculateMonthlyPaymentBig(month_term, apr_big);
	});


	term = month_term;
	return term;
}


function calculateAprSmall() {
	var str;
	var apr_value1;

	var str = $('#field_4_2 select').val();

	  if  ( str.indexOf("Excellent") >= 0 ) {
	    	apr_value1 = 2.95;
	    	
		} 

		else if ( (str.indexOf("Very") >= 0) ) {
	    	apr_value1 = 3.2;
	    	
		}

		else if ( (str.indexOf("Good") >= 0) ) {
	    	apr_value1 = 5;
	    	
		}

		else if ( (str.indexOf("Fair") >= 0) ) {
	    	apr_value1 = 8;
	    	
		}

		else if ( (str.indexOf("Challenged") >= 0) ) {
	    	apr_value1 = 15;
	    	
		}
	

	$('#gform_4').find('#field_4_2 select').on('change', function(){
	    str = this.value;


	    if  ( str.indexOf("Excellent") >= 0 ) {
	    	apr_value1 = 2.95;
	    		    	apr_small = apr_value1;
			$(apr_value_small).text(apr_small);
			calculateMonthlyPaymentSmall(term, apr_small);
				
	    	
		} 

		else if ( (str.indexOf("Very") >= 0) ) {
	    	apr_value1 = 3.2;
	    	apr_small = apr_value1;
			$(apr_value_small).text(apr_small);
			calculateMonthlyPaymentSmall(term, apr_small);
	    	
	    	
		}

		else if ( (str.indexOf("Good") >= 0) ) {
	    	apr_value1 = 5;
	    	apr_small = apr_value1;
			$(apr_value_small).text(apr_small);
			calculateMonthlyPaymentSmall(term, apr_small);
			
	    	
		}

		else if ( (str.indexOf("Fair") >= 0) ) {
	    	apr_value1 = 8;
	    	apr_small = apr_value1;
			$(apr_value_small).text(apr_small);
			calculateMonthlyPaymentSmall(term, apr_small);
			
	    	
		}

		else if ( (str.indexOf("Challenged") >= 0) ) {
	    	apr_value1 = 15;
	    	apr_small = apr_value1;
			$(apr_value_small).text(apr_small);
			calculateMonthlyPaymentSmall(term, apr_small);
	    	
		}

	});

	
	apr_value1 = parseFloat(apr_value1);
	apr_small = apr_value1;

	

	$(apr_value_small).text(apr_small);
	return apr_small;

}

function calculateAprBig() {
	var str;
	var apr_value2;

	var str = $('#field_4_2 select').val();

	    if ( (str.indexOf("Excellent") >= 0) ) {
	    		
	    	apr_value2 = 4.5;
		} 

		else if ( (str.indexOf("Very") >= 0) ) {
	
	    	apr_value2 = 6.5;
		}

		else if ( (str.indexOf("Good") >= 0) ) {
	
	    	apr_value2 = 8.5;
		}

		else if ( (str.indexOf("Fair") >= 0) ) {
	
	    	apr_value2 = 15;
		}

		else if ( (str.indexOf("Challenged") >= 0) ) {
	
	    	apr_value2 = 25;
		}

	$('#gform_4').find('#field_4_2 select').on('change', function(){
	    str = this.value;

	    if ( (str.indexOf("Excellent") >= 0) ) {
	    		
	    	apr_value2 = 4.5;
	    	apr_big = apr_value2;
			$(apr_value_big).text(apr_big);
			calculateMonthlyPaymentBig(term, apr_big);

		} 

		else if ( (str.indexOf("Very") >= 0) ) {
	
	    	apr_value2 = 6.5;
	    		    	apr_big = apr_value2;
			$(apr_value_big).text(apr_big);
			calculateMonthlyPaymentBig(term, apr_big);
		}

		else if ( (str.indexOf("Good") >= 0) ) {
	
	    	apr_value2 = 8.5;
	    		    	apr_big = apr_value2;
			$(apr_value_big).text(apr_big);
			calculateMonthlyPaymentBig(term, apr_big);
		}

		else if ( (str.indexOf("Fair") >= 0) ) {
	
	    	apr_value2 = 15;
	    		    	apr_big = apr_value2;
			$(apr_value_big).text(apr_big);
			calculateMonthlyPaymentBig(term, apr_big);
		}

		else if ( (str.indexOf("Challenged") >= 0) ) {
	
	    	apr_value2 = 25;
	    		    	apr_big = apr_value2;
			$(apr_value_big).text(apr_big);
			calculateMonthlyPaymentBig(term, apr_big);
		}

	});

	console.log(apr_value2);
	apr_value2 = parseFloat(apr_value2);
	apr_big = apr_value2;



	$(apr_value_big).text(apr_big);
	return apr_big;

}


function calculateMonthlyPaymentSmall( month_term, intr ) {


 // var princ = calculateTotalFinance();
 // var month_term  = calculateTerm();
 // var intr  = calculateAprSmall() / 1200;

 var princ =  true_finance_amount;
 princ = parseFloat(princ);

 if ( isNaN(month_term) || typeof month_term === "undefined" || month_term === null ) {
 	 var month_term  = term;
 	  month_term = parseFloat(term);
 } else {
 	 month_term = parseFloat(month_term);
 }


 if ( isNaN(intr) || typeof intr === "undefined" || intr === null ) {
 	 var intr  = apr_small  / 1200;
 	 intr = parseFloat(intr);
 } else {
 	intr = parseFloat(intr);
 	intr = intr / 1200;
 }



 console.log('small ' + princ);
 console.log('small term ' + month_term);
 console.log('small apr ' + apr_small);

 var output = princ * intr / (1 - (Math.pow(1/(1 + intr), month_term)));
 output = output.toPrecision(5);

console.log(output);

 if ( isNaN(princ) || isNaN(month_term) || isNaN(intr) ) {
 	 $(monthly_small).text( $0 );
 } else {
 	 $(monthly_small).text( output );
 }

}

function calculateMonthlyPaymentBig( month_term, intr ) {


 // var princ = calculateTotalFinance();
 // var month_term  = calculateTerm();
 // var intr   = calculateAprBig() / 1200;


 // var princ = true_finance_amount;
 // var month_term  = term;
 // var intr   = apr_big / 1200;

 var princ =  true_finance_amount;
 princ = parseFloat(princ);

 if ( isNaN(month_term) || typeof month_term === "undefined" || month_term === null ) {
 	 var month_term  = term;
 	  month_term = parseFloat(term);
 } else {
 	 month_term = parseFloat(month_term);
 }


 if ( isNaN(intr) || typeof intr === "undefined" || intr === null ) {
 	 var intr  = apr_big / 1200;
 	 intr = parseFloat(intr);
 } else {
 	intr = parseFloat(intr);
 	intr = intr / 1200;
 }

 console.log('big ' + princ);
 console.log('big term ' + month_term);
 console.log('big apr ' + apr_big);

 var output = princ * intr / (1 - (Math.pow(1/(1 + intr), month_term)));
 output = output.toPrecision(5);

  if ( isNaN(princ) || isNaN(month_term) || isNaN(intr) ) {
 	 $(monthly_big).text( $0 );
 } else {
 	 $(monthly_big).text( output );
 }

 $(monthly_big).text( output );

}



	setRegularPrice();
	setDownPayment();
	calculateFees();
	setEstimatedFees();
	calculatePrice();
	calculateTotalFinance();
	calculateTerm();
	calculateAprSmall();
	calculateAprBig();
	calculateMonthlyPaymentSmall();
	calculateMonthlyPaymentBig();

	// calculateDownPayment();
	// calculateTotalFinance();

});




</script>


<div class="summary">
	<div class="summary-inner">
		<h5 class="">Summary**</h5>

		<div class="calculator-info">
			<div class="row">
				<p>Vehicle Price</p>
				<p id="vehicle-price">$0</p>
			</div>
			<div class="row">
				<p>Est. Tax, Titles, & Fees</p>
				<p class="fees-main" id="fees">+ $0</p>
			</div>
			<div class="row">
				<p>Down Payment <a href="#" class="offer" target="_blank">(Get a trade-in offer)</a></p>
				<p class="down-payment" id="fees">- $0</p>
			</div>
			<div class="row">
				<p><span class="bold">Total Finance Amount</span></p>
				<p class="total-finance-amount" id="fees bold">$0</p>
			</div>
		</div>

		<div class="calculator-output">
			<div class="inner">
				<h5>Estimated Montly Payment</h5>

				<div class="output">
					<h2 class="output-info"><span class="monthly_small">$454</span> - <span class="monthly_big">$468</span></h2>
					<h5 class="apr">Estimated APR <span class="apr_value_small">2.95</span>% - <span class="apr_value_big">4.5</span>%</h5>
				</div>
			</div>
		</div>
	</div>
</div>