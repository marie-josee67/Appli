const btnToggle = document.querySelector(".btn-toggle");
const body=document.querySelector("body");

btnToggle.addEventListener("click",( ) => {
    console.log("test");

    if(body.classList.contains("dark")){
        body.classList.add("light")
        body.classList.remove("dark")
        btnToggle.innerphp = "Go Dark"
    }

        else if(body.classList.contains("light")){
            body.classList.add("dark")
            body.classList.remove("light")
            btnToggle.innerphp = "Go Light"
            
        }
})