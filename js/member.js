$(document).ready(
	function(){
		$('.member_personalInfo').click(
			function(){
				$('.member_orderSearch_wrpaper,.member_coupon_wrpaper').hide();
				$('.member_personalInfo_wrpaper').show();
			}
		)
		$('.member_orderSearch').click(
			function(){
				$('.member_personalInfo_wrpaper,.member_coupon_wrpaper').hide();
				$('.member_orderSearch_wrpaper').show();
			}
		)
		$('.member_coupon').click(
			function(){
				$('.member_personalInfo_wrpaper,.member_orderSearch_wrpaper').hide();
				$('.member_coupon_wrpaper').show();
		})



})