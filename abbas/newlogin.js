labels = document.querySelectorAll(".labels");
err = document.getElementById("err");
error = document.getElementById("error");
function validate(a){
    b = a.value;
    display("MGG")
    if(b.length<8 || b.length>16){
        display("your password must be less than or equal to 8 or greater than or equal to 16..");
    }
}
function up(a)
{
    a.style.fontSize="15px";
    a.style.bottom="16%";
    a.style.backgroundColor="white";
    a.style.padding="2px 10px";
    a.style.borderLeft="5px solid";
    a.style.borderRight="5px solid";
}
function down(a,b){
 if(b.value==""){
    a.style.fontSize="18px";
    a.style.bottom="11.5%";
    a.style.backgroundColor="white";
    a.style.borderLeft="none";
    a.style.borderRight="none";
   }
}
function fun1()
{
    a=document.getElementById("forms");
    a.style.transform="translateX(0)";
    b=document.getElementsByClassName('btn');
    b[0].style.backgroundColor='var(--bgcolor)';
    b[1].style.backgroundColor='black';
    a=document.getElementById("heading");
    a.innerText='LOGIN';
    a.style.width="20%";
    c=document.getElementById("heading");
    c.style.animationName="none";
    requestAnimationFrame(()=>{
        c.style.animationName="";
    });

}
function fun2()
{
    a=document.getElementById("forms");
    a.style.transform="translateX(-100%)";
    b=document.getElementsByClassName('btn');   
    b[0].style.backgroundColor='black';
    b[1].style.backgroundColor='var(--bgcolor)';
    a=document.getElementById("heading");
    a.innerText='REGISTER';
    a.style.width="30%";
    c=document.getElementById("heading");
    c.style.animationName="none";
    requestAnimationFrame(()=>{
        c.style.animationName="";
    });
}

function display(s){
    document.getElementsByClassName('error')[0].style.zIndex='1';
    document.getElementsByClassName('errdes')[0].innerText=s;
    
}
