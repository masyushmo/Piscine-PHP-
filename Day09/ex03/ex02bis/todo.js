$(document).ready(function() {
    var cook = document.cookie.split("; ");
    var i = cook.length;
    if (cook != null && cook != '') {
    while(i-- >= 0) {
            var newi = cook[i].split("=");
            addtodo(newi[0]); 
        }
    }
})
function addtodo(todo) {
    $('#ft_list').prepend($('<div>' + todo + '</div>').click(del));
    document.cookie = todo + "=" + todo + "; ";
}
    

function newtodo() {
    var todo = prompt("Please enter new TO DO");
    if (todo != null && todo.replace(/\s/g, '').length && todo.length < 200){
        addtodo(todo);
    }
}

function del() {
	if (confirm("you sure?")) {
        this.remove();
        document.cookie = this.innerHTML + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
	}
}