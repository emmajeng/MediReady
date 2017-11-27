function checkPassword(){

    //set error messages not to show
    document.getElementById('patient_error').style.display = 'none';
    document.getElementById('doctor_error').style.display = 'none';
    document.getElementById('chemist_error').style.display = 'none';
    document.getElementById('driver_error').style.display = 'none';

    //get user type drop down
    var getDropdown = document.getElementById('user-type');
    //get the text from the drop down and storing in optValue
    var optValue = getDropdown.options[getDropdown.selectedIndex].text;

     if(optValue == "Patient"){

        var password = document.getElementById('patient_password').value;
        var password2 = document.getElementById('patient_password2').value;

        if (password == password2){

            document. getElementById('patient-reg').disabled = false;
            document.getElementById('patient_error').style.display = 'none';

        }

        else {

            document.getElementById('patient-reg').disabled = true;
            document.getElementById('patient_error').style.display = 'unset';

        }

     }

     if(optValue == "Chemist"){

        var password = document.getElementById('chemist_password').value;
        var password2 = document.getElementById('chemist_password2').value;

        if (password == password2){

            document. getElementById('chemist-reg').disabled = false;
            document.getElementById('chemist_error').style.display = 'none';

        }

        else {

            document.getElementById('chemist-reg').disabled = true;
            document.getElementById('chemist_error').style.display = 'unset';

        }

     }

     if(optValue == "Doctor"){

        var password = document.getElementById('doctor_password').value;
        var password2 = document.getElementById('doctor_password2').value;

        if (password == password2){

            document. getElementById('doctor-reg').disabled = false;
            document.getElementById('doctor_error').style.display = 'none';

        }

        else {

            document.getElementById('doctor-reg').disabled = true;
            document.getElementById('doctor_error').style.display = 'unset';

        }

     }

     if(optValue == "Delivery Man"){

        var password = document.getElementById('driver_password').value;
        var password2 = document.getElementById('driver_password2').value;

        if (password == password2){

            document. getElementById('driver-reg').disabled = false;
            document.getElementById('driver_error').style.display = 'none';

        }

        else {

            document.getElementById('driver-reg').disabled = true;
            document.getElementById('driver_error').style.display = 'unset';

        }
     }
}
