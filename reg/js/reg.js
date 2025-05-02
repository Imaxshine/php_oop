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
        let pass2 = document.getElementById('pass1').value;
        let data = new FormData();
        data.append("name",name);
        data.append("email",email);
        data.append('pass1',pass1);
        data.append('pass2',pass2);

        let responses = await fetch(mainPath,{
            method:"POST",

        });
        if(responses.ok){
            let results = await responses.text();
            document.querySelector('.outputs').innerHTML = `<p class='alert alert-info'>${results}</p>`;
            document.querySelector('.myDialog').showModal();
        }

    }catch (e) {
        console.error("Error: ",e);
    }
}