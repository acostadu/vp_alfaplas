$(document).ready(function() {

    $('#example').DataTable();   

    //$("input[name='optionsRadios']:checked").val() 

    $("#comercial_ventas").click(function() 
    {
        $('#spinner').modal('show');
        $(this).ajaxPost('listarVentas','GET','#principalPanel');
    });

    $("#empresas").click(function() 
    {
        if ( $('#empresaModal').length > 0 ) {
            $('#empresaModal').modal('show');
        } else {
            $('#spinner').modal('show');
            $(this).ajaxPost('listarEmpresas','GET','#windowsModal');            
        }
    });

    $("#ciclosPresupuestarios").click(function() 
    {
        if ( $('#cicloModal').length > 0 ) {
            $('#cicloModal').modal('show');
        } else {
            $('#spinner').modal('show');
            $(this).ajaxPost('listarCiclos','GET','#windowsModal');            
        }
    });  

    /*$(document).on('click','#comercial_ventas', function(event) {
        //var id = $(this).attr('data-id');
        //$(this).ajaxPost('listarVentas','POST','/');

        //alert(2);
    })*/        

    $("#tab_2").click(function() {
        //alert(1);
        $.ajax({
            type: 'GET', 
            url : "/producto", 
            success : function (data) {
                $("#tab_2").html(data);
            }
        });
    });    

    /*
        -- Ver Ventas --
    */
    $(document).on('click','.verVentas',function(event) {
        var id = $(this).attr('data-id');
        $(this).ajaxPost('listarVentas','POST','/');

        alert(id);
    });    

    /*
        --DELETE IMAGE--
    */
    $(document).on('click','.deleteImage',function(event){
        var id = $(this).attr('data-id');
        $(this).ajaxPost('images/'+id,'DELETE','/');
    });


    /*
        --ADD IMAGE--
    */
    $(document).on('click','.addImage',function(event){
        $(this).ajaxPost('CreateImage','POST','/');
    });


    /*
        --ELEMENTALS FUNCTIONS
    */

    $.fn.ajaxPost = function(url,method,sectionToRender) {
        $.ajax({
            type: method,
            url: url,
            dataType: 'json',
            success: function (json) {
                $('#spinner').modal('hide');
                $(sectionToRender).empty().append($(json.data));

                if (json.header)
                    $('#headerPanel').empty().append($(json.header));

                if (json.modal)
                    $(json.modal).modal('show');
            },
            error: function (json) {
                //$('#spinner').modal('hide');
                var errors = json.responseJSON;
                if (errors) {
                    $.each(errors, function (i) {
                        console.log(errors[i]);
                    });
                }
            }
        });
    }

    function ajaxRenderSection(url) {
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            success: function (data) {
                $('#principalPanel').empty().append($(data)); //se toma la data en formato json, luego se borra el Div padre de el Sections y se pinta el json (data) como htlm
            },
            error: function (data) {
                var errors = data.responseJSON;
                if (errors) {
                    $.each(errors, function (i) {
                        console.log(errors[i]);
                    });
                }
            }
        });
    }

    // Esto es a parte
    var url = "http://localhost:8000/producto";

    // muestra el formulario modal para la edición del producto
    $(document).on('click', '.open_modal', function () {
        var producto_id = $(this).val();

        $.get(url + '/' + producto_id, function (data) {
            //success data
            console.log(data);
            $('#producto_id').val(data.id);
            $('#nombre').val(data.nombre);
            $('#descripcion').val(data.descripcion);
            $('#btn-save').val("update");
            $('#myModal').modal('show');
        })
    });

    // muestra el formulario modal para crear un nuevo producto
    $('#btn_add').click(function () {
        $('#btn-save').val("add");
        $('#frmproductos').trigger("reset");
        $('#myModal').modal('show');
    });

    // muestra el formulario modal para eliminar un producto existente
    $("#btn-del").click(function (e) {

        var producto_id = $('#producto_id').val(); //$(this).val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        $.ajax({
            type: "DELETE",
            url: url + '/' + producto_id,
            success: function (data) {
                console.log(data);
                $("#producto" + producto_id).remove();
                $('#myModalDel').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    // eliminar el producto y eliminarlo de la lista
    $(document).on('click', '.delete-producto', function () {

        var producto_id = $(this).val();
        $('#producto_id').val(producto_id);
        $('#myModalDel').modal('show');

    });

    // crear nuevo producto / actualizar producto existente
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        e.preventDefault();
        var formData = {
            nombre: $('#nombre').val(),
            descripcion: $('#descripcion').val(),
        }
        // utilizado para determinar el metodo http que se va a utilizar [add = POST], [update = PUT]
        var state = $('#btn-save').val();
        var type = "POST"; // para crear un nuevo recurso
        var producto_id = $('#producto_id').val();
        var my_url = url;
        if (state == "update") {
            type = "PUT"; // para actualizar recursos existentes
            my_url += '/' + producto_id;
        }
        console.log(formData);
        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var producto = '<tr id="producto' + data.id + '"><td>' + data.id + '</td><td>' + data.nombre + '</td><td>' + data.descripcion + '</td>';
                producto += '<td><button class="btn btn-warning btn-detail open_modal" value="' + data.id + '">Editar</button>';
                producto += ' <button class="btn btn-danger btn-delete delete-producto" value="' + data.id + '">Eliminar</button></td></tr>';
                if (state == "add") { // para actualizar recursos existentes...
                    $('#productos-list').append(producto);
                } else { // si el usuario actualiza un registro existente
                    $("#producto" + producto_id).replaceWith(producto);
                }
                $('#frmproductos').trigger("reset");
                $('#myModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    // Hasta aquí   

});

// Formatea la fecha para su uso en el DateRangePicker
function convertDateFormat(string) {
    var fecha = string.split('-');
    return fecha[1] + '/' + fecha[2] + '/' + fecha[0];
} 

// Muestra modal de carga cuando se realiza un petición AJAX
$(document).on('click','#modal_detail', function(event) {
    var vendedor = $(this).val();
    alert(vendedor);
});

// Muestra modal de carga cuando se realiza un petición AJAX
$(document).on('click','#modal_grafica', function(event) {
    var vendedor = $(this).val();
    //alert(vendedor);
    if ( $('#graficaBarraModal').length > 0 ) {
        $('#graficaBarraModal').modal('show');
    } else {
        $('#spinner').modal('show');
        $(this).ajaxPost('verGraficoBarra/001/'+vendedor, 'GET', '#windowsModal');
    }
});

/*$("#ventas_mensual").click(function() {
  //
  alert(1);
});*/

$(document).on('click','#ventas_mensual', function(event) 
{
    var mes_actual = moment().month()+1;
    var mes_check = $(this).data('value');

    if (mes_check <= mes_actual) {
        $('#spinner').modal('show');
        $(this).ajaxPost('listarVentas/001/'+ mes_check,'GET','#principalPanel');         
    } else {
        //alert('Notificación: Mes sin información');
        $('#notificacionModal').modal('show');
    }

});

// Despliega las Facturas de Venta (FE) segun fecha indicada
$(document).on('click','#facturaVentaFE', function(event) {
    $('#spinner').modal('show');
    $(this).ajaxPost('facturaVentaFE/001/', 'GET', '#principalPanel'); 
});

// Despliega las Notas de Credito de Venta (FE) segun fecha indicada
$(document).on('click','#notaCreditoVentaFE', function(event) {
    $('#spinner').modal('show');
    $(this).ajaxPost('notaCrdtoVentaFE/001/', 'GET', '#principalPanel');
});

$('body').on('click', '.pagination a', function(e) {
    e.preventDefault();

    /*$('#load a').css('color', '#dfecf6');
    $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');
    */

    var url = $(this).attr('href');
    $('#spinner').modal('show');
    $(this).ajaxPost(url, 'GET', '#principalPanel');
    //window.history.pushState("", "", url);
});