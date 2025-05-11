document.getElementById('loginForm').addEventListener('submit',ev=>{
    ev.preventDefault();
});
async function Login()
{
    try{
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        if(email.trim() === "" || password.trim() === ""){
            return document.getElementById('responses').innerHTML = `<p class="alert alert-danger">All fields are required!</p>`;
        }
        let path = window.location.origin;
        let mainPath = `${path}/oop/login/processor.php`;
        let data = new FormData();
        data.append('email',email);
        data.append('password',password);
        let responses = await fetch(mainPath,{
            method:"POST",
            body:data
        });
        if (responses.ok)
        {
            let results = await responses.text();
            if (results.includes('success')){
                document.getElementById('responses').innerHTML = `<p class="alert alert-success"> ${results} </p>`;
                document.getElementById('email').value = "";
                document.getElementById('password').value = "";
                setTimeout(function(){
                    document.getElementById('responses').innerHTML = "";
                    window.location.href = "/oop/login/home";
                },4000)
            }else{
                document.getElementById('responses').innerHTML = `<p class="alert alert-danger"> ${results} </p>`;

            }
        }else{
            document.getElementById('responses').innerHTML = `<p class="alert alert-info">Responses failed, try again later!</p>`;
        }
    }catch (e) {
        console.error('Errors: ',e);
        document.getElementById('responses').innerHTML = `<p class="alert alert-info">Your internet connection goes down, tyr again later</p>`;
    }
}