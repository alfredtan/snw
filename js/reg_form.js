// JavaScript Document
$(document).ready(function(){
	
	$("#snap_win_btn").live('mouseover',function() {
		$(this).css({cursor:'pointer'});
	});
	
	$("#close_btn").live('mouseover',function() {
		$(this).css({cursor:'pointer'});
	});
	
	
	
	$("#snap_win_btn").click( function()
								{
									$("#reg_form_container").show();
								});
	
	$("#close_btn").click( function()
								{
									$("#reg_form_container").hide();
								});
	
});