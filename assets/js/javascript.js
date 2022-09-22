function preview() {
    fotoPreview.src = URL.createObjectURL(foto.files[0]);
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#fotoAtual')
                .attr('src', e.target.result)

        };

        reader.readAsDataURL(input.files[0]);
    }
}