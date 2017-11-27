function check_password(){

        var password = document.getElementById('user_new_password').value;
        var password2 = document.getElementById('user_new_password_check').value;

        if (password == password2){
                  document. getElementById('changePasswordBtn').disabled = false;
                  document.getElementById('password_error').style.display = 'none';

        }

        else {
                  document.getElementById('changePasswordBtn').disabled = true;
                  document.getElementById('password_error').style.display = 'unset';

        }

}
