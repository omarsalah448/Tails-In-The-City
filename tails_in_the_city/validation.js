function validateNotEmpty(form) {
  // get all the inputs within the submitted form
  var inputs = form.getElementsByTagName('input');
  for (var i = 0; i < inputs.length; i++) {
      // only validate the inputs that have the required attribute
      if(inputs[i].hasAttribute("required")){
          if(inputs[i].value == ""){
              // found an empty field that is required
              missing_field = form.getElementsByTagName('label')[i].textContent;
              alert("Please fill the "+missing_field+" field");
              return false;
          }
      }
  }
  return true;
}

/* Signup validation using Ajax */
function validate_ajax(type, element_id, page_name, str) {
  if (str == "") {
      document.getElementById(element_id).innerHTML = "";
      return;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
      document.getElementById(element_id).innerHTML = this.responseText;
  }
  xhttp.open("POST", "http://localhost/tails_in_the_city/ajax/"+page_name+"?type="+type+"&q="+str);
  xhttp.send();
}

function handleSearch(str) {
    const xhttp = new XMLHttpRequest();
    if (str == "") {
      query = "SELECT * FROM store WHERE quantity > 0;"
    } 
    else{
      query = "SELECT * FROM store WHERE quantity > 0 AND" 
      query = query +"(item_name LIKE '%"+str+"%' "
      if(!isNaN(str)){
        // if str is a number convert to a number
        query = query +"or item_price=" + Number(str) + ' '
      }
      query = query +"or item_category LIKE '%"+str+"%');"
    }
    xhttp.onload = function() {
        document.getElementById("store_page").innerHTML = this.responseText;
    }
    xhttp.open("GET", "ajax/search_check.php?type=searchBar&query="+query);
    xhttp.send();
  }

  function handleSearch_adopt(str) {
    const xhttp = new XMLHttpRequest();
    if (str == "") {
      query = "SELECT * FROM pets where pets.own_status = 'adopt'";
    }
    else{
      query = "SELECT * FROM pets WHERE pets.own_status = 'adopt' AND " 
      query = query +"(pet_name LIKE '%"+str+"%' "
      query = query +"or pet_type LIKE '"+str+"' "
      query = query +"or breed LIKE '%"+str+"%' "
      if(!isNaN(str)){
        // if str is a number convert to a number
        query = query +"or age=" + Number(str) + ' '
      }
      query = query +"or color LIKE '%"+str+"%');"
    }
    xhttp.onload = function() {
        document.getElementById("adopt_page").innerHTML = this.responseText;
    }
    xhttp.open("GET", "ajax/search_check.php?type=searchBar_adopt&query="+query);
    xhttp.send();
  }


  function handleSearch_breed(str, user_pet_id, pet_type, gender) {
    const xhttp = new XMLHttpRequest();
    if (str == "") {
      query = "SELECT * FROM pets left join parent_pet on parent_pet.user_pet_id=pets.pet_id"
      query = query + " WHERE pets.breeding_status = 'Breeding' and pets.pet_id != " + user_pet_id
      query = query + " and pets.pet_type like '" + pet_type
      query = query + "' and pets.gender not like '" + gender + "'"
    }
    else{
      query = "SELECT * FROM pets left join parent_pet on parent_pet.user_pet_id=pets.pet_id"
      query = query + " WHERE pets.breeding_status = 'Breeding' and pets.pet_id != " + user_pet_id
      query = query + " and pets.pet_type like '" + pet_type
      query = query + "' and pets.gender not like '" + gender
      query = query + "' and (pet_name LIKE '%"+str+"%'"
      query = query + " or breed LIKE '"+str+"'"
      if(!isNaN(str)){
        // if str is a number convert to a number
        query = query +"or age=" + Number(str) + ' '
      }
      query = query + " or color LIKE '%"+str+"%');"
    }
    xhttp.onload = function() {
        document.getElementById("breeding_page").innerHTML = this.responseText;
    }
    xhttp.open("GET", "ajax/search_check.php?type=searchBar_breeding&query="+query);
    xhttp.send();
  }

  function handleCheckBox() {
    const xhttp = new XMLHttpRequest();
    str = "(";
    var allFlag = 1;
    if(document.getElementById("dryFood").checked==true){
      str = str + "'dry food',";
      allFlag = 0;
    }
    if(document.getElementById("wetFood").checked==true){
      str = str + "'wet food',";
      allFlag = 0;
    }
    if(document.getElementById("toys").checked==true){
      str = str + "'toy',";
      allFlag = 0;
    }
    if(document.getElementById("accessories").checked==true){
      str = str + "'accessories',";
      allFlag = 0;
    }
    if(document.getElementById("hygiene").checked==true){
      str = str + "'hygiene',";
      allFlag = 0;
    }
    // remove last comma
    str = str.slice(0,-1) + ")";
    if(allFlag == 1){
      str = ""
      query = "SELECT * FROM store "
    }
    else{
      query = "SELECT * FROM store WHERE item_category IN " + str
    }
    xhttp.onload = function() {
        document.getElementById("store_page").innerHTML = this.responseText;
    }
    xhttp.open("GET", "ajax/search_check.php?type=checkbox&query="+query);
    xhttp.send();
  }
  
  function handle_pet_admin_checkbox() {
    const xhttp = new XMLHttpRequest();
    document.getElementById("store_admin_checkbox").checked = false
    document.getElementById("vet_admin_checkbox").checked = false
    query = "select * from pets"
    xhttp.onload = function() {
        document.getElementById("admin_page").innerHTML = this.responseText;
    }
    xhttp.open("GET", "../ajax/search_check.php?type=admin_search&search_type=pet_checkbox&query="+query);
    xhttp.send();
  }

  function handle_store_admin_checkbox() {
    const xhttp = new XMLHttpRequest();
    document.getElementById("pet_admin_checkbox").checked = false
    document.getElementById("vet_admin_checkbox").checked = false
    query = "select * from store"
    xhttp.onload = function() {
        document.getElementById("admin_page").innerHTML = this.responseText;
    }
    xhttp.open("GET", "../ajax/search_check.php?type=admin_search&search_type=store_checkbox&query="+query);
    xhttp.send();
  }

  function handle_vet_admin_checkbox() {
    const xhttp = new XMLHttpRequest();
    document.getElementById("store_admin_checkbox").checked = false
    document.getElementById("pet_admin_checkbox").checked = false
    query = "select * from vet"
    xhttp.onload = function() {
        document.getElementById("admin_page").innerHTML = this.responseText;
    }
    xhttp.open("GET", "../ajax/search_check.php?type=admin_search&search_type=vet_checkbox&query="+query);
    xhttp.send();
  }

  function handleSearch_admin(str) {
    const xhttp = new XMLHttpRequest();
    if(document.getElementById("pet_admin_checkbox").checked == true){checked_val = "pet_checkbox"}
    if(document.getElementById("store_admin_checkbox").checked == true){checked_val = "store_checkbox"}
    if(document.getElementById("vet_admin_checkbox").checked == true){checked_val = "vet_checkbox"}
    if (str == "") { 
      if (checked_val == "pet_checkbox"){ query =  "SELECT * FROM pets" } 
      if (checked_val == "store_checkbox"){ query = "SELECT * FROM store" } 
      if (checked_val == "vet_checkbox"){ query = "SELECT * FROM vet" } 
  }
    else{
      if (checked_val == "pet_checkbox"){
      query = "SELECT * FROM pets WHERE " 
      query = query +"(pet_name LIKE '%"+str+"%' "
      if(!isNaN(str)){
        // if str is a number convert to a number
        query = query +"or pet_id =" + Number(str) + ' '
        query = query +"or age =" + Number(str) + ' '
      }
      query = query +"or pet_type LIKE '"+str+"' "
      query = query +"or breed LIKE '%"+str+"%' "
      query = query +"or gender LIKE '%"+str+"%' "
      query = query +"or color LIKE '%"+str+"%');"
    }
    if (checked_val == "store_checkbox"){
      query = "SELECT * FROM store WHERE " 
      query = query +"(item_name LIKE '%"+str+"%' "
      if(!isNaN(str)){
        // if str is a number convert to a number
        query = query +"or item_id =" + Number(str) + ' '
        query = query +"or item_price =" + Number(str) + ' '
        query = query +"or quantity =" + Number(str) + ' '
      }
      query = query +"or item_category LIKE '%"+str+"%');"
    }

    if (checked_val == "vet_checkbox"){
      query = "SELECT * FROM vet WHERE " 
      query = query +"(vet_name LIKE '%"+str+"%' "
      if(!isNaN(str)){
        // if str is a number convert to a number
        query = query +"or vet_id =" + Number(str) + ' '
      }
      query = query +"or email LIKE '"+str+"' "
      query = query +"or vet_address LIKE '%"+str+"%');"
    }

    }
    xhttp.onload = function() {
        document.getElementById("admin_page").innerHTML = this.responseText;
    }
    xhttp.open("GET", "../ajax/search_check.php?type=admin_search&search_type="+checked_val+"&query="+query);
    xhttp.send();

  }
  // function checkown(that){
 
  //   if(that.value=="owned"){
  //     alert("Please enter the owner id") ;
  //     document.getElementById("ownerid").style.display = "block";
  //   }
  //   else{
  //     document.getElementById("ownerid").style.display = "none";
  //   }
  // }