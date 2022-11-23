function edit(id,id_fammille,id_classe) {
    console.log(id);
    console.log(id_fammille);
    console.log(id_classe);
	document.getElementById("header-instrument").innerHTML = '<h5>UPDATE Instrument</h5>';
	document.getElementById("instrument-id").value = id;
  
     document.getElementById("instrument-nom").value =document.getElementById(id).parentElement.parentElement.children[1].children[1].innerHTML;

     document.getElementById("instrument-origine").value=document.getElementById(id).getAttribute("data-origine");
     document.getElementById("instrument-materiaux").value=document.getElementById(id).getAttribute("data-materiaux");
     document.getElementById("instrument-dimension").value=document.getElementById(id).getAttribute("data-dimension");
     document.getElementById("instrument-qte").value=document.getElementById(id).getAttribute("data-qte");
     document.getElementById("instrument-prix").value=document.getElementById(id).getAttribute("data-prix");
  
     
        document.getElementById('fammille'+id_fammille).selected=true;
        document.getElementById('classe'+id_classe).selected=true;
//get description
     document.getElementById("instrument-description").value=document.getElementById(id).getAttribute("data-desc");
 //hidden the btn of save and show update
     document.getElementById('instrument-update-btn').style.display = 'block';
     document.getElementById("instrument-save-btn").style.display = 'none';
     //changer l'action de form of modal from save to update 
     document.getElementById("form-instrument").setAttribute("action","update-instrument.php");
      
    }

    document.getElementById("add").addEventListener("click",function(){
       //changer le titre de modal
       document.getElementById("header-instrument").innerHTML = '<h5>ADD Instrument</h5>';
       //reset form
       document.getElementById("form-instrument").reset();
       //hidden the btn of update and show save
       document.getElementById('instrument-update-btn').style.display = 'none';
       document.getElementById("instrument-save-btn").style.display = 'block';

    });