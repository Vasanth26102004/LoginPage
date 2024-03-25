const wrapper = document.querySelector('.wrapper');
const loginlink = document.querySelector('.login-link');
const registerlink = document.querySelector('.register-link');
const btnpopup = document.querySelector('.btnlogin-popup');
const iconclose = document.querySelector('.iconclose');

registerlink.addEventListener('click',()=> {
    wrapper.classList.add('active');
}); 

loginlink.addEventListener('click',()=> {
    wrapper.classList.remove('active');
});

btnpopup.addEventListener('click',()=> {
    wrapper.classList.add('active-popup');
});

iconclose.addEventListener('click',()=> {
    wrapper.classList.remove('active-popup');
});

const passwordInput = document.getElementById('PassType');
const icon = document.getElementById('icon');

function togglePassword(icon) {
    if (icon.classList.contains('fa-lock')) {
        icon.classList.remove('fa-lock');
        icon.classList.add('fa-lock-open');
    } else {
        icon.classList.remove('fa-lock-open');
        icon.classList.add('fa-lock');
    }
}


$(document).ready(function(){
    $('#reg_form').submit(function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'register.php',
            data: $(this).serialize(),
            success: function(response){
                $('#reg_msg').text(response);
                $('#reg_form')[0].reset();
            }
        });
    });
});

$(document).ready(function() {
    $("login").click(function() {
        
        $.ajax({
            url: 'db.php', 
            type: 'POST', 
            data: { action: 'login' }, 
            success: function(response) {
                // Handle the response from the PHP file
                $("#result").html(response);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
});

