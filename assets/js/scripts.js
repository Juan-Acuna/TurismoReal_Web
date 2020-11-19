function Filtrar(obj){
    var cat = obj.getAttribute("category");
    var items = document.getElementsByClassName("depa-item");
    if(cat=="all"){
        for(var i =0;i<items.length;i++){
            items[i].style=visibility="visible";
        }
    }else{
        for(var i =0;i<items.length;i++){
            if(items[i].getAttribute("category")!=cat){
                items[i].classList.add("d-none");
                items[i].classList.remove("d-flex");
            }else{
                items[i].classList.remove("d-none");
                items[i].classList.add("d-flex");
            }
        }
    }
}