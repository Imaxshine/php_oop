document.querySelector("#register").addEventListener('submit',function (ev){
    ev.preventDefault();
});
async function Register(){
    try{
        document.querySelector('.outputs').innerHTML = "<p class='alert alert-info'>Please wait a moment. . . .</p>";
        document.querySelector('.myDialog').showModal();

        let path = window.location.origin;
        let mainPath = `${path}/oop/reg/processor.php`;
        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let pass1 = document.getElementById('pass1').value;
        let pass2 = document.getElementById('pass2').value;

        if (name.trim() === "" || email.trim() === "" || pass1.trim() === "" || pass2.trim() === ""){
            document.querySelector('.outputs').innerHTML = "<p class='alert alert-info'>All fields are required!</p>";
            document.querySelector('.myDialog').showModal();
            return;
        }

        let data = new FormData();
        data.append("name",name);
        data.append("email",email);
        data.append('pass1',pass1);
        data.append('pass2',pass2);

        let responses = await fetch(mainPath,{
            method:"POST",
            body:data
        });
        if(responses.ok){
            let results = await responses.text();
            if (results.includes('success')){
                document.querySelector("#register").reset();
                document.querySelector('.outputs').innerHTML = `${results}`;
                document.querySelector('.myDialog').showModal();
                setTimeout(function(){
                    window.location.href = `${path}/oop/login/index.html`;
                    document.querySelector('.outputs').innerHTML = "";
                    document.querySelector('.myDialog').close();
                },4000);
            }else{
                document.querySelector('.outputs').innerHTML = `${results}`;
                document.querySelector('.myDialog').showModal();
            }
        }else{
            document.querySelector('.outputs').innerHTML = `<p class='alert alert-danger'>Server errors, Please try again later!</p>`;
            document.querySelector('.myDialog').showModal();
        }

    }catch (e) {
        console.error("Error: ",e);
        document.querySelector('.outputs').innerHTML = `<p class='alert alert-warning'>Internet error, check your internet connection</p>`;
        document.querySelector('.myDialog').showModal();
    }
}
//Change mode

function changeTheme(){
    let currentMode = localStorage.getItem('mode');
    let modeIcon = document.getElementById('modeIcon')
    let body =  document.body;
    if (currentMode === "dark"){
        modeIcon.classList.remove('bi-sun');
        modeIcon.classList.add('bi-moon-stars');
        body.classList.toggle('theme');
    }else {
        localStorage.setItem('mode',"dark");

    }
}