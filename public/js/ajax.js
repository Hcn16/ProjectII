$(document).ready(function() {
    $('#province').change(function() {
        provinceID = $('#province').val();
        console.log(provinceID);

        $.post(
            "district",

            { provinceID: provinceID },
            function(data) {
                $(".district").html(data);
            }

        );

    });

    $('#districts').change(function() {
        districtID = $('#districts').val();

        $.post(
            "ward",

            { districtID: districtID },
            function(data) {
                $(".ward").html(data);
            }

        );

    });

    $('#province2').change(function() {
        provinceID = $('#province2').val();
        console.log(provinceID);

        $.post(
            "district2",

            { provinceID: provinceID },
            function(data) {
                $(".district2").html(data);
            }

        );

    });

    $('#districts2').change(function() {
        districtID = $('#districts2').val();

        $.post(
            "ward2",

            { districtID: districtID },
            function(data) {
                $(".ward2").html(data);
            }

        );

    });







});