<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function js_template($id_tbl, $url){
    $ret="$('#".$id_tbl."').DataTable({responsive: true,dom: 'Bfrtip',buttons: [";
	if(!$url==''){
		$ret=$ret."{text: 'Tambah',action: function(e,dt,node,config){
				$(location).attr('href',".$url.");}},";
	}
	$ret	=$ret."'copyHtml5','excelHtml5','csvHtml5','pdfHtml5']});";
	return($ret);
}
function js_open(){
	$ret="<script>
	$(document).ready(function(){ 
	$('#logout,#logout2').click(function(){
	$('#modal-logout').modal('show');});";
	return($ret);
}
function js_close(){
	$ret="}); </script>";
	return($ret);
}
function js_tutor_aktif(){
	$url	="'".base_url('admin/tutor/tambah')."'";
	return(js_template('tbl-tutor-aktif',$url));
}
function js_tutor_nonaktif(){
	return(js_template('tbl-tutor-nonaktif', ''));
}
function js_wb_aktif(){
	$url	="'".base_url('admin/wb/tambah')."'";
	return(js_template('tbl-wb-aktif', $url));
}
function js_wb_nonaktif(){
	return(js_template('tbl-wb-nonaktif', ''));
}

function js_set_kelas(){
	return(js_template('tbl-set-kelas', ''));
}

function js_set_user(){
	$ret1=js_template('tbl-set-user-tutor', '');
	$ret2=js_template('tbl-set-user-wb', '');
	return($ret1.$ret2);
}

function js_wb_kelas(){
	return(js_template('tbl-wb-kelas', '')
		.js_template('tbl-wb-kelas-nilai', '')
		.js_template('tbl-wb-kelas-pembayaran', '')
		.js_template('tbl-wb-kelas-berkas', '')
	);
}
function js_dp($id_dp){
	$ret="var dp = $('#".$id_dp."');";
	$ret=$ret."dp.datepicker({
		format: 'yyyy-mm-dd',
		todayBtn: 'linked',
		language: 'id',
		daysOfWeekHighlighted: '0',
		autoclose: true,
		todayHighlight: true
		});";
	return($ret);
}

function js_layanan_click(){
	$ret='$("#layanan").change(function(){		
        $("#kelas option").remove();
        $("#kelas").append("<option value=&quot;&quot; selected>-- Pilih Kelas --</option>");
        $.getJSON("'.base_url("api/get_kelas").'",
            {
                id_layanan: $("#layanan").val()
            }, function(data){
            $.each(data, function() {
                $("#kelas").append("<option value=" + this.id + ">" + this.kelas + "</option>");
            });
        }).fail(function(jqXHR,textStatus,errorThrown){
            alert("Error mendapatkan data kelas!");
        });		
		
	});';

	return($ret);
}

function js_trim_input(){
    return('$("input").change(function(){this.value = $.trim(this.value);});');
}

function js_chat(){
	return(
		js_template('tbl-chat-tutor', '').js_template('tbl-chat-wb', '')
	);
}
