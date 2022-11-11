// alert("working.. Inclueded successfuly");

// window.onload = loadData;

$(document).ready(function () {
    loadData();
});

//Highlight Industry, Market Cap Load
function loadData() {
    $.ajax({
        url: "pages/ajax/securityAjaxCtrl.php",
        type: "post",
        async: "false",
        data: {
            requestType: 'industryload'
        },
        success: function (result) {
            var response = JSON.parse(result);
            // console.log(response.industry);
            $("#ind_sel").html(response.industry);
            var sel_ind = $('#ind_sel option:selected').val();
            marketcapload(sel_ind);
        }

    })


}

//Highlight Marketcap load along with all security of that industry

function marketcapload(indpass) {

    $.ajax({
        url: "pages/ajax/securityAjaxCtrl.php",
        type: "post",
        data: {
            requestType: 'marketcapload',
            ind: indpass
        },
        success: function (result) {
            var response = JSON.parse(result);
            $("#marketcap_sel").html(response.marketcap);
            $('#sec_sel').html(response.securitylist);

            var sec_selected = $('#sec_sel option:selected').val();

            // highlight Defualt security info load on page load

            securityInfoLoad(indpass, sec_selected);
        }
    })

}

$('#ind_sel').on('change', function () {
    // var marketcap = $('#marketcap_sel').val();

    var industry = $(this).val();

    marketcapload(industry);

    var securityname = $('#sec_sel option:selected').val();

    // console.log('security name ' + securityname);

    // securitychart(industry, securityname);

})


$(document).ready(function () {
    $('#marketcap_sel').on('change', function () {
        var marketcap = $(this).val();

        var industry = $('#ind_sel').val();

        // console.log(marketcap + industry);

        securitybymarketcap(industry, marketcap);

    });
});

function securitybymarketcap(industry, marketcap) {

    $.ajax({
        url: "pages/ajax/securityAjaxCtrl.php",
        type: "post",
        data: {
            requestType: 'securitybymarketcap',
            ind: industry,
            mar: marketcap
        },
        success: function (result) {
            var response = JSON.parse(result);
            $('#sec_sel').html(response.securitylist);

        }
    })

}

// Highlight Security List on change secuirty info load


$(document).ready(function () {
    $('#sec_sel').on('change', function () {

        var securityname = $(this).val();
        var industry = $('#ind_sel').val();

        // console.log(securityname + " belongs to " + industry);

        securityInfoLoad(industry, securityname);

    });
});

function securityInfoLoad(industry, securityname) {

    $.ajax({
        url: "pages/ajax/securityAjaxCtrl.php",
        type: "post",
        data: {
            ind: industry,
            isin_code: securityname,
            requestType: 'infoLoad'
        },
        // dataType: "json",
        contentType: "application/x-www-form-urlencoded",
        success: function (result) {
            var response = JSON.parse(result);
            $("#Secuirty_Title").html(response.Security_name);
            $("#Security_About").html(response.Security_Info);
            $("#Security_Cmp").html(response.Security_Cmp);
            $("#last_update").html(response.last_update);
            $("#Security_symbol").html(response.Security_symbol);
            $("#industry").html(response.industry);
            $("#market_cap").html(response.market_cap);
            $("#security_logo").html(response.security_logo);



        }
    })

}


$(document).ready(function () {

    // INFO Loading Default values.

    load_cash_cat();

    $('#category_id').on('change', function () {
        // adding field for other 
        var other_code = $(this).val();

        if (other_code == "others") {
            // console.log("Textbox added");

            $("#other_cat_place").html(' <label for="other_cat" id="other_cat_label">Other Category</label> <input type="text" class="form-control form-control-border" id="other_cat" name="other_cat" placeholder = "Please add other category." required>');
        } else {
            $("#other_cat").remove();
            $("#other_cat_label").remove();
        }


    });


});

// info cashout category load from DB

function load_cash_cat() {
    $.ajax({
        url: "pages/ajax/securityAjaxCtrl.php",
        type: "post",
        data: {
            requestType: 'cashcatload'
        },
        contentType: "application/x-www-form-urlencoded",
        success: function (result) {
            var response = JSON.parse(result);
            $("#category_id").html(response.cash_flow_cat);

        }
    })
};


// Info CashFlow :: Outflow data insert to DB

$(document).ready(function () {

    $("#btn_outflow").on("click", function (e) {
        e.preventDefault();

        var Toast = Swal.mixin({
            toast: false,
            position: 'top-end',
            showConfirmButton: false,
            timer: 30000
        });

        var outamt = $("#cashout").val();
        if ($("#category_id").val() == "others") {
            var temp_cat = $("#other_cat").val();
        } else {
            var temp_cat = $("#category_id").val();
        }
        var recordDate = $("#outflow_rec_date").val();
        var outremarks = $("#out_tranremarks").val();

        $.ajax({
            type: "post",
            url: "pages/ajax/cashflowAjaxCtrl.php",
            data: "data",
            data: {
                requestType: 'cashRecordInsert',
                o_amt: outamt,
                o_cat: temp_cat,
                o_rec_date: recordDate,
                o_remark: outremarks
            },
            success: function (response) {
                console.log(response);

                if (response == 1) {
                    Toast.fire({
                        "Good job!",
                        "You clicked the button!",
                        "success"
                    });
                } else {
                    Toast.fire({
                        "Good job!",
                        "You clicked the button!",
                        "warning"
                    });
                }

            }
        });



    });


});
