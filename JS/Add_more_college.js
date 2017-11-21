$(document).ready(function(){

    var counter = 2;

    $("#addButton").click(function () {

        var newTextBoxDiv = $(document.createElement('tr'))
            .attr("id", 'TextBoxDiv' + counter);

        newTextBoxDiv.after().html('<td><label for="Name_college">Name of College ' + counter +' : </label></td>' +
            '<td><input type="text" class="form-control" name="Name_college'+counter+'" id="Name_college'+counter+'" placeholder="Name of College" autofocus required></td>');

        newTextBoxDiv.appendTo("#TextBoxesGroup");

        counter++;
    });

    $("#removeButton").click(function () {
        if(counter==2){
            alert("No more textbox to remove");
            return false;
        }

        counter--;

        $("#TextBoxDiv" + counter).remove();

    });
});