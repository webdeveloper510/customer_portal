<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Customer portal</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
      </head>
  <style>
      .form-information {
    background: #fff;
    padding: 30px 30px 20px;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;

}

.Login {
    overflow: hidden;
    background: #93daf8;
    padding: 8vh;
    font-family: 'Poppins', sans-serif;
}
  </style>
  <body>
  <div class="Login">
     <div class="container">
         <div class="row">
             <div class="col"></div>
             <div class="col-md-8">
                
                 <div class="form-information">
                    <div class="text-center">
                        <img src="https://www.codenomad.net/customer-portal/public/logo.png" class="img-fluid  w-25"/>
                    </div>
                    <form 
                            role="form" 
                            action="{{ route('stripe.post') }}" 
                            method="post" 
                            class="require-validation"
                            data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="payment-form">
                        @csrf
                        <div class="mb-3">
                          <label for="farmName" class="form-label">Farm Name</label>
                          <input type="text" class="form-control" name="farm_name" placeholder="Enter Farm Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="mainContactName" class="form-label"> Main Contact Name</label>
                            <input type="text" class="form-control" name="contact_name" placeholder="Enter Main Contact Name" required>
                          </div>
                          <div class="mb-3">
                            <label for="phoneNumber" class="form-label">Phone Number</label>
                            <input type="number" class="form-control" name="phone_number" placeholder="Enter Phone Number" required>
                          </div>
                          <div class="mb-3">
                            <label for="emailAddress" class="form-label"> Email Address</label>
                            <input type="email" class="form-control" name="email_address" placeholder="Enter Email Address" required>
                          </div>
                          <div class="mb-3">
                            <label for="physicalAddress" class="form-label">Physical Address</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="physical_address" rows="3" required></textarea>
                          </div>
                          <div class="mb-3">
                            <label for="state" class="form-label">State</label>
                            <select class="form-select" id="state"  aria-label="Default select example" required>
                                <option selected>Select State </option>
                                <option value="1">Tri-State</option>
                                <option value="2">Outside Tri-State</option>
                              </select>
                               <div class="form-text">Pay $100 for Tri-State and $250 for Outside Tri-State.</div>
                          </div>
                          <!--<div class="mb-3">-->
                          <!--      <label for="amount" class="form-label">Amount</label>-->
                          <!--      <input type="text" class="form-control" name="amount" id="amount" value="$" />-->
                          <!--</div>-->
                        
                    
                        <div class="px-3 card py-3" id="payment_form" style="display:none;">
                            <div class="text-center">
                               <h4>  Payment form  </h4>
                            </div>
                        <div class='form-row row mb-3'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control' name="card_name" size='4' type='text' required>
                            </div>
                        </div>
    
                        <div class='form-row row mb-3'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-number'name="card_number" size='20'
                                    type='text' required>
                            </div>
                        </div>
    
                        <div class='form-row row  mb-3'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' name="cvc" placeholder='ex. 311' size='4'
                                    type='text' required>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' name="expiry_month" placeholder='MM' size='2'
                                    type='text' required>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' name="expiry_year" placeholder='YYYY' size='4'
                                    type='text' required>
                            </div>
                        </div>
    
                        <div class='form-row row' style="display:none;">
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
                    </div>
                        <div class="my-3 form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">I accept the Terms and Conditions.</label>
                        </div>
                        <div class="text-center">
                         <input type="hidden" id="amount" name="amount" value="">
                         <input type="hidden" name="payment_method" class="payment-method">
                        <button type="submit" id="pay_amount" class="btn btn-primary" style="display:none;"></button>
                        </div>
                      </form>
                 </div>
                
             </div>
             <div class="col"></div>
         </div>
     </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        $("#state").change(function () {
            var val = $(this).val();
            if(val==1){
                $('#payment_form').show();
                $('#amount').val(100);
                $("#pay_amount").show();
                $("#pay_amount").html('Pay $100');
                
            }
            if(val==2){
                $("#payment_form").show();
                $('#amount').val(250);
                $("#pay_amount").show();
                $("#pay_amount").html('Pay $250');
            }
    });
    
   
    $(function() {
  
    /*------------------------------------------
    --------------------------------------------
    Stripe Payment Code
    --------------------------------------------
    --------------------------------------------*/
    
    var $form = $(".require-validation");
     
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid = true;
        $errorMessage.addClass('hide');
    
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
     
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
    
    });
      
    /*------------------------------------------
    --------------------------------------------
    Stripe Response Handler
    --------------------------------------------
    --------------------------------------------*/
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
                 
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
     
});
    </script>
  </body>
</html>