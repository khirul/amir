
$(document).ready(function() {

    // noti
    setTimeout(function(){
        $('.alert').fadeOut()
    },4000)
   
});


// anggota-ba
$(document).ready(function() {
    $('select[name="category"]').on('change', function(e) {
        var categoryID = e.target.value;
        // console.log(categoryID)
        $.get('http://127.0.0.1:8000/anggota/subcategory/'+ categoryID, function(response){
            // console.log(response)
            $('#SUB1').empty()
            $.each(response, function(key, value){
                $('#SUB1').append('<option value="'+value.id+'">'+value.subcategory_name+'</option>')
            });
        })
       
    });
});

// penyelia-ba
$(document).ready(function() {
    $('select[name="category"]').on('change', function(e) {
        var categoryID = e.target.value;
        // console.log(categoryID)
        $.get('http://127.0.0.1:8000/penyelia/subcategory/'+ categoryID, function(response){
            // console.log(response)
            $('#SUB2').empty()
            $.each(response, function(key, value){
                $('#SUB2').append('<option value="'+value.id+'">'+value.subcategory_name+'</option>')
            });
        })
       
    });
});

// pegawaiTinggi-ba
$(document).ready(function() {
    $('select[name="category"]').on('change', function(e) {
        var categoryID = e.target.value;
        // console.log(categoryID)
        $.get('http://127.0.0.1:8000/pegawai_tinggi/subcategory/'+ categoryID, function(response){
            // console.log(response)
            $('#SUB3').empty()
            $.each(response, function(key, value){
                $('#SUB3').append('<option value="'+value.id+'">'+value.subcategory_name+'</option>')
            });
        })
       
    });
});

// senarai_seksyen_penyelia&anggota_kontinjen
$(document).ready(function() {
    $('select[name="seksyen"]').on('change', function(e) {
        var categoryID = e.target.value;
        // console.log(categoryID)
        $.get('http://127.0.0.1:8000/kontinjen/subcategory/'+ categoryID, function(response){
            // console.log(response)
            $('#SUB4').empty()
            $.each(response, function(key, value){
                $('#SUB4').append('<option value="'+value.id+'">'+value.subsection_name+'</option>')
            });
        })
       
    });
});

// senarai_seksyen_penyelia&anggota_daerah
$(document).ready(function() {
    $('select[name="negeri"]').on('change', function(e) {
        var categoryID = e.target.value;
        // console.log(categoryID)
        $.get('http://127.0.0.1:8000/anggota_daerah/subcategory/'+ categoryID, function(response){
            // console.log(response)
            $('#SUB5').empty()
            $.each(response, function(key, value){
                $('#SUB5').append('<option value="'+value.id+'">'+value.district_name+'</option>')
            });
        })
       
    });
});