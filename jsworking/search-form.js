function updateSearchIdButton(id1,id2) {
	var el = document.getElementById(id1);
	
	if (el) {
    el.id = id2;
    el.innerHTML = "X";
	} else {
	el = document.getElementById(id2);
    el.id = id1;
    el.innerHTML = "<i class='fa fa-search search-icon'></i>";
	}
	
	return el;
}