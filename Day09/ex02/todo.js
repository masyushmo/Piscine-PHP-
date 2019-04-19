window.onload = function() {
    var cook = document.cookie.split("; ");
    var i = cook.length;
    if (cook != null && cook != '') {
    while(i-- >= 0) {
            var newi = cook[i].split("=");
            addtodo(newi[0]); 
        }
    }
}
function addtodo(todo) {
    var newDiv = document.createElement('div');
    var p = document.createTextNode(todo);
    newDiv.appendChild(p);
    newDiv.addEventListener('click', function(){del(newDiv, todo)});
    document.getElementById("ft_list").
        insertBefore(newDiv, document.getElementById("ft_list").firstChild);
        document.cookie = todo + "=" + todo + "; ";
}
    

function newtodo() {
    var todo = prompt("Please enter new TO DO");
    if (todo != null && todo.replace(/\s/g, '').length && todo.length < 200){
        addtodo(todo);
    }
}

function del(newDiv, todo) {
    newDiv.parentNode.removeChild(newDiv);
    document.cookie = todo + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}


