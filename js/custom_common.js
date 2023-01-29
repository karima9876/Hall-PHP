$(function(){
	$('.delete-sure').on('click', function(){
		return confirm('আপনি কি তথ্য মুছে ফেলতে চান?');
	});
	$('.sure-increment').on('click', function(){
		return confirm('আপনি কি সকল সদস্যদের বেতন স্কেল বৃদ্ধি করতে চান???');
	});
});