function displaySupplierTextBox(e){
    var txtBox = document.getElementById("supplier-name");
    // console.log(e.options)
    if(e.options[e.selectedIndex].value == "new")
        txtBox.style.display = "inline";
    else
        txtBox.style.display = "none";

}
function addNewBoxes(event)
{
    console.log(event.value);
    var blocks_info = document.getElementById("blocks-info");
    var html = "";
    for(var i=0;i<event.value;i++)
    {
        html += '<div class="block-info">\
                    <h5> البلوكة رقم'+ (i+1) +'</h5>\
                    <div   class="form-group row col-sm-10">\
                    <label for="marble-price" class="col-sm-2 col-form-label">نوع البلوكة</label>\
                    <div class="float-left">\
                        <input type="text" class="form-control" name="block_type[]" id="block_type"  autocomplete="off">\
                    </div>\
                </div>';
        html += '<div   class="form-group row col-sm-10">\
                    <label for="marble-price" class="col-sm-2 col-form-label">طول البلوكة</label>\
                    <div class="float-left">\
                        <input type="number" class="form-control" step="0.01" name="block_length[]" id="block_length"  autocomplete="off">\
                    </div>\
                </div>';
        html += '<div   class="form-group row col-sm-10">\
                    <label for="marble-price" class="col-sm-2 col-form-label">عرض البلوكة</label>\
                    <div class="float-left">\
                        <input type="number" class="form-control" step="0.01" name="block_width[]" id="block_width"  autocomplete="off">\
                    </div>\
                </div>';
        html += '<div   class="form-group row col-sm-10">\
                <label for="marble-price" class="col-sm-2 col-form-label">ارتفاع البلوكة</label>\
                <div class="float-left">\
                    <input type="number" class="form-control" step="0.01" name="block_height[]" id="block_height"  autocomplete="off">\
                </div>\
            </div></div>';
    }
    blocks_info.innerHTML = html;
}

function showBlocksData(supplierID, type){
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function (){
        if(ajax.readyState == 4 && ajax.status == 200)
        {
            // console.log(this.responseText);
            var data = JSON.parse(this.responseText);
            var htmltxt = "";
            for(var i=0; i<data.length; i++)
            {
                if(data[i].count_2cm == undefined){
                    data[i].count_2cm = 0
                    data[i].count_3cm = 0
                }
               htmltxt += '<tr >\
               <td>'+ data[i].supplier_name +'</td>\
               <td>'+ data[i].type          +'</td>\
               <td>'+ data[i].block_code    +'</td>\
               <td>'+ data[i].length        +'</td>\
               <td>'+ data[i].width         +'</td>\
               <td>'+ data[i].height        +'</td>\
               <td>'+ data[i].height * data[i].width * data[i].length +'</td>';
               if(type == "all"){
                   if($("#count_2cm").length){
                       $("#count_2cm").remove();
                       $("#count_3cm").remove();
                   }
                   
               }else if(type = "sawns"){
                   if(!$("#count_2cm").length)
                   $("<th id=\"count_2cm\" scope=\"col\">طاولة 2 سم</th>\
                   <th id=\"count_2cm\" scope=\"col\">طاولة 3 سم</th>").insertAfter("#area");
                    htmltxt += '<td>'+ data[i].count_2cm  +'</td>\
                    <td>'+ data[i].count_3cm  +'</td>';
               }
               htmltxt += '<td class="wid">';
               if(type == 'sawns')
                    htmltxt += '<a class="btn btn-primary" href= "/works/blockedit/'+ data[i].id +'"><i class="fas fa-pencil-alt"></i></a>';
               htmltxt += '<a onclick="return confirm(\'هل تريد مسح هذه البلوكة('+ data[i].block_code +')؟\')" class="btn btn-danger" href="/works/deleteblock/'+ data[i].id +'"><i class="fas fa-trash-alt"></i></a>\
               </td>\
           </tr>'; 
            }
            document.getElementById("clientData").innerHTML = htmltxt;
        }

    }
    if(type == "sawns")
        ajax.open("GET", "/supplierss/" + supplierID, true);
    else if(type == "all")
        ajax.open("GET", "/supplierssall/" + supplierID, true);
    ajax.setRequestHeader("Accept-Language", "ar-EG");
    ajax.setRequestHeader("Content-Type", "application/json");
    ajax.send();
}

function getBlocksCode(e)
{
    var supplier_id = e.options[e.selectedIndex].value;
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function (){
        if(ajax.readyState == 4 && ajax.status == 200)
        {
            console.log(this.responseText);
            var data = JSON.parse(this.responseText);
            var htmltxt = "";
            var block_code_el = document.getElementById('block_code');
            if(!data.length){
                htmltxt += "<option value='none'>لا يوجد بلوكات للنشر</option>";
            }
            for(var i = 0; i < data.length; i++)
            {
                htmltxt += "<option value=" + data[i].id + ">" + data[i].block_code + "</option>";
            }
            block_code_el.innerHTML = htmltxt;
        }

    }
    ajax.open("GET", "/works/blockscode/" + supplier_id, true);
    ajax.setRequestHeader("Content-Type", "application/json");
    ajax.send();
}
function generateSelect(e)
{
    // console.log(e.options[e.selectedIndex].value);
    if(e.options[e.selectedIndex].value == 'income')
    {   
        $('#outcome').remove()
        var htmltxt = "<select class=\"col-sm-2 mr-2\" name='income' id='income'>\
                        <option value='sup'>الموردين</option>\
                        <option value='client'>العملاء</option>\
                        <option value='sum'>الاجمالي</option>\
                        </select>";
        $(htmltxt).insertAfter('#incomeoroutcome');
    }
    else if(e.options[e.selectedIndex].value == 'outcome')
    {
        $('#income').remove()
        var htmltxt = "<select class=\"col-sm-2 mr-2\" name='outcome' id='outcome'>\
                        <option value='maintain'>صيانة</option>\
                        <option value='clientExp'>مصروفات عمال</option>\
                        <option value='salaries'>قبض موظفين</option>\
                        <option value='sum'>الاجمالي</option>\
                        </select>";
        $(htmltxt).insertAfter('#incomeoroutcome');
    }
    else
    {
        $('#outcome').remove()
        $('#income').remove()
    }
}


// convert numbers to arabic
function replaceDigits() {
    var map = ["&\#1632;","&\#1633;","&\#1634;","&\#1635;","&\#1636;","&\#1637;","&\#1638;","&\#1639;","&\#1640;","&\#1641;"]
    document.body.innerHTML = document.body.innerHTML.replace(/\d(?=[^<>]*(<|$))/g, function($0) { return map[$0]});
}
window.onload = function(){
    replaceDigits()
    $("#datePicker1").datepicker()
    $("#datePicker2").datepicker()
    // alert('asd');
}