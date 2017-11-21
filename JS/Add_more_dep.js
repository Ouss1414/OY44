$(document).ready(function(){

    var counter = 2;

    $("#addButtondep").click(function () {

        var newTextBoxDiv = $(document.createElement('tr'))
            .attr("id", 'AddDepartment' + counter);

        newTextBoxDiv.after().html('<td><label for="Name_dep'+counter+'">Name of Department ' + counter +' : </label></td>' +
            '<td><input type="text" class="form-control" name="Name_dep'+counter+'" id="Name_dep'+counter+'" placeholder="Name of Department" autofocus></td>');

        newTextBoxDiv.appendTo("#AddDepartmentGroup");

        counter++;
    });

    $("#removeButtondep").click(function () {
        if(counter==2){
            alert("No more textbox to remove");
            return false;
        }

        counter--;

        $("#AddDepartment" + counter).remove();

    });
});