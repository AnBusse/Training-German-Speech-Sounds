 //changes the value in the datalist (search form) between the course name, course id and provider id
function changeValue(target) {
    var input_id = $('#title').val();
    var data_list_id = $('#titles');
    var val = $(data_list_id).find('option[value="' + input_id + '"]');
    var new_val = val.attr(target);
        return (new_val);
    }	