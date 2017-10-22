function calcualteAmount(){
  var type = document.forms["confirm"]["type"].value;
  var type1 = "venue";
  var type2 = "caterer";
  var type3 = "decorator";
  var price = document.forms["confirm"]["price"].value;
  if (type == type1) {
    var duration = document.forms["confirm"]["duration"].value;
    var fprice = price * duration;
  }
  else if (type == type2) {
    var dishes = document.forms["confirm"]["dishes"].value;
    if (dishes > 250) {
      var p = price * 0.05;
      price = price - p;
    }
    else if (dishes > 500) {
      var p = price * 0.1;
      price = price - p;
    }
    var fprice = dishes * price;
  }
  else if (type == type3) {
    var area = document.forms["confirm"]["area"].value;
    if (area > 2000) {
      var p = price * 0.05;
      price = price - p;
    }
    else if (area > 3000) {
      var p = price * 0.1;
      price = price - p;
    }
    var fprice = area * price;
  }
  document.getElementById('fprice').value = fprice;
}
