// alert("working.. Inclueded successfuly");

window.onload = loadData;

//$(document).ready(Function(){
//	loadData();
//});

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


$('#marketcap_sel').on('change', function () {
    var marketcap = $(this).val();

    var industry = $('#ind_sel').val();

    // console.log(marketcap + industry);

    securitybymarketcap(industry, marketcap);

})

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

$('#sec_sel').on('change', function () {

    var securityname = $(this).val();
    var industry = $('#ind_sel').val();

    // console.log(securityname + " belongs to " + industry);

    securityInfoLoad(industry, securityname);


})


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


//Cash Flow Category Load
//$(document).ready(function() {
//	$('#tab_change').on('focus', function () {
//	load_cash_cat();
//	})
//});

//function load_cash_cat(){
//	$.ajax({
//        url: "pages/ajax/securityAjaxCtrl.php",
//        type: "post",
//        data: {
//            requestType: 'cashcatload'
//        },
        // dataType: "json",
//        contentType: "application/x-www-form-urlencoded",
//        success: function (result) {
//            var response = JSON.parse(result);
//            $("#Secuirty_Title").html(response.cash_flow_cat);
//            
//        }
//    })
//}
