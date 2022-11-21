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

    load_cash_cat("inflow"); // Loading first time data without click
    load_cashflow_data();

    // onSelect

    $("#Cash_OutFlow-tab").click(function () {
        load_cash_cat("outFlow");
        $("#other_cat_out").remove();
        $("#other_cat_label").remove();
    });
    $("#Cash_Inflow-tab").click(function () {
        load_cash_cat("inflow");
        $("#other_cat_in").remove();
        $("#other_cat_label").remove();
    });

    // info other textfield add in cashout category

    $('#out_category_id').on('change', function () {
        // adding field for other 
        var other_code = $(this).val();

        if (other_code == "others") {
            // console.log("Textbox added");

            $("#other_cat_out_place").html(' <label for="other_cat" id="other_cat_label">Other Category</label> <input type="text" class="form-control form-control-border border-width-2" id="other_cat_out" name="other_cat_out" placeholder = "Please add other category." required>');
        } else {
            $("#other_cat_out").remove();
            $("#other_cat_label").remove();
        }

    });
    // info other textfield add in cashin category
    $('#in_category_id').on('change', function () {
        // adding field for other 
        var other_code = $(this).val();

        if (other_code == "others") {
            // console.log("Textbox added");

            $("#other_cat_in_place").html(' <label for="other_cat" id="other_cat_label">Other Category</label> <input type="text" class="form-control form-control-border border-width-2" id="other_cat_in" name="other_cat_in" placeholder = "Please add other category." required>');
        } else {
            $("#other_cat_in").remove();
            $("#other_cat_label").remove();
        }

    });


});

// info cashout category load from DB

function load_cash_cat(flowType) {
    $.ajax({
        url: "pages/ajax/cashflowAjaxCtrl.php",
        type: "post",
        data: {
            requestType: 'cashcatload',
            dataType: flowType
        },
        success: function (result) {
            var response = JSON.parse(result);
            if (flowType == "outFlow") {
                $("#out_category_id").html(response.cash_flow_cat);

            } else {
                $("#in_category_id").html(response.cash_flow_cat);
            }

        }
    })
};

function load_cashflow_data() {
    $.ajax({
        type: "post",
        url: "pages/ajax/cashflowAjaxCtrl.php",
        data: {
            requestType: 'loadcashtable'
        },
        success: function (result) {
            var response = JSON.parse(result);
            $("#tableContainer").html(response.cashflow_table);
            $("#table_id").DataTable({
                "destroy": true, //use for reinitialize datatable
            });
        }
    });
};

$(document).ready(function () {

    // info Cash outflow record added to Database
    $("#btn_outflow").on("click", function (e) {
        e.preventDefault();

        var request_data = $("#form_cashout").serialize() + "&requestType=cashRecordInsert&flow_type=outFlow";

        $.ajax({
            type: "post",
            url: "pages/ajax/cashflowAjaxCtrl.php",
            data: "data",
            data: request_data,
            dataType: "JSON",
            success: function (result) {
                // info this JSON.parse is not required if dataType is given.
                // var response = JSON.parse(result);

                $("#result_cashout").html(result.status);

                setTimeout(function () {
                    $("#result_cashout").fadeOut("slow")
                }, 4000);

                load_cashflow_data();
                $("#form_cashout").trigger('reset');
            }
        });



    });

    // info Cash inflow record added to Database


    $("#btn_inflow").on("click", function (e) {
        e.preventDefault();
        var request_data = $("#form_cashin").serialize() + "&requestType=cashRecordInsert&flow_type=inFlow";

        $.ajax({
            type: "post",
            url: "pages/ajax/cashflowAjaxCtrl.php",
            data: "data",
            data: request_data,
            dataType: "JSON",
            success: function (result) {

                $("#result_cashin").html(result.status);

                setTimeout(function () {
                    $("#result_cashin").fadeOut("slow")
                }, 4000);

                load_cashflow_data();
                $("#form_cashin").trigger('reset');

            }
        });



    });


});

// Document.ready short hand methoda
$(function () {
    // info edit button
    $(document).on("click", ".btn-edit", function (e) {
        e.preventDefault();
        var record_id = $(this).data("id");
        $("#btn_outflow").removeClass("btn-primary").addClass("btn-warning").html("Save Changes");

    })
    // info delete button
    $(document).on("click", ".btn-delete", function (e) {
        e.preventDefault();
        if (confirm("Do you really want to delete this record ?")) {

            var record_id = $(this).data("id");
            // alert(record_id);
            var element = this;
            $.ajax({
                type: "post",
                url: "pages/ajax/cashflowAjaxCtrl.php",
                data: {
                    requestType: 'deleteRecord',
                    record_id: record_id
                },
                dataType: "json",
                success: function (response) {

                    if (response.deleteStatus) {
                        $(element).closest("tr").fadeOut();
                    }

                }
            });
        }
    })
});