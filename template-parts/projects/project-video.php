<?php
/**
 * Template part for displaying project video section
 *
 * @package Arqam-Web
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$video_id = ArqamWeb_Project::get_video_id( get_the_ID() );

if ( ! $video_id ) {
	return;
}
?>

<!-- Project Video -->
<section class="relative py-28 md:py-36 overflow-hidden" style="background: rgb(12, 19, 29);">
	<div class="absolute inset-0 pointer-events-none overflow-hidden">
		<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[700px] rounded-full opacity-[0.06]" style="background: radial-gradient(circle, hsl(var(--primary)), transparent 70%);"></div>
	</div>
	<div class="relative z-10 container">
		<div class="text-center mb-12 transition-all duration-700 opacity-100 translate-y-0">
			<p class="text-sm font-medium tracking-widest uppercase mb-4" style="color: rgb(94, 178, 237);"><?php esc_html_e( 'See It In Action', 'arqamweb' ); ?></p>
			<h2 class="text-3xl md:text-5xl font-display font-bold mb-4 text-white" style="line-height: 1.1;"><?php esc_html_e( 'Watch the full project walkthrough', 'arqamweb' ); ?></h2>
			<p class="max-w-lg mx-auto" style="color: rgb(148, 163, 184);"><?php esc_html_e( 'A detailed look at the design decisions, interactions, and results that brought this project to life.', 'arqamweb' ); ?></p>
		</div>
		<div class="transition-all duration-700 delay-150 opacity-100 translate-y-0 scale-100 max-w-3xl mx-auto">
			<div class="relative rounded-2xl overflow-hidden shadow-2xl shadow-foreground/[0.08] border border-border/40 bg-foreground/5">


				<div class="aspect-video w-full relative" id="video-wrapper" data-video-id="<?php echo esc_attr( $video_id ); ?>">
					<button class="group absolute inset-0 w-full h-full cursor-pointer" aria-label="<?php esc_attr_e( 'Play video', 'arqamweb' ); ?>">
						<img src="https://img.youtube.com/vi/<?php echo esc_attr( $video_id ); ?>/maxresdefault.jpg"
							alt="<?php echo esc_attr( get_the_title() . ' — project walkthrough video' ); ?>"
							width="1280"
							height="720"
							loading="lazy"
							decoding="async"
							class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.03]">
						<div class="absolute inset-0 bg-foreground/20 transition-colors duration-300 group-hover:bg-foreground/30"></div>
						<div class="absolute inset-0 flex items-center justify-center">
							<span class="flex items-center justify-center w-20 h-20 md:w-24 md:h-24 rounded-full bg-primary/90 text-primary-foreground shadow-xl backdrop-blur-sm animate-pulse-slow transition-transform duration-300 group-hover:scale-110 group-active:scale-95">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-play w-8 h-8 md:w-10 md:h-10 ml-1">
									<polygon points="6 3 20 12 6 21 6 3"></polygon>
								</svg>
							</span>
						</div>
					</button>
				</div>
			</div>
		</div>
	</div>


	<div id="video-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/80 backdrop-blur-sm">

		<!-- close button -->
		<button id="close-video" class="absolute top-6 right-6 text-white text-3xl z-50">
			✕
		</button>

		<!-- video container -->
		<div class="w-[90%] max-w-5xl aspect-video">
			<iframe
				id="video-iframe"
				class="w-full h-full rounded-xl"
				src=""
				frameborder="0"
				allow="autoplay; encrypted-media; picture-in-picture"
				allowfullscreen>
			</iframe>
		</div>
	</div>

	<script>
		document.addEventListener("DOMContentLoaded", () => {

			const wrapper = document.getElementById("video-wrapper");
			const videoId = wrapper.dataset.videoId;
			const button = wrapper.querySelector("button");

			const modal = document.getElementById("video-modal");
			const iframe = document.getElementById("video-iframe");
			const closeBtn = document.getElementById("close-video");

			// open modal
			button.addEventListener("click", () => {
				iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0`;
				modal.classList.remove("hidden");
				modal.classList.add("flex");

				document.body.style.overflow = "hidden"; // prevent scroll
			});

			// close modal
			const closeModal = () => {
				modal.classList.add("hidden");
				modal.classList.remove("flex");

				iframe.src = ""; // stop video
				document.body.style.overflow = "";
			};

			closeBtn.addEventListener("click", closeModal);

			// close on outside click
			modal.addEventListener("click", (e) => {
				if (e.target === modal) {
					closeModal();
				}
			});

			// ESC close
			document.addEventListener("keydown", (e) => {
				if (e.key === "Escape") {
					closeModal();
				}
			});

		});
	</script>
</section>
