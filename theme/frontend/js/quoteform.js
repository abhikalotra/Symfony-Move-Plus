
$(document).ready(function(){

$( ".required" ).datepicker();
$('#li_Moving').click(function(){
$(".selected_service").val('moving');
showquotefor();
});

$('#li_Cleaning').click(function(){
$(".selected_service").val('cleaning');
showquotefor();
});

$('#li_Packing').click(function(){
$(".selected_service").val('packing');
showquotefor();
});

$(".selectDropdown").change(function(){
var selectedvalue = $(this).find("option:selected").val();
$(".selected_service").val(selectedvalue);
if(selectedvalue !='' || selectedvalue !=null){
$(".showquoteforbutton").show();
}else{
$(".showquoteforbutton").hide();
}
});

});

function showquotefor(){

$('#quoteformhtml').html('');
var selectdropdownval = $('.selected_service').val();
$.ajax({
        url: '/service/get-quote-form/catagory="'+selectdropdownval+'"',
        
        success: function(response) {
            $('#quoteformhtml').append(response);
            var divToOpen = "quoteformhtml";
            var popupSetting = { width: '60%', height: 'auto', title: selectdropdownval+' Request Quote Form',isFixed:false };
            ShowPopup(divToOpen, popupSetting);
            
            
        }
    });
}

function ShowPopup(divId, popupSetting) {
            var divElt = document.getElementById(divId);
            divElt.style.display = 'block';
            var element = divElt.parentElement;
            popupSetting = popupSetting || {};
            if (!popupSetting.width) { popupSetting.width = divElt.offsetWidth };
            if (!popupSetting.height) { popupSetting.height = divElt.offsetHeight };
            if (!popupSetting.title) { popupSetting.title = 'Dialog' };
            var table = document.createElement('div');
            table.setAttribute('id', 'div' + divId);
            var tr1 = document.createElement('div'); tr1.className = 'PopupHeader';
            var td1 = document.createElement('div'); td1.setAttribute('class', 'PopupHeaderTd');
            var span = document.createElement('span'); span.innerHTML = popupSetting.title;
            span.setAttribute('style', 'font-size: 20px; font-weight: bold;');
            td1.appendChild(span); tr1.appendChild(td1); table.appendChild(tr1);
            var tr2 = document.createElement('div');
            var tdDynamic = document.createElement('div');
            tdDynamic.setAttribute('align', 'center');
            tdDynamic.setAttribute('style', 'padding-top: 10px; vertical-align:top;');
            var tempElt = document.createElement('div');
            tempElt.setAttribute('id', 'tempElt' + divElt.id);
            divElt.parentElement.insertBefore(tempElt, divElt);
            tdDynamic.appendChild(divElt);
            tr2.appendChild(tdDynamic);
            table.appendChild(tr2);
            var cssText = 'display: block; border:1px solid #49BB6E;  z-index:92000; background-color:white; top:40%; left:20%;';
            cssText += 'width: ' + popupSetting.width + '; height: ' + popupSetting.height + ';';
            if (popupSetting.isFixed === true) { cssText += 'position: fixed;';}
            else { cssText += 'position: absolute;'; }
           // table.setAttribute('style', cssText);
            element.appendChild(table);
            var shadeElt = document.createElement('div');
            shadeElt.id = "ShadedBG";shadeElt.className = "ShadedBG";
            tempElt.appendChild(shadeElt);
        }
 
        // Function to Close Div Popup
        function ClosePopupDiv() {
        var divId = 'quoteformhtml';
            var table = document.getElementById('div' + divId);
            var element = table.parentElement;
            var divElt = document.getElementById(divId);
            divElt.style.display = 'none';
            var tempElt = document.getElementById('tempElt' + divId);
            tempElt.parentElement.insertBefore(divElt, tempElt);
            table.parentElement.removeChild(table);
            table.setAttribute('style', 'display: none');
            tempElt.parentElement.removeChild(tempElt);
        }