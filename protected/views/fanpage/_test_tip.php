
        <!-- losemodal -->
        <div id="loseModal" class="" style="box-shadow:none; background: none">
        	<table width="451" border="0" cellspacing="0" cellpadding="0" background="/images/bg-lose-eligible.png">
			      <tr>
			        <td height="448" align="left" valign="top"><table width="451" border="0" cellspacing="0" cellpadding="0">
			          <tr>
			            <td height="235">&nbsp;</td>
			          </tr>
			          
			          <tr>
			            <td height="90" align="left" valign="top"><table width="451" border="0" cellspacing="0" cellpadding="0">
			              <tr>
			                <td width="70">&nbsp;</td>
			                <td style="font-family:arial; font-size:12px; " id="tip-msg"></td>
			                <td width="35">&nbsp;</td>
			              </tr>
			            </table></td>
			          </tr>
			          <tr>
			            <td align="center" valign="top">
			            	<a href="javascript:;" id="share-tip-msg"><img src="/images/btn-share-tips.png" width="117" height="63" id="Image2" onmouseover="MM_swapImage('Image2','','/images/btn-share-tips-roll.png',1)" onmouseout="MM_swapImgRestore()" /></a>
			              </td>
			          </tr>
			        </table></td>
			      </tr>
			    </table>
			    <a class="close-reveal-modal" style="top:108px">&#215;</a>
        </div>
        <div id="log"></div>
        <button id="prev">prev</button>
        <button id="next">next</button>
		<!-- !losemodal -->
<script>
var num=1;
	$(document).ready( function(){
		load_tip()
		
		$("#next").click(function(){
			num++
			if( num>50) num=1;
			load_tip();
		})
		
		$("#prev").click(function(){
			num--
			if( num==0) num=50;
			load_tip();
		})
		
	});
	
	
	function load_tip()
	{

			$("#tip-msg").html('Loading...');
			$.get(
				'/index.php/game/tip?num='+num,
				function(d)
				{
					d=$.parseJSON(d);
					$("#tip-msg").html(d.tip);
					$("#log").html("viewing tip " + num);
					
				}
			);
	}
	
</script>