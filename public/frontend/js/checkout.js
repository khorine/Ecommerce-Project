$(document).ready(function (){
    $('.mpesa-btn').click(function (e){
        e.preventDefault();

        var firstname = $('.firstname').val();
        var lastname = $('.lastname').val();
        var email = $('.email').val();
        var phone = $('.phone').val();
        var address = $('.address').val();
        var deliveryAddress = $('.deliveryAddress').val();
        var town = $('.town').val();
        var city = $('.city').val();
        var county = $('.county').val();
        var pincode = $('.pincode').val();

        if(!firstname)
        {
            fname_error ="First Name is required";
            $('#fname_error').html('');
            $('#fname_error').html(fname_error);
        }
        else{
            fname_error ="";
            $('#fname_error').html('');
        }

        if(!lastname)
        {
            lname_error ="Last Name is required";
            $('#lname_error').html('');
            $('#lname_error').html(lname_error);
        }
        else{
            lname_error ="";
            $('#lname_error').html('');
        }

        if(!email)
        {
            email_error ="Email is required";
            $('#email_error').html('');
            $('#email_error').html(email_error);
        }
        else{
            email_error ="";
            $('#email_error').html('');
        }
        
        if(!phone)
        {
            phone_error ="Phone Number is required";
            $('#phone_error').html('');
            $('#phone_error').html(phone_error);
        }
        else{
            phone_error ="";
            $('#phone_error').html('');
        }

        if(!address)
        {
            address_error ="Address is required";
            $('#address_error').html('');
            $('#address_error').html(address_error);
        }
        else{
            address_error ="";
            $('#address_error').html('');
        }

        if(!deliveryAddress)
        {
            d_error ="Delivery Address is required";
            $('#d_error').html('');
            $('#d_error').html(d_error);
        }
        else{
            d_error ="";
            $('#d_error').html('');
        }

        if(!town)
        {
            town_error ="Town is required";
            $('#town_error').html('');
            $('#town_error').html(towns_error);
        }
        else{
            town_error ="";
            $('#town_error').html('');
        }

        if(!city)
        {
            city_error ="City is required";
            $('#city_error').html('');
            $('#city_error').html(city_error);
        }
        else{
            town_error ="";
            $('#city_error').html('');
        }

        if(!county)
        {
            county_error ="County is required";
            $('#county_error').html('');
            $('#county_error').html(county_error);
        }
        else{
            county_error ="";
            $('#county_error').html('');
        }

        if(!pincode)
        {
            pincode_error ="Pincode is required";
            $('#pincode_error').html('');
            $('#pincode_error').html(pincode_error);
        }
        else{
            pincode_error ="";
            $('#pincode_error').html('');
        }

        if(fname_error !== '' || lname_error !== '' || email_error !== '' || phone_error !== '' || address_error !== '' || d_error !== '' || town_error !== '' || city_error !== '' || county_error !== '' || pincode_error !== '')
        {
            return false;
        }
        else{

            var data = {
                'firstname': firstname,
                'lastname': lastname,
                'email': email,
                'phone': phone,
                'address': address,
                'deliveryAddress': deliveryAddress,
                'town': town,
                'city': city,
                'county': county,
                'pincode': pincode,
            };

            $.ajax({
                method: "POST",
                url: "/proceed-to-pay",
                data: data,
                success: function(response){
                    swal(response.status);
                    window.location.href = "/my-orders";
                    
                }
            });
        }
    });
});