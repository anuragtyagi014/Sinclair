<!-- </main> -->
<?php get_template_part( 'template-parts/footer' ); ?>
</div>
 <div class="preloader transition-slide"></div>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?php wp_footer(); ?>


<!-- <script>
	$(document).ready(function () {
		$('.hero-caption').append($('.btn-hm'));
	});	
</script> -->


<!-- 
<script>  

document.addEventListener('DOMContentLoaded', () => {
$(".accordion").on("click", ".heading", function () {

$(this).toggleClass("active").next().slideToggle();

$(this).parents('.accordion').find(".contents").not($(this).next()).slideUp(300);

$(this).siblings().removeClass("active");
});
});
</script> -->

<!-- <script>
	//header animation on load
$(document).ready(function() {
setTimeout(function() {
  $(".bread-crumb .ttl").addClass("active-ttl");
}, 300);

});
</script> -->

<script>
  AOS.init();
</script>

</body>

</html>