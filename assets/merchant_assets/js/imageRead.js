function readURL(input, preview){
    if (input.files && input.files[0])
    {
        var inputValue = input.value;
        var inputType = inputValue.substring(inputValue.lastIndexOf('.') + 1);

        var fileTypes = ['jpg','jpeg','png','gif'];
        var imgDiv = document.getElementById(preview);
        var alertDiv = document.getElementById(preview+"Alert");

        if(input.files[0].size <= 5600000) {
            if (fileTypes.find(fileType => { if( fileType === inputType){return fileType;}})){
                imgDiv.classList.remove("hide");
                imgDiv.classList.remove("d-none");
                $('#'+preview+'TypeAlert').addClass('hide');
                alertDiv.classList.add("hide");
                alertDiv.classList.add("d-none");
                var reader = new FileReader();
                reader.onload = function (e)
                {
                    $('#'+preview)
                        .attr('src', e.target.result)
                };

                reader.readAsDataURL(input.files[0]);
            }else{
                $('#'+preview+'TypeAlert').addClass('file-type');
                $('#'+preview+'TypeAlert').removeClass('hide');
                imgDiv.classList.add("hide");
                imgDiv.classList.add("d-none");
                alertDiv.classList.add("hide");
            }

        }else{
            imgDiv.classList.add("hide");
            imgDiv.classList.add("d-none");
            alertDiv.classList.remove("hide");
            alertDiv.classList.remove("d-none");
            $('#'+preview+'TypeAlert').addClass('hide');
            $('#'+preview+'TypeAlert').removeClass('file-type');

        }

    }
}

/*  how to use in blade
    input sample
    <input class="form-control" id="favicon" type="file" accept=".jpg, .png, .gif" name="favicon" onchange="readURL(this, 'faviconView');">
    preview sample
    <img id="faviconView" src="" alt="favicon" class=" img-responsive img-thumbnail">
    warning sample
    <span id="faviconViewAlert" class="text-danger hide">
        * Update will delete the old favicon automatically <br>
        Please, select Image with Maximum weight of 5 MB
    </span>
*/
